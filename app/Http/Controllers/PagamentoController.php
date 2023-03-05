<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index($empregado_id,Request $request){
        $data=[];
        $empregado=Employe::find($empregado_id);
        $pagamento=Pagamento::where('employe_id',$empregado_id)->get();
        $data['empregado']=$empregado;
        $data['pagar']=$pagamento;
    return view('pagamento.salaire',$data);
    }


    public function allempregado(Request $request){
        $data=[];
        $empregados=Employe::all();
        $data['employes']=$empregados;
        return view('pagamento.listaempregado',$data);
        }

        public function storepagamento(Request $request){
          $pagamento=new Pagamento();
          $pagamento->salaire_net=$request->salariofinal;
          $pagamento->prime=$request->prime;  
          $pagamento->salaire=$request->salaire;
          $pagamento->datapagamento=$request->date;
          $pagamento->employe_id=$request->employe_id;
          $pagamento->save();
          return back()->with('ok','pagamento foi com uccesso');
        }
}
