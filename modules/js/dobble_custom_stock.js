define(["dojo", "dojo/_base/declare", "dojo/fx", "dojo/dom", "dojo/dom-geometry"], function (
    dojo,
    declare,
    coreFx,
    dom,
    domGeom
) {
    return declare("dobble.stock", null, {
        //DobbleStock
        //class DobbleStock {
        constructor(game, div) {
            console.log("game constructor");
            this.game = game;
            this.div = div;
            this.setSelectionMode(1);
            this.divByCardMap = new Map();
            this.emptyDiv = div + "-emptyCard";

            this.createEmptyCard();


            // Options for the observer (which mutations to observe)
            const config = { attributes: false, childList: true, subtree: false };

            // Callback function to execute when mutations are observed
            const callback = function (mutationsList, observer) {
                for (const mutation of mutationsList) {
                    if (mutation.type === 'childList' && mutation.removedNodes.length>0) {
                            for (const removed of mutation.removedNodes) {
                                //console.log("mutation", mutation, removed);
                                if (dojo.hasClass(removed, "card")) {
                                    console.log('A child card has been removed from', div ,removed);

                                }
                            }
                    }
                }
            };

            // Create an observer instance linked to the callback function
            this.observer = new MutationObserver(callback);

            // Start observing the target node for configured mutations
            this.observer.observe($(div), config);
        },
        onButtonClick(event) {
            console.log("onButtonClick", event);
        },

        createEmptyCard() {
            var cardId = this.emptyDiv;
            var divCard = this.game.format_block("jstpl_card", { cardId: cardId });
            dojo.place(divCard, this.div);
            dojo.setAttr(cardId, "data-card-id", -1);
            dojo.setAttr(cardId, "data-card-type", "empty");
            dojo.addClass(cardId, "dbl_card_size");
            dojo.addClass(cardId, "dbl_empty_card");
        },

        addCards(cards, from = undefined, replaceContent = false) {
            if (cards && cards.length && dojo.byId(this.emptyDiv)) {
                dojo.destroy(this.emptyDiv);
            }

            console.log("add cards on div", this.div, "from", from, cards);
            for (var card of cards) {
                if (from) {
                    //change the parent because the object needs to exist during animation, so the previous stock can not delete it
                    this.game.attachToNewParent(from, this.div);
                    //animates the src object
                    var animation_id = this.game.slideToObjectPos(from, this.div, 0, 0);
                    dojo.connect(animation_id, 'onEnd', dojo.hitch(this, 'resetCardAfterSlide', from, card));//changes the slided object by the real one
                    animation_id.play();
                } else {
                    this.setupCardAndZones(card);
                }
            }

            if (this.selectionMode == 0) {
                dojo.query(this.getSymbolsQuery()).addClass("stockitem_unselectable");
            }
        },

        // this will be called after the animation ends
        resetCardAfterSlide: function (from, card) {
            dojo.destroy(from);//destroys the clone made by attachToNewParent who does not respond to clicks
            this.setupCardAndZones(card);//recreate a working card
        },

        setupCardAndZones(card) {
            var cardId = "card-" + card.id;
            var divCard = this.game.format_block("jstpl_card", { cardId: cardId });
            dojo.place(divCard, this.div);
            dojo.setAttr(cardId, "data-card-id", card.id);
            dojo.setAttr(cardId, "data-card-type", card.type);
            dojo.addClass(cardId, "dbl_card_size");

            this.divByCardMap.set(card, cardId);

            console.log("setupCardAndZones", card);
            var zones = this.game.cardsDescription[card.type].zones;
            //console.log("desc", this.game.cardsDescription[card.type]);

            for (const i in zones) {
                var z = zones[i];
                var zoneId = cardId + "-zone-" + i;
                var zoneContent = this.game.format_block("jstpl_card_zone", {
                    zoneId: zoneId,
                    top: z.top,
                    left: z.left,
                    rotation: z.rotation,
                    symbolClass: "symbol-" + i,
                    size: z.size,
                });
                dojo.place(zoneContent, cardId);
                dojo.setAttr(zoneId, "data-symbol", i);
                dojo.connect(dojo.byId(zoneId), "onclick", this, "onClickZone");
            }
        },

        addCard(card, from, replaceContent) {
            this.addCards([card], from, replaceContent);
        },

        //same as classic stock
        setSelectionMode(mode) {
            this.selectionMode = mode;
            if (mode == 0) {
                dojo.query(this.getSymbolsQuery()).addClass("stockitem_unselectable");
            } else {
                dojo.query(this.getSymbolsQuery()).removeClass("stockitem_unselectable");
            }
        },

        removeAll() {
            dojo.empty(this.div);
            this.divByCardMap = new Map();

            this.createEmptyCard();
        },

        onClickZone(evt) {
            if (this.selectionMode == 0) return;
            //gets the clicked symbol
            var symbol = dojo.getAttr(evt.currentTarget.id, "data-symbol");

            //allows one selection by card
            var newSelection = !dojo.hasClass(evt.currentTarget.id, "stockitem_selected");
            if (newSelection) {
                //deselect previous selection
                dojo.query("#" + evt.currentTarget.parentElement.id + " .symbol").removeClass("stockitem_selected");
            }
            dojo.toggleClass(evt.currentTarget.id, "stockitem_selected");
            dojo.toggleClass(evt.currentTarget.parentNode.id, "card_selected");

            console.log("onClickZone ", symbol);
            dojo.publish("onChangeSelection", [evt, newSelection, this.div]);
        },

        selectItem(cardId) {
            //dojo.toggleClass(this.divByCardMap., "stockitem_selected");
        },

        /**
        Returns a list of card ids.
        */
        getSelectedItems() {
            var selectedCardDivs = dojo.query(".card > .stockitem_selected");
            console.log("selectedCardDivs", selectedCardDivs);
            var selectedCardIds = selectedCardDivs.map((div) => dojo.getAttr(div.parentElement.id, "data-card-id"));
            return selectedCardIds;
        },

        unselectAll() {
            dojo.query(this.getSymbolsQuery()).removeClass("stockitem_selected");
            dojo.query(".card").removeClass("card_selected");
        },

        count() {
            return this.divByCardMap.size;
        },

        /** by card id */
        getItemById(cardId) {
            Array.from(this.divByCardMap.keys()).filter((c) => (c.id = cardId));
        },

        getAllItems() {
            return Array.from(this.divByCardMap.keys());
        },

        getSymbolsQuery() {
            return "#" + this.div + " .symbol";
        },
    });
});
