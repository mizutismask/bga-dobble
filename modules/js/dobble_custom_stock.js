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
        },
        onButtonClick(event) {
            console.log("onButtonClick", event);
        },

        addCards(cards, from = undefined, replaceContent = false) {
            console.log("add cards on div", this.div);
            for (var card of cards) {
                if (from) {
                    console.log("animate ", from);
                    var animation = dojo.fx.slideTo({
                        node: from,
                        top: 150,
                        left: 160,
                        unit: "px",
                    });
                    // var animation = coreFx.fadeOut({ node: from });
                    dojo.connect(animation, "onEnd", this, function () {
                        console.log("setupCardAndZones");
                        this.removeAll();
                        this.setupCardAndZones(card);
                    });
                    console.log("animation.play");
                    animation.play();
                } else {
                    this.setupCardAndZones(card);
                }
            }

            if (this.selectionMode == 0) {
                dojo.query(this.getSymbolsQuery()).addClass("stockitem_unselectable");
            }
        },

        setupCardAndZones(card) {
            var cardId = this.div + "-card-" + card.id; //todo card.id;
            var divCard = this.game.format_block("jstpl_card", { cardId: cardId });
            dojo.place(divCard, this.div);
            dojo.setAttr(cardId, "data-card-id", card.id);
            dojo.setAttr(cardId, "data-card-type", card.type);

            this.divByCardMap.set(card, cardId);

            console.log("card", card);
            var zones = this.game.cardsDescription[card.type].zones;
            console.log("desc", this.game.cardsDescription[card.type]);

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
