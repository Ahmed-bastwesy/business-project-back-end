<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;
use App\Traits\CartTrait;

class CartController extends Controller
{

    use CartTrait;
    public function index($userId){

        try{
            
           if(Cart::where('user_id',$userId)->get()->isEmpty()){
            return response()->json(['message' => 'invalid data'], 404);

           }else{
            $data=$this->getUserCartProducts($userId);
            return response()->json($data, 200);
        }
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }

   
}
//##############################   ADD TO CART  #################################
    public function addToCart( $userId, $productId){

        try{
          $data= $this-> addProductToCart($userId, $productId);
          return response()->json(['message' => $data['message']], $data['status']);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

//###############################   REMOVE TO CART  ####################################

    public function removeFromCart($userId, $productId){
        try{
            
           $data=$this-> removeProductfromCart($userId, $productId);
        
            return response()->json(['message' => $data['message']], $data['status']);
            
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(),], 500);
        }
    }


}
