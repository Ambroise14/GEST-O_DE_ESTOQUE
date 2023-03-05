<?php

namespace App\Services;

use App\Models\cart;
use App\Models\Employe;
use App\Models\Endereco;
use App\Models\itemorder;
use App\Models\order;
use App\Models\product;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class VenteService
{
   public static function venda($total,$desconte){
    try{
      DB::beginTransaction();
     $order=new order();
      $hoje=Date('Y-m-d:H:i');
      $order->totalpedido=VenteService::getTotal();
      $order->desconto=$desconte;
      $order->totalpagar=$total;
      $order->datepagar=Date('Y-m-d');
      $order->datapedido=$hoje;
      $order->employe_id=Auth::id();
      $order->save();
      foreach(VenteService::getCart() as $item){
       $list=new itemorder();
       $list->order_id=$order->id;
       $list->qts=$item->qts;
       $list->valor=$item->product->valor;
       $list->product_id=$item->product_id;
       $list->totalcommande=$order->totalpagar;
       $list->datepagar=Date('Y-m-d');
       $list->save();
      }
      DB::commit();
     return ['status'=>'ok','message'=>'A venda foi finalizada com successo'];
      

    }catch(Exception $e){
     Log::error('error',['file'=>'VenteService.venda','message'=>$e->getMessage()]);
     DB::rollBack();
     return ['status'=>'error','message'=>'o servidor encontrou um problema ,tente novamente'];
    }
    
   }

   public static function  getTotal()
   {
    $cart=cart::where('employe_id',Auth::id())->get();
    $total=0;
    foreach($cart as $item){
    $total+=$item->product->valor*$item->qts;
    }
    return $total;

   }

   public static function getCart(){
    $cart=cart::where('employe_id',Auth::id())->get();
    return $cart;
   }
   
   public static function UpdateCart(){
    $cart=cart::where('employe_id',Auth::id())->get();
    foreach($cart as $ip){
      $product=product::find($ip->product_id);
      $product->stoock=$product->stoock-$ip->qts;
      $product->update();

    }
    return $cart;
   }

   public static function DeleteCart(){
    $cart=cart::where('employe_id',Auth::id());
    return $cart->delete();
   }
   
   public static function getAllorder(){
    
    return order::all();
   }

}
