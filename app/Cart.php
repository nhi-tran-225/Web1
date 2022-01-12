<?php
namespace App;
class Cart{
	public $product = null;
	public $totalPrice = 0;
	public $totalQuantity = 0;

	public function __construct($cart){
		if ($cart) {
			$this->product = $cart->product;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQuantity = $cart->totalQuantity;
		}
	}

	public function AddCart($product, $id){
		$newProduct  = ['quantity' =>0 , 'price' => $product->product_price, 'productInfo' =>$product];
		if($this->product){
			if(array_key_exists($id, $this->product)){
				$newProduct =$this->product[$id];
			}
		}
		$newProduct['quantity']++;
		$newProduct['price'] = $newProduct['quantity']* $product->product_price;
		$this->product[$id] = $newProduct;
		$this->totalPrice+= $product->product_price;
		$this->totalQuantity++;
	}
	public function deleteItemCart($id){
		$this->totalQuantity -= $this->product[$id]['quantity'];
		$this->totalPrice -= $this->product[$id]['price'];
		unset($this->product[$id]);
	}
	public function UpdateItemCart($id,$quantity){
		$this->totalQuantity -= $this->product[$id]['quantity'];
		$this->totalPrice -= $this->product[$id]['price'];

		$this->product[$id]['quantity'] = $quantity;
		$this->product[$id]['price'] = $quantity * $this->product[$id]['productInfo']->product_price;
		
		$this->totalQuantity += $this->product[$id]['quantity'];
		$this->totalPrice += $this->product[$id]['price'];
	}
}
?>