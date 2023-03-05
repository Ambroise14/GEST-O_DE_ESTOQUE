<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request){
      if(Auth::check()){
        if(cart::where('product_id',$request->idproduct)->count()>0){
          $update=cart::where('product_id',$request->idproduct)->first();
          ++$update->qts; 
          $update->update();
        return response()->json(['status'=>200]);

        }else{
          $data=new cart();
          $data->employe_id=Auth::id();
          $data->product_id=$request->idproduct;
          $data->qts=1;
          $data->save();
          return response()->json(['status'=>200]);
        }
       
      }else{
        return response()->json(['status'=>400]);
      }

    }

    
    public function showcart(Request $request){
        $cart=cart::all();
        return view('cart.data',compact('cart'));
    }

    public function updatecart( Request $request){
        $data=cart::find($request->cart_id);
        
        if($request->decision!=0){
          ++$data->qts;
        }else{
            --$data->qts;
        }
        $data->update();
        return response()->json(['status'=>200]);
    }

    public function deletecart(Request $request){
        if($request->cart_id){
            cart::where('id',$request->cart_id)->delete();
        return response()->json(['status'=>200]);

        }
    }
}
