/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * Dobble implementation : © <Your name here> <Your email address here>
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
            console.log("gamedatas ", gamedatas);
            this.cardsDescription = gamedatas.cardsDescription;
            this.minigame = parseInt(gamedatas.minigame);
            // Setting up player boards
            dojo.addClass("piles", "minigame" + this.minigame);
            console.log("minigame ", this.minigame);

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

                for (var player_id of gamedatas.playerorder) {
                    if (player_id != this.player_id) {
                        playerHand = this.createStock("player_hand_stock_" + player_id);
                        //playerHand.setSelectionMode(1);
                        this.addCardsToStock(gamedatas.pattern, playerHand);

                        dojo.connect(playerHand, "onChangeSelection", this, "onSelectOpponentHand");
                        this.playerHands[player_id] = playerHand;
                    }
                }
            }

            if (this.minigame == this.HOT_POTATO) {
                var divRound = this.format_block("jstpl_round", { roundText: _("Round"),roundNb: gamedatas.roundNumber });
                dojo.place(divRound, "right-side-second-part","before");
            }

            this.updateCountersIfPossible(gamedatas.counters);
            // Setup game notifications to handle (see "setupNotifications" method below)
            this.setupNotifications();

            console.log("Ending game setup");
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
            console.log("Leaving state: " + stateName);

            /*switch (stateName) {
                case "playerTurn":
                    if (this.playerHandIsDisplayed()) {
                        this.playerHand.setSelectionMode(0);
                    }
                    if (this.patternIsDisplayed()) {
                        this.patternPile.setSelectionMode(0);
                    }
                    if (this.opponentsHandsAreDisplayed()) {
                        this.setSelectionModeOnHandStocks(0);
                    }
                    break;
            }*/
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
                    case "playerTurn":
                        switch (this.minigame) {
                            case this.TOWERING_INFERNO:
                            case this.WELL:
                                this.playerHand.setSelectionMode(1);
                                this.patternPile.setSelectionMode(1);
                                break;
                            case this.TRIPLET:
                                this.patternPile.setSelectionMode(2);
                                this.addActionButton('button_reset_selection', _('Reset selection'), 'onCancelSelection');
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

        ajaxcallwrapper: function (action, args, handler) {
            if (!args) {
                args = [];
            }
            args.lock = true;

            if (this.checkAction("playCard")) {
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
                        phrase = _("Find the common symbol with the opponent of your choice");
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

        ///////////////////////////////////////////////////
        //// Player's action

        /*
        
            Here, you are defining methods to handle player's action (ex: results of mouse click on 
            game objects).
            
            Most of the time, these methods:
            _ check the action is possible at this game state.
            _ make a call to the game server
        
        */

        /* Example:
        
        onMyMethodToCall1: function( evt )
        {
            console.log( 'onMyMethodToCall1' );
            
            // Preventing default browser reaction
            dojo.stopEvent( evt );

            // Check that this action is possible (see "possibleactions" in states.inc.php)
            if( ! this.checkAction( 'myAction' ) )
            {   return; }

            this.ajaxcall( "/dobble/dobble/myAction.html", { 
                                                                    lock: true, 
                                                                    myArgument1: arg1, 
                                                                    myArgument2: arg2,
                                                                    ...
                                                                 }, 
                         this, function( result ) {
                            
                            // What to do after the server call if it succeeded
                            // (most of the time: nothing)
                            
                         }, function( is_error) {

                            // What to do after the server call in anyway (success or failure)
                            // (most of the time: nothing)

                         } );        
        },        
        
        */
        onChooseSymbol: function (evt, selected = false, divId) {
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
                        });
                        break;
                    case this.POISONED_GIFT:
                    case this.HOT_POTATO:
                        this.ajaxcallwrapper("chooseSymbolWithPlayer", {
                            symbol: symbol,
                            player_id: this.getSelectedPlayer(divId),
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

        onCancelSelection: function (control_name) {
            dojo.query(".symbol").removeClass("stockitem_selected");
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
            console.log("notifications subscriptions setup");

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

            this.notifqueue.setSynchronous( 'cardsMove', 1000 );//carefull, card move must be finished before new round changes cards
            this.notifqueue.setSynchronous( 'newRound', 800 );
            
        },

        // TODO: from this point and below, you can write your game notifications handling methods

        notifCardsMove: function (notif) {
            console.log("notifCardsMove", notif);
            //$player_id = notif.args.player_id;
            var cards = notif.args.cards;
            var from = notif.args.from;
            var to = notif.args.to;
            var scores = notif.args.scores;
            for (const [id, score] of Object.entries(scores)) {
                this.scoreCtrl[id].setValue(score);
            }

            switch (this.minigame) {
                case this.TOWERING_INFERNO:
                    for (var card of cards) {
                        if (from == "pattern") {
                            from = "card-" + card.id;
                        }
                        if (to == this.player_id) {
                            this.playerHand.removeAll();
                            this.playerHand.addCard(card, from);
                        }
                    }
                    break;
                case this.WELL:
                    var newHand = notif.args.newHand;
                    for (var card of cards) {
                        if (from == this.player_id) {
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

                        this.playerHands[to].removeAll();
                        this.playerHands[to].addCard(card, from);
                    }
                    break;
                case this.HOT_POTATO:
                    for (var card of cards) {
                        this.getPlayerStock(to).removeAll();
                        this.getPlayerStock(to).addCard(card, this.getStockDiv(from, card));
                        this.getPlayerStock(from).removeAll();
                    }
                    break;
                default:
                    break;
            }
        },

        notifNewRound: function (notif) {
            console.log("notifNewRound", notif);
            var roundNumber = notif.args.roundNumber;
            var scores = notif.args.scores;
            console.log("round", roundNumber);
            for (const [id, score] of Object.entries(scores)) {
                this.scoreCtrl[id].setValue(score);
            }
            dojo.byId("roundNb").innerHTML = roundNumber;
        },

        notifSpotFailed: function (notif) {
            console.log("notifSpotFailed", notif);
            //adds shake effect
            var cards = this.selectedCardDivs;
            if (cards) {
                for (const card of cards) {
                    dojo.addClass(card, "shake");
                }
            }
        }
    });
});
