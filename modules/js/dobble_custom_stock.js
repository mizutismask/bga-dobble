define([], function () {
    return "value";
});
  
class DobbleStock {
	constructor(game, div) {
		console.log('game constructor');
		this.game = game;
        this.div = div;
        this.setSelectionMode(1);
        this.divByCardMap = new Map();
	}
	onButtonClick(event) {
		console.log('onButtonClick',event);
    };
    
    addCards(cards) {
        for (var card_id in cards) {
            var card = cards[card_id];
            var cardId = "card_" + card.type;//card.id;
            var divCard = this.game.format_block('jstpl_card', { cardId: cardId });
            dojo.place(divCard, this.div);
            dojo.setAttr(cardId, "data-card-id", card.id);
            dojo.setAttr(cardId, "data-card-type", card.type);

            this.divByCardMap.set(card, cardId);
            
            console.log("card",card);
            var zones = this.game.cardsDescription[card.type].zones;
            console.log("desc",this.game.cardsDescription[card.type]);
           
            for (const i in zones) {
                var z = zones[i];
                var zoneId = cardId + "-zone-" + i;
                var zoneContent = this.game.format_block('jstpl_card_zone', {
                    zoneId:zoneId,
                    top: z.top,
                    left: z.left,
                    rotation: z.rotation,
                    symbolClass: "symbol-" + i,
                    size: z.size,
                });
                dojo.place(zoneContent, cardId);
                dojo.setAttr(zoneId, "data-symbol", i);
                dojo.connect(dojo.byId(zoneId), "onclick",this,"onClickZone");
            }
        }

        if (this.selectionMode == 0) {
            dojo.query(".symbol").addClass("stockitem_unselectable");
        }
            
    }
    
    addCard(card, from) {
        this.addCards([card]);
    }

    //same as classic stock
    setSelectionMode(mode) {
        console.log("setSelectionMode", mode);
        this.selectionMode = mode;
        if (mode == 0) {
            dojo.query(".symbol").addClass("stockitem_unselectable");
        } else {
            dojo.query(".symbol").removeClass("stockitem_unselectable");
        }
    }

    removeAll() {
        dojo.empty(this.div);
        this.divByCardMap = new Map();
    }

    onClickZone(evt) {
        if (this.selectionMode == 0) return;
        //gets the clicked symbol
        var symbol = dojo.getAttr(evt.currentTarget.id, "data-symbol");

        //allows one selection by card
        var newSelection = !dojo.hasClass(evt.currentTarget.id, "stockitem_selected");
        if (newSelection) {
            //deselect previous selection
            dojo.query("#"+evt.currentTarget.parentElement.id+" .symbol").removeClass("stockitem_selected");
        }
        dojo.toggleClass(evt.currentTarget.id, "stockitem_selected");
        
        console.log("onClickZone ", symbol);
        dojo.publish("onChangeSelection", [evt, newSelection]);
    }

    selectItem(cardId) {
        //dojo.toggleClass(this.divByCardMap., "stockitem_selected");
    }

    /**
    Returns a list of card ids.
    */
    getSelectedItems() {
        var selectedCardDivs = dojo.query(".card > .stockitem_selected");
                        console.log("selectedCardDivs",selectedCardDivs);
        var selectedCardIds = selectedCardDivs.map(div => dojo.getAttr(div.parentElement.id, "data-card-id"));
        return selectedCardIds;
    }

    unselectAll() {
        dojo.query("#"+this.div+" .symbol").removeClass("stockitem_selected");
    }

    count() {
        return this.divByCardMap.size;
    }

    /** by card id */
    getItemById(cardId) {
        this.divByCardMap.keys.filter(c => c.id = cardId);
    }

    getAllItems() {
        return this.divByCardMap.keys;
    }
};