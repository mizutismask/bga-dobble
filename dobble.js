/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * Dobble implementation : © Séverine Kamycki severinek@gmail.com
 *
 * This code has been produced on the BGA studio platform for use on http://boardgamearena.com.
 * See http://en.boardgamearena.com/#!doc/Studio for more information.
 * -----
 *
 * dobble.js
 *
 * Dobble user interface script
 *
 * In this file, you are describing the logic of your user interface, in Javascript language.
 *
 */
define([
    "dojo",
    "dojo/_base/declare",
    "ebg/core/gamegui",
    "ebg/counter",
    "ebg/stock",
    "bgagame/modules/js/dobble_custom_stock",
], function (dojo, declare) {
    return declare("bgagame.dobble", ebg.core.gamegui, {
        constructor: function () {
            this.TOWERING_INFERNO = 1;
            this.WELL = 2;
            this.HOT_POTATO = 3;
            this.POISONED_GIFT = 4;
            this.TRIPLET = 5;

            this.DIV_PATTERN = "pattern_pile";

            this.SUCCESS_SOUND = "matchSuccess";
        },

        /*
            setup:
            
            This method must set up the game user interface according to current game situation specified
            in parameters.
            
            The method is called each time the game interface is displayed to a player, ie:
            _ when the game starts
            _ when a player refreshes the game page (F5)
            
            "gamedatas" argument contains all datas retrieved by your "getAllDatas" PHP method.
        */

        setup: function (gamedatas) {
            console.log("minigame ", this.minigame);
            console.log("gamedatas ", gamedatas);
            this.cardsDescription = gamedatas.cardsDescription;
            this.minigame = parseInt(gamedatas.minigame);
            // Setting up player boards
            dojo.addClass("piles", "minigame" + this.minigame);

            // TODO: Set up your game interface here, according to "gamedatas"
            if (
                this.minigame == this.WELL ||
                this.minigame == this.TOWERING_INFERNO ||
                this.minigame == this.HOT_POTATO
            ) {
                //---------- Player hand setup
                this.playerHand = this.createStock("myhand");
                this.addCardsToStock(gamedatas.hand, this.playerHand);
            }

            if (
                this.minigame == this.WELL ||
                this.minigame == this.TOWERING_INFERNO ||
                this.minigame == this.POISONED_GIFT ||
                this.minigame == this.TRIPLET
            ) {
                this.patternPile = this.createStock("pattern_pile");
                this.addCardsToStock(gamedatas.pattern, this.patternPile);
            }

            dojo.subscribe("onChangeSelection", this, "onChooseSymbol");

            if (this.minigame == this.POISONED_GIFT || this.minigame == this.HOT_POTATO) {
                this.playerHands = [];

                for (var player_id of Object.keys(gamedatas.players)) {
                    if (player_id != this.player_id) {
                        playerHand = this.createStock("player_hand_stock_" + player_id);
                        this.addCardsToStock(gamedatas.pattern, playerHand);

                        dojo.connect(playerHand, "onChangeSelection", this, "onSelectOpponentHand");
                        this.playerHands[player_id] = playerHand;
                    }
                }

                this.layoutHandsInCircle(Object.keys(gamedatas.players).length);
            }

            if (this.minigame == this.HOT_POTATO) {
                var divRound = this.format_block("jstpl_round", { roundText: _("Round"), roundNb: gamedatas.roundNumber });
                dojo.place(divRound, "right-side-second-part", "before");
            }

            this.setupDobbleHand();

            // dojo.query("h3").lettering();

            //cards counts
            for (var player_id in gamedatas.players) {
                var player_board_div = $('player_board_' + player_id);

                dojo.place(this.format_block('jstpl_cards_icon', {
                    id: player_id,
                }), player_board_div);
                var el = 'cards_icon_' + player_id;
                this.addTooltipHtml(el, _('Number of cards in the pile'));
            }

            this.updateCountersIfPossible(gamedatas.counters);
            // Setup game notifications to handle (see "setupNotifications" method below)
            this.setupNotifications();

            this.highlightWinners(gamedatas.scores);
            //console.log("Ending game setup");
        },

        ///////////////////////////////////////////////////
        //// Game & client states

        // onEnteringState: this method is called each time we are entering into a new game state.
        //                  You can use this method to perform some user interface changes at this moment.
        //
        onEnteringState: function (stateName, args) {
            console.log("Entering state: " + stateName, args);

            //handle pattern
            switch (stateName) {
              case "playerTurn":
                    this.updateCountersIfPossible(args.args.counters);
                    switch (this.minigame) {
                        case this.TOWERING_INFERNO:
                        case this.WELL:
                        case this.POISONED_GIFT:
                        case this.TRIPLET:
                            var patterns = args.args.pattern;
                            this.patternPile.removeAll();
                            this.addCardsToStock(patterns, this.patternPile, false);
                            break;

                        default:
                            break;
                    }
            }

            //handle hands
            switch (stateName) {
                case "playerTurn":
                    switch (this.minigame) {
                        case this.POISONED_GIFT:
                            var hands = args.args.hands;
                            for (const [player_id, cards] of Object.entries(hands)) {
                                if (player_id != this.player_id) {
                                    this.playerHands[player_id].removeAll();
                                    this.addCardsToStock(cards, this.playerHands[player_id]);
                                }
                            }
                            break;

                        case this.HOT_POTATO:
                            var hands = args.args.hands;
                            for (const [player_id, cards] of Object.entries(hands)) {
                                var playerStock = this.getPlayerStock(player_id);
                                if (this.stockContentIsDifferentFromHand(playerStock, cards)) {
                                    playerStock.removeAll();
                                    this.addCardsToStock(cards, playerStock, false);
                                }
                            }
                            var player = this.getUniqueOpponentWithCards();
                            if (player) {
                                var playerStock = this.getPlayerStock(player);
                                playerStock.selectItem(playerStock.getAllItems().pop().id);
                            }
                            break;

                        default:
                            break;
                    }
            }
        },

        // onLeavingState: this method is called each time we are leaving a game state.
        //                 You can use this method to perform some user interface changes at this moment.
        //
        onLeavingState: function (stateName) {
            //console.log("Leaving state: " + stateName);
        },

        // onUpdateActionButtons: in this method you can manage "action buttons" that are displayed in the
        //                        action status bar (ie: the HTML links in the status bar).
        //
        onUpdateActionButtons: function (stateName, args) {
            //console.log("onUpdateActionButtons: " + stateName, args);

            if (stateName == "playerTurn") {
                this.updateActionPhrase();
            }
            
            //enables usefull stocks
            if (this.isCurrentPlayerActive()) {
                switch (stateName) {
                    case "getReady":
                        this.addActionButton('button_ready', _('Ready!'), 'onReady');
                        break;
                    case "playerTurn":
                        switch (this.minigame) {
                            case this.TOWERING_INFERNO:
                            case this.WELL:
                                this.playerHand.setSelectionMode(1);
                                this.patternPile.setSelectionMode(1);
                                break;
                            case this.TRIPLET:
                                this.patternPile.setSelectionMode(2);
                                this.addActionButton('button_reset_selection', _('Reset selection'), 'onResetSelection');
                                break;
                            case this.POISONED_GIFT:
                            case this.HOT_POTATO:
                                this.setSelectionModeOnHandStocks(1);
                                break;
                        }
                        break;

                    default:
                        break;
                }
            } else {
                this.disableAllStocks();
            }
        },

        ///////////////////////////////////////////////////
        //// Utility methods

        createStock: function (divName) {
            var stock = new dobble.stock(this, divName);
            stock.setSelectionMode(0);
            return stock;
        },

        addCardsToStock: function (cards, stock, replaceContent = false) {
            stock.addCards(cards, replaceContent);
        },

        getFormatedType: function (typeNumber) {
            return typeNumber < 10 ? "0" + typeNumber : typeNumber;
        },

        ajaxcallwrapper: function (action, args,move="playCard",handler) {
            if (!args) {
                args = [];
            }
            args.lock = true;

            if (this.checkAction(move)) {
                this.ajaxcall(
                    "/" + this.game_name + "/" + this.game_name + "/" + action + ".html",
                    args, //
                    this,
                    (result) => { },
                    handler
                );
            }
        },

        getSelectedPlayer: function (clickedStockDiv) {
            for (var player_id in this.playerHands) {
                var stock = this.playerHands[player_id];
                if (stock.div == clickedStockDiv) {
                    return player_id;
                }
            }
        },

        /**
         *
         * @returns the id of the only player with cards, if there is only one, nothing otherwise.
         */
        getUniqueOpponentWithCards: function () {
            var possiblePlayers = [];
            for (var player_id in this.playerHands) {
                var stock = this.playerHands[player_id];
                if (stock.count() > 0) {
                    possiblePlayers.push(player_id);
                }
            }
            if (possiblePlayers.length == 1) {
                return possiblePlayers.pop();
            }
        },

        getPlayerStock: function (playerId) {
            if (playerId == this.player_id) {
                return this.playerHand;
            } else {
                return this.playerHands[playerId];
            }
        },

        getStockDiv: function (playerId, card = null) {
            var fromDiv;
            if (playerId == this.player_id) {
                fromDiv = "myhand"; //_item_" + card.id;
            } else {
                fromDiv = "player_hand_stock_" + playerId;
            }
            if (card) {
                fromDiv = "card-" + card.id;
            }
            console.log("fromDiv ", fromDiv);
            return fromDiv;
        },

        stockContentIsDifferentFromHand: function (playerStock, cardsFromHand) {

            if (playerStock.count() != cardsFromHand.length) return true;

            for (const card of cardsFromHand) {
                if (!playerStock.getItemById(card.id)) {
                    return true;
                }
            }
            return false;
        },

        updateCountersIfPossible: function (counters) {
            var existingCounters = this.filterObject(counters, (item, key) => {
                return dojo.byId(item.counter_name) != undefined;
            });
            this.updateCounters(existingCounters);
        },

        filterObject: function (obj, callback) {
            return Object.fromEntries(Object.entries(obj).filter(([key, val]) => callback(val, key)));
        },

        updateActionPhrase: function () {
            if (this.isCurrentPlayerActive()) {

                var phraseDiv = "pagemaintitletext";
                var phrase;
                switch (this.minigame) {
                    case this.TOWERING_INFERNO:
                        phrase = _("Find the common symbol to get more cards than you opponents");
                        break;
                    case this.WELL:
                        phrase = _("Find the common symbol to be the first to get rid of all yours cards");
                        break;
                    case this.POISONED_GIFT:
                        phrase = _("Find the common symbol with the opponent of your choice and the central pile");
                        break;
                    case this.HOT_POTATO:
                        phrase = _("Find the common symbol with the opponent of your choice");
                        break;
                    case this.TRIPLET:
                        phrase = _("Find the common symbol on 3 cards until it's not possible anymore");
                        break;

                }
                dojo.byId(phraseDiv).innerHTML = phrase;
            }
        },

        setSelectionModeOnHandStocks: function (selectionMode) {
            for (var player_id in this.playerHands) {
                var stock = this.playerHands[player_id];
                stock.setSelectionMode(selectionMode);
            }
        },

        disableAllStocks: function () {
            //disable selection
            if (this.playerHandIsDisplayed()) {
                this.playerHand.setSelectionMode(0);
            }
            if (this.patternIsDisplayed()) {
                this.patternPile.setSelectionMode(0);
            }
            if (this.opponentsHandsAreDisplayed()) {
                this.setSelectionModeOnHandStocks(0);
            }
        },

        playerHandIsDisplayed: function () {
            return this.minigame == this.WELL || this.minigame == this.TOWERING_INFERNO || this.minigame == this.HOT_POTATO;
        },

        patternIsDisplayed: function () {
            return this.minigame == this.WELL || this.minigame == this.TOWERING_INFERNO || this.minigame == this.POISONED_GIFT || this.minigame == this.TRIPLET;
        },

        opponentsHandsAreDisplayed: function () {
            return this.minigame == this.POISONED_GIFT || this.minigame == this.HOT_POTATO;
        },

        setupDobbleHand: function () {
            if (this.minigame == this.WELL || this.minigame == this.TOWERING_INFERNO) {
                let eye = document.querySelector(".dbl_hand_eye");
                let eyeBoundingRect = eye.getBoundingClientRect();
                let eyeCenter = {
                    x: eyeBoundingRect.left + eyeBoundingRect.width / 2,
                    y: eyeBoundingRect.top + eyeBoundingRect.height / 2
                };

                document.addEventListener("mousemove", e => {
                    let angle = 60 + Math.atan2(e.pageX - eyeCenter.x, - (e.pageY - eyeCenter.y)) * (180 / Math.PI);
                    eye.style.transform = `rotate(${angle}deg)`;
                })
            }
        },

        animateDobbleHand: function () {
            let dobble = document.getElementById("dbl_dobble_hand");
            dobble.classList.add("dbl_happy");
            window.setTimeout(() => {
                dobble.classList.remove("dbl_happy");
            }, 250);
        },

        layoutHandsInCircle: function (playerCount) {
            if (playerCount > 2 && $("piles").offsetWidth > 990) {
                dojo.addClass("players_wrap", "circularLayout");
                var pilesToRound;
                if (this.minigame == this.POISONED_GIFT) {
                    dojo.addClass("pattern_pile_wrap", "circularPattern");
                    pilesToRound = ".dbl_hand_wrap:not(#pattern_pile_wrap)";
                } else {
                    pilesToRound = ".dbl_hand_wrap:not(#myhand_wrap)";
                }
                dojo.query(pilesToRound).forEach(function (node, i, listItems) {
                    var offsetAngle = 360 / listItems.length;
                    var rotateAngle = offsetAngle * i;
                    var translation = Math.max(300, 47 * (playerCount - 1));//the more players, the more we need to have space between piles and the center, we need 300px min.
                    dojo.style(node, "transform", "rotate(" + rotateAngle + "deg) translate(0, -" + translation + "px) rotate(-" + rotateAngle + "deg)")
                });
            }
        },

        /*
        * Play a given sound that should be first added in the tpl file
        */
        playSound(sound, playNextMoveSound = true) {
            playSound(sound);
            playNextMoveSound && this.disableNextMoveSound();
        },

        updateScores(scores) {
            for (const [id, score] of Object.entries(scores)) {
                this.scoreCtrl[id].setValue(score);
            }
            this.highlightWinners(scores);
        },

        highlightWinners(scores) {
            //ties are possible
            var winners = new Array();
            var max;
            for (const [id, score] of Object.entries(scores)) {

                var scoreAsNumber = parseInt(score);
                if (max == undefined) {
                    max = scoreAsNumber;
                }

                if (scoreAsNumber > max) {
                    max = scoreAsNumber;
                    winners = [id];
                }
                else if (scoreAsNumber == max) {
                    winners.push(id);
                }

            }
            dojo.query(".dbl_winner").removeClass("dbl_winner");
            for (const player of winners) {
                //dojo.query("#player_hand_" + player +" h3").addClass("dbl_winner");//on names
                dojo.query("#player_hand_stock_" + player).addClass("dbl_winner");//on piles
            }
        },

        ///////////////////////////////////////////////////
        //// Player's action

        /*
        
            Here, you are defining methods to handle player's action (ex: results of mouse click on 
            game objects).
            
            Most of the time, these methods:
            _ check the action is possible at this game state.
            _ make a call to the game server
        
        */
        onChooseSymbol: function (evt, selected = false, divId, cardId) {
            var symbol = dojo.getAttr(evt.currentTarget.id, "data-symbol");
            console.log("evt.currentTarget.id", evt.currentTarget.id);
            console.log("onChooseSymbol ", symbol);

            //store selected divs to shake in case of error
            this.selectedCardDivs = dojo.query(".card > .stockitem_selected").map((div) => div.id);

            // Preventing default browser reaction
            dojo.stopEvent(evt);

            //this.checkAction('swapObjects');
            if (this.isCurrentPlayerActive()) {
                switch (this.minigame) {
                    case this.TOWERING_INFERNO:
                    case this.WELL:
                        this.ajaxcallwrapper("chooseSymbol", {
                            symbol: symbol,
                            cardId: this.patternPile.getCardId(),
                        });
                        break;
                    case this.POISONED_GIFT:
                        this.ajaxcallwrapper("chooseSymbolWithPlayer", {
                            symbol: symbol,
                            player_id: this.getSelectedPlayer(divId),
                            opponentCardId: cardId,
                            patternCardId: this.patternPile.getCardId(),
                        });
                        break;
                    case this.HOT_POTATO:
                        this.ajaxcallwrapper("chooseSymbolWithPlayer", {
                            symbol: symbol,
                            player_id: this.getSelectedPlayer(divId),
                            opponentCardId: cardId,
                            patternCardId: this.playerHand.getCardId(),
                        });
                        break;
                    case this.TRIPLET:
                        if (selected) {
                            var selectedCardIds = this.patternPile.getSelectedItems();
                            if (selectedCardIds.length == 3) {
                                this.ajaxcallwrapper("chooseSymbolWithTriplet", {
                                    symbol: symbol,
                                    card3: selectedCardIds.pop(),
                                    card2: selectedCardIds.pop(),
                                    card1: selectedCardIds.pop(),
                                });
                            }
                        }
                        break;
                    default:
                        break;
                }
            }
        },

        /**
         * Unselects other player hands when one is clicked, since hands are not in the same stock.
         */
        onSelectOpponentHand: function (control_name, item_id) {
            var clickedStock = null;
            for (var player_id in this.playerHands) {
                var stock = this.playerHands[player_id];
                if (stock.control_name == control_name) {
                    clickedStock = stock;
                    clickedPlayerId = player_id;
                }
            }

            if (clickedStock.getSelectedItems().length == 1) {
                //Unselects other player hands when one is clicked, since hands are not in the same stock
                for (var player_id in this.playerHands) {
                    var stock = this.playerHands[player_id];
                    if (stock.control_name != clickedStock.control_name) {
                        stock.unselectAll();
                    }
                }
            }
        },

        onResetSelection: function (control_name) {
            dojo.query(".symbol").removeClass("stockitem_selected");
            dojo.query(".card").removeClass("card_selected");
        },

        onReady: function (control_name) {
            this.ajaxcallwrapper("ready", { },"ready");
        },


        ///////////////////////////////////////////////////
        //// Reaction to cometD notifications

        /*
            setupNotifications:
            
            In this method, you associate each of your game notifications with your local method to handle it.
            
            Note: game notification names correspond to "notifyAllPlayers" and "notifyPlayer" calls in
                  your dobble.game.php file.
        
        */
        setupNotifications: function () {
            //console.log("notifications subscriptions setup");

            // TODO: here, associate your game notifications with local methods

            // Example 1: standard notification handling
            // dojo.subscribe( 'cardPlayed', this, "notif_cardPlayed" );

            // Example 2: standard notification handling + tell the user interface to wait
            //            during 3 seconds after calling the method in order to let the players
            //            see what is happening in the game.
            // dojo.subscribe( 'cardPlayed', this, "notif_cardPlayed" );
            // this.notifqueue.setSynchronous( 'cardPlayed', 3000 );
            //
            //evt from the stock
            dojo.subscribe("cardsMove", this, "notifCardsMove");

            dojo.subscribe('newRound', this, "notifNewRound");
            dojo.subscribe('spotFailed', this, "notifSpotFailed");

            this.notifqueue.setSynchronous('cardsMove', 1000);//carefull, card move must be finished before new round changes cards
            this.notifqueue.setSynchronous('newRound', 800);

        },

        // TODO: from this point and below, you can write your game notifications handling methods

        notifCardsMove: function (notif) {
            console.log("notifCardsMove", notif);
            var fromPlayerId = notif.args.fromPlayerId;
            var cards = notif.args.cards;
            var from = notif.args.from;
            var to = notif.args.to;
            this.updateScores(notif.args.scores);

            switch (this.minigame) {
                case this.TOWERING_INFERNO:
                    for (var card of cards) {
                        if (from == "pattern") {
                            from = "card-" + card.id;
                        }
                        if (to == this.player_id) {
                            this.playSound(this.SUCCESS_SOUND, false);
                            this.animateDobbleHand();
                            this.playerHand.removeAll();
                            this.playerHand.addCard(card, from);
                        }
                    }
                    break;
                case this.WELL:
                    var newHand = notif.args.newHand;
                    for (var card of cards) {
                        if (from == this.player_id) {
                            this.playSound(this.SUCCESS_SOUND, false);
                            this.animateDobbleHand();
                            var fromDiv = "card-" + card.id;

                            this.patternPile.removeAll();
                            this.patternPile.addCard(card, fromDiv);

                        }
                    }
                    if (from == this.player_id && newHand) {
                        //display the card under my pile
                        this.playerHand.removeAll();
                        this.playerHand.addCard(newHand);
                    }
                    break;
                case this.POISONED_GIFT:
                    for (var card of cards) {
                        if (from == "pattern") {
                            from = "card-" + card.id;
                        }
                        var toStock = this.getPlayerStock(to);
                        toStock.removeAll();
                        toStock.addCard(card, from);

                    }
                    if (fromPlayerId == this.player_id) {
                        this.playSound(this.SUCCESS_SOUND, false);
                    }
                    break;
                case this.HOT_POTATO:
                    for (var card of cards) {
                        this.getPlayerStock(to).removeAll();
                        this.getPlayerStock(to).addCard(card, this.getStockDiv(from, card));
                        this.getPlayerStock(from).removeAll();
                    }
                    if (from == this.player_id) {
                        this.playSound(this.SUCCESS_SOUND, false);
                    }
                    break;
                case this.TRIPLET: {
                    if (to == this.player_id) {
                        this.playSound(this.SUCCESS_SOUND, false);
                    }
                }
                default:
                    break;
            }
        },

        notifNewRound: function (notif) {
            //console.log("notifNewRound", notif);
            this.updateScores(notif.args.scores);
            dojo.byId("roundNb").innerHTML = notif.args.roundNumber;
        },

        notifSpotFailed: function (notif) {
            //console.log("notifSpotFailed", notif);
            this.playSound("matchFailure", false);
            //adds shake effect
            var cards = this.selectedCardDivs;
            if (cards) {
                for (const card of cards) {
                    dojo.addClass(card, "shake");
                }
            }
        },
    });
});
