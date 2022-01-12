<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
/*use Cart;*/
use App\Cart;
session_start();


class CartController extends Controller
{
    public function add_cart(Request $request, $id){
        
        $product =DB::table('tbl_product')->where('product_id',$id)->first();
        if($product != null){
                $oldCart = Session('Cart') ? Session('Cart') : null;
                $newCart = new Cart($oldCart);
                $newCart->AddCart($product,$id);
                $request->session()->put('Cart',$newCart);
        } 
        return view('pages.cart.cart_item');  
    }
    public function DeleteItemCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id); 
        if(Count($newCart->product) > 0){
            $request->session()->put('Cart',$newCart);
        } else{
            $request->session()->forget('Cart');
        }
        return view('pages.cart.cart_item');
    }
    public function ViewListCart()
    {
        return view('pages.cart.show_cart');
    }
    
    public function DeleteListCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id); 
        if(Count($newCart->product) > 0){
            $request->session()->put('Cart',$newCart);
        } else{
            $request->session()->forget('Cart');
        }
        return redirect()->back();
    }
    public function SaveListCart(Request $request, $id,$quantity)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id,$quantity);
        $request->Session()->put('Cart',$newCart) ;
        return redirect()->back();
    }
}


