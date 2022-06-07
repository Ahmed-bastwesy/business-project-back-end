<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

trait CartTrait {

  public function getUserCartProducts($userId){
    $userProducts =  
    Cart::where('user_id',$userId)
    ->with('product')
    ->get();
    $userProducts = $userProducts->map(function($item){
       $data= $item->product->makeHidden(['created_at', 'updated_at']);
        $data['quantity'] = $item->quantity;
        return $data;

    });
    $data=[ "user_id"=>$userId,'userProducts' => $userProducts];
    return $data;
  }


  //#####################################################################


  public function addNEwProductToCart($userId,$productId){
    $cart = new Cart();
    $cart->user_id = $userId;
    $cart->product_id = $productId;
    $cart->quantity = 1;
    $cart->save();
      }

  //#####################################################################


public function addProductToCart($userId, $productId){
  $data=['message' => "",'status' => 404];
  if(User::find($userId) == null || Product::find($productId) == null){
    return $data=['message' => "invalid data",'status' => 404];
}else{
if(Cart::where('user_id',$userId)->get()->isEmpty()){
    $this->addNEwProductToCart($userId,$productId);
    return $data = ['message' => "added successfully",'status' => 200];
}else{
    $cart = Cart::where('user_id',$userId)->where('product_id',$productId)->first();
    if($cart == null){
        $this->addNewProductToCart($userId,$productId);
        return $data = ['message' => "added successfully",'status' => 200];
    }else{
        $cart->quantity = $cart->quantity + 1;
        $cart->save();
      return $data = ['message' => "added successfully",'status' => 200];

    }

   return $massage;
}
}
}

  //#####################################################################

public function removeProductfromCart($userId, $productId){
  $data=['message' => "",'status' => 404];
  if(Cart::where('user_id',$userId)->get()->isEmpty()){
    return $data=['message' => "invalid data",'status' => 404];

}else{
    $cart= Cart::where('user_id',$userId)->where('product_id',$productId)->first();
    if($cart ==null){
        return $data = ['message' => "invalid data",'status' => 404];
    }elseif($cart->quantity>1){

        $cart->quantity = $cart->quantity - 1;
        $cart->save();
        return $data = ['message' => "removed successfully",'status' => 200];
    }
    else{
        $cart->delete();
    }
   
    return $data;
  }
}





}