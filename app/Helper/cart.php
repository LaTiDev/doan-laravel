<?php
namespace App\Helper;

class Cart{
    public $item = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
    }

    //lay ve danh sach trong cart
    public function list() {
        return $this->items;
    }

    //add product to cart
    public function add($product, $quantity = 1) {
        //mang 2 chieu. vd: [items[item]]
        //item : tung san pham muon them
        $item = [
            'productId' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
            'image' => $product->image,
            'quantity' => $quantity
        ];

        //update sp detail->cart
        if(isset($this->items[$product->id])){
            $this->items[$product->id]['quantity']+=$quantity;
        }else{
            $this->items[$product->id] = $item;
        }

        //luu vao session
        session(['cart' => $this->items]);
    }

    //update sp cart
    public function update($id, $quantity) {
        $quantity = $quantity > 0 ? $quantity : 1;
        
        $this->items[$id]['quantity'] = $quantity;
        session(['cart' => $this->items]);
    }

    //xoa sp trong gio hang
    public function delete($id) {
        
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    //xoa tat ca sp trong gio hang
    public function clear() {
        session(['cart' => '']);
    }

    //tong gia tat ca sp
    public function getTotalPrice() {

        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }

    //so sp tren gio hang
    public function getTotalQuantity() {

        $total = 0;
        foreach ($this->items as $item) {
            $total+= $item['quantity'];
        }

        return $total;
    }

}