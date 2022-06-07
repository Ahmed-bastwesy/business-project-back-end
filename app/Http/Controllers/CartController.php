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
            
           if(Cart::where('user_id',$userId)->get()->isEmpty()){
            return response()->json(['message' => 'invalid data'], 404);

           }else{
            $userProducts =  
                Cart::where('user_id',$userId)
                ->with('product')
                ->get()->makeHidden(['created_at', 'updated_at', 'id', 'user_id', 'product_id']);
                $userProducts = $userProducts->map(function($item){
                   $data= $item->product->makeHidden(['created_at', 'updated_at', 'id']);
                    $data['quantity'] = $item->quantity;
                    return $data;

                });
            $data=[ "user_id"=>$userId,'userProducts' => $userProducts];
            return response()->json($data, 200);
        }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }

   
}
//##############################   ADD TO CART  #################################
    public function addToCart( $userId, $productId){

        try{
            if(User::find($userId) == null || Product::find($productId) == null){
                return response()->json(['message' => 'invalid data'], 404);
            }else{
            if(Cart::where('user_id',$userId)->get()->isEmpty()){
                $cart = new Cart();
                    $cart->user_id = $userId;
                    $cart->product_id = $productId;
                    $cart->quantity = 1;
                    $cart->save();
                return response()->json(['message' => 'added successfully'], 200);

            }else{
                $cart = Cart::where('user_id',$userId)->where('product_id',$productId)->first();
                if($cart == null){
                    $cart = new Cart();
                    $cart->user_id = $userId;
                    $cart->product_id = $productId;
                    $cart->quantity = 1;
                    $cart->save();
                    return response()->json(['message' => 'added successfully'], 200);
                }else{
                    $cart->quantity = $cart->quantity + 1;
                    $cart->save();
                    return response()->json(['message' => 'added successfully'], 200);
                }
        
                $data=[ "user_id"=>$userId,'product_id' => $productId];
                return response()->json(['message' => 'added successfully'], 200);
            }
        }
        
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

//###############################   REMOVE TO CART  ####################################

    public function removeFromCart($userId, $productId){
        try{
            
            if(Cart::where('user_id',$userId)->get()->isEmpty()){
                return response()->json(['message' => 'invalid data'], 404);

            }else{
                $cart= Cart::where('user_id',$userId)->where('product_id',$productId)->first();
                if($cart ==null){
                    return response()->json(['message' => 'invalid data'], 404);
                }elseif($cart->quantity>1){
                    $cart->quantity = $cart->quantity - 1;
                    $cart->save();
                    return response()->json(['message' => 'removed successfully'], 200);
                }
                else{
                    $cart->delete();
                }
                $data=[ "user_id"=>$userId,'product_id' => $productId];
                return response()->json(['message' => 'removed successfully'], 200);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(),], 500);
        }
    }


}
