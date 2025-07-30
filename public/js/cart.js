class Cart {
    constructor(key) {
        this.key = key;
        this.items = JSON.parse(localStorage.getItem(this.key)) || [];
    }

    save(item) {
        let index = this.items.findIndex(i => i.item_id == item.item_id);
        if (index !== -1) {
            this.items[index].qty += item.qty;
            this.items[index].total_discount += item.total_discount;
            this.items[index].subtotal += item.subtotal;
        } else {
            this.items.push(item);
        }
        this._sync();
    }

    delItem(id) {
        this.items = this.items.filter(i => i.item_id != id);
        this._sync();
    }

    clearCart() {
        this.items = [];
        this._sync();
    }

    getCart() {
        return this.items;
    }

    _sync() {
        localStorage.setItem(this.key, JSON.stringify(this.items));
    }
}
