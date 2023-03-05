<?php

namespace App\Http\Controllers;

use App\Models\itemorder;
use App\Models\product;
use App\Services\VenteService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function create(Request $request){
        $data=[];
        $product=product::all();
        $data['products']=$product;
        return view('loja.datacatalogue',$data);
    }
    public function catalogue(Request $request){
        $data=[];
        $product=product::all();
        $data['products']=$product;
        return view('loja.catalogue',$data);
    }

    public function list(Request $request){
        $data=[];
        $product=product::all();
        $data['products']=$product;
        return view('product.list',$data);
    }


    public function venda(Request $request){
        VenteService::venda($request->total,$request->desconto);
        VenteService::UpdateCart();
        VenteService::DeleteCart();
        return response()->json(['status'=>200,'message'=>'O pedido foi concluido com successo']);
    }

    public function order_details(Request $request){
        $data=[];
        $pedidos=itemorder::where('order_id',$request->order_id)->get();
        $data['details']=$pedidos;
        return view('relatorio.data',$data);
    }

    public function allorder(Request $request){
        $data=[];
        $pedidos=VenteService::getAllorder();
        $data['pedidos']=$pedidos;
        return view('relatorio.listpedido',$data);
    }

    public function relatorio(Request $request){
        $data=[];
        $date=Date('Y-m-d');
      $resultat=itemorder::join('products','itemorders.product_id','=','products.id')
                          ->where('datepagar',$date)
                          ->distinct('products.nome')
                           ->distinct('datepagar')
                           ->groupBy('products.id','itemorders.valor','products.nome','datepagar','itemorders.totalcommande')
                           ->get(['products.nome as n','itemorders.valor as pv','itemorders.totalcommande as tp',DB::raw('SUM(itemorders.qts) as t')]);
              
        $data['relatorios']=$resultat;
        return view('relatorio.relatorio',$data);
    }

    public function relatoriointerval(Request $request){
            $data=[];
            $resultat=itemorder::join('products','itemorders.product_id','=','products.id')
          ->whereBetween('datepagar',[$request->date1,$request->date2])
         ->groupBy('itemorders.valor','products.nome','itemorders.totalcommande')
         ->orderBy('products.nome','desc')
         ->get(['products.nome as n','itemorders.valor as pv', 'itemorders.totalcommande as tp',DB::raw('SUM(itemorders.qts) as t'),DB::raw('SUM(itemorders.valor) as v')]);
         $data['relatorios']=$resultat;
         $data['date1']=$request->date1;
         $data['date2']=$request->date2;
        return view('relatorio.datainterval',$data);
    }

    public function visionadmin(){
        return view('relatorio.espaceadmin');
    }
}
