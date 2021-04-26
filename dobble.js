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

define(["dojo", "dojo/_base/declare", "ebg/core/gamegui", "ebg/counter", "ebg/stock"], function (dojo, declare) {
    return declare("bgagame.dobble", ebg.core.gamegui, {
        constructor: function () {
            console.log("dobble constructor");

            this.cardwidth = 200;
            this.cardheight = 200;
            this.image_items_per_row = 10;
            this.cards_img = "img/cards/cards200x200.png";

            this.TOWERING_INFERNO = 1;
            this.WELL = 2;
            this.HOT_POTATO = 3;
            this.POISONED_GIFT = 4;
            this.TRIPLET = 5;
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

            this.minigame = parseInt(gamedatas.minigame);
            // Setting up player boards
            for (var player_id in gamedatas.players) {
                var player = gamedatas.players[player_id];

                // TODO: Setting up players boards if needed
            }
            console.log("minigame ", this.minigame);

            // TODO: Set up your game interface here, according to "gamedatas"
            if (
                this.minigame == this.WELL ||
                this.minigame == this.TOWERING_INFERNO ||
                this.minigame == this.HOT_POTATO
            ) {
                //---------- Player hand setup
                this.playerHand = this.createStock("myhand");
                this.createCardTypes(this.playerHand);
                this.addCardsToStock(gamedatas.hand, this.playerHand);
            }

            if (
                this.minigame == this.WELL ||
                this.minigame == this.TOWERING_INFERNO ||
                this.minigame == this.POISONED_GIFT
            ) {
                this.patternPile = this.createStock("pattern_pile");
                this.createCardTypes(this.patternPile);
                this.addCardsToStock(gamedatas.pattern, this.patternPile);
            }

            if (this.minigame == this.POISONED_GIFT || this.minigame == this.HOT_POTATO) {
                this.playerHands = [];

                for (var player_id of gamedatas.playerorder) {
                    if (player_id != this.player_id) {
                        playerHand = this.createStock("player_hand_stock_" + player_id);
                        playerHand.setSelectionMode(1);
                        this.createCardTypes(playerHand);
                        this.addCardsToStock(gamedatas.pattern, playerHand);

                        dojo.connect(playerHand, "onChangeSelection", this, "onSelectOpponentHand");
                        this.playerHands[player_id] = playerHand;
                    }
                }
            }

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
                    switch (this.minigame) {
                        case this.TOWERING_INFERNO:
                        case this.WELL:
                        case this.POISONED_GIFT:
                            var patterns = args.args.pattern;
                            this.patternPile.removeAll();
                            this.addCardsToStock(patterns, this.patternPile);
                            break;
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
                                    this.addCardsToStock(cards, playerStock);
                                }
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

            switch (stateName) {
                /* Example:
            
            case 'myGameState':
            
                // Hide the HTML block we are displaying only during this game state
                dojo.style( 'my_html_block_id', 'display', 'none' );
                
                break;
           */

                case "dummmy":
                    break;
            }
        },

        // onUpdateActionButtons: in this method you can manage "action buttons" that are displayed in the
        //                        action status bar (ie: the HTML links in the status bar).
        //
        onUpdateActionButtons: function (stateName, args) {
            console.log("onUpdateActionButtons: " + stateName, args);

            if (this.isCurrentPlayerActive()) {
                switch (stateName) {
                    case "playerTurn":
                        if (args.possibleSymbols) {
                            var symbols = args.possibleSymbols;
                            for (const s of symbols) {
                                console.log(s);
                                this.addActionButton("button_symbol_" + s, _(s), "onChooseSymbol"); //_('s')
                            }
                        }

                        if (args.hands) {
                            var hands = args.hands;
                            for (const [playerId, cards] of Object.entries(hands)) {
                                if (playerId != this.player_id) {
                                    for (const c of cards) {
                                        for (const s of c.symbols) {
                                            console.log(s);
                                            var buttonId = "button_" + playerId + "_symbol_" + s;
                                            this.addActionButton(buttonId, _(s), "onChooseSymbol"); //_('s')
                                            dojo.style(buttonId, "display", "none");
                                            dojo.setAttr(buttonId, "data-player-id", playerId);
                                            dojo.setAttr(buttonId, "data-symbol", s);
                                        }
                                    }
                                }
                            }
                        }
                        break;
                    /*               
                 Example:
 
                 case 'myGameState':
                    
                    // Add 3 action buttons in the action status bar:
                    
                    this.addActionButton( 'button_1_id', _('Button 1 label'), 'onMyMethodToCall1' ); 
                    this.addActionButton( 'button_2_id', _('Button 2 label'), 'onMyMethodToCall2' ); 
                    this.addActionButton( 'button_3_id', _('Button 3 label'), 'onMyMethodToCall3' ); 
                    break;
*/
                }
            }
        },

        ///////////////////////////////////////////////////
        //// Utility methods

        /*
        
            Here, you can defines some utility methods that you can use everywhere in your javascript
            script.
        
        */
        createStock: function (divName) {
            var stock = new ebg.stock(); // new stock object for hand
            console.log("creation stock ", divName);
            stock.create(this, $(divName), this.cardwidth, this.cardheight); //myhand is the div where the card is going
            stock.image_items_per_row = this.image_items_per_row;
            stock.item_margin = 6;
            stock.apparenceBorderWidth = "2px";
            stock.setSelectionAppearance("class");
            stock.setSelectionMode(0);
            stock.autowidth = true;
            return stock;
        },

        addCardsToStock: function (cards, stock) {
            for (var card_id in cards) {
                var card = cards[card_id];
                stock.addToStockWithId(card.type, card.id);
            }
        },
        getFormatedType: function (typeNumber) {
            return typeNumber < 10 ? "0" + typeNumber : typeNumber;
        },

        createCardTypes: function (stock) {
            for (let i = 0; i < 55; i++) {
                var formattedNumber = this.getFormatedType(i);
                stock.addItemType(formattedNumber, 0, g_gamethemeurl + this.cards_img, i);
            }
        },

        ajaxcallwrapper: function (action, args, handler) {
            if (!args) {
                args = [];
            }
            args.lock = true;

            //if (this.checkAction(action)) {
            this.ajaxcall(
                "/" + this.game_name + "/" + this.game_name + "/" + action + ".html",
                args, //
                this,
                (result) => {},
                handler
            );
            //}
        },

        getSelectedPlayer: function () {
            for (var player_id in this.playerHands) {
                var stock = this.playerHands[player_id];
                if (stock.getSelectedItems().length > 0) {
                    return player_id;
                }
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
                fromDiv += "_item_" + card.id;
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
        onChooseSymbol: function (evt) {
            var symbol = dojo.getAttr(evt.currentTarget.id, "data-symbol");
            console.log("onChooseSymbol ", symbol);

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
                        if (!this.getSelectedPlayer()) {
                            this.showMessage(_("You have to select a player first"), "error");
                        } else {
                            this.ajaxcallwrapper("chooseSymbolWithPlayer", {
                                symbol: symbol,
                                player_id: this.getSelectedPlayer(),
                            });
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
            var clickedPlayerId = null;
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
                        if (this.minigame == this.HOT_POTATO) {
                            dojo.query("#generalactions [data-player-id=" + player_id + "]").style("display", "none");
                        }
                    }
                }
                if (this.minigame == this.HOT_POTATO) {
                    this.onSelectOpponentHandDisplayActionButtons(clickedPlayerId);
                }
            } else if (this.minigame == this.HOT_POTATO) {
                dojo.query("#generalactions [data-player-id]").style("display", "none");
            }
        },

        /**
         * Displays action buttons on selection for hot potato.
         */
        onSelectOpponentHandDisplayActionButtons: function (playerId) {
            dojo.query("#generalactions [data-player-id=" + playerId + "]").style("display", "inline");
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
            dojo.subscribe("cardsMove", this, "notifCardsMove");
        },

        // TODO: from this point and below, you can write your game notifications handling methods

        notifCardsMove: function (notif) {
            console.log("notifCardsMove", notif);
            //$player_id = notif.args.player_id;
            var cards = notif.args.cards;
            var from = notif.args.from;
            var to = notif.args.to;

            switch (this.minigame) {
                case this.TOWERING_INFERNO:
                    if (to) {
                        this.scoreCtrl[to].incValue(1);
                    }

                    for (var card of cards) {
                        if (from == "pattern") {
                            from = "pattern_pile_item_" + card.id;
                        }
                        if (to == this.player_id) {
                            this.playerHand.removeAll();
                            this.playerHand.addToStockWithId(card.type, card.id, from);
                        }
                    }
                    break;
                case this.WELL:
                    var newHand = notif.args.newHand;
                    if (from) {
                        this.scoreCtrl[from].incValue(1);
                    }

                    for (var card of cards) {
                        if (from == this.player_id) {
                            var fromDiv = "myhand_item_" + card.id;

                            this.patternPile.removeAll();
                            this.patternPile.addToStockWithId(card.type, card.id, fromDiv);
                        }
                    }
                    if (from == this.player_id && newHand) {
                        //display the card under my pile
                        this.playerHand.removeAll();
                        this.playerHand.addToStockWithId(newHand.type, newHand.id);
                    }
                    break;
                case this.POISONED_GIFT:
                    if (to) {
                        this.scoreCtrl[to].incValue(-1);
                    }

                    for (var card of cards) {
                        if (from == "pattern") {
                            from = "pattern_pile_item_" + card.id;
                        }

                        this.playerHands[to].removeAll();
                        this.playerHands[to].addToStockWithId(card.type, card.id, from);
                    }
                    break;
                case this.HOT_POTATO:
                    for (var card of cards) {
                        this.getPlayerStock(to).removeAll();
                        this.getPlayerStock(to).addToStockWithId(card.type, card.id, this.getStockDiv(from, card));
                        this.getPlayerStock(from).removeAll();
                    }
                    break;
                default:
                    break;
            }
        },
    });
});
