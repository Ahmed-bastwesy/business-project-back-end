<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index($userId){

        try{
            if(!Cart::find($userId)){
             return response()->json(['message' => 'invalid data'], 404);
 
            }else{
             $userProducts =  
                 Cart::find($userId)
                 ->with('product')
                 ->get()->makeHidden(['created_at', 'updated_at', 'id', 'user_id', 'product_id']);
                 $userProducts = $userProducts->map(function($item){
                     return $item->product;
                 });
             $data=[ "user_id"=>$userId,'userProducts' => $userProducts];
             return response()->json($data, 200);
         }
         }catch(\Exception $e){
             return response()->json(['message' => $e->getMessage()], 500);
         }

   
}

    public function addToCart(){

        
            return 'fffffffdd';
    }
    public function removeFromCart(){
        return 'ffffff';
    }


}
