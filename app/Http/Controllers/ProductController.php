<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\product;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("product.create",['categoria'=>categoria::all(),'title'=>'cadastro de produto']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path="images/product";
        $product=new product();
        $values=$request->all();
        $product->fill($values);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name=$file->getClientOriginalName();
            $product->image=$name;
            $file->move($path,$name);
        }
        $product->save();
        return back()->with('ok','O produto foi adicionado com successo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function alterarprecoproduto(Request $request){
        $product=product::find($request->product_id);
        return response()->json($product);
    }
    public function updateprecoproduto(Request $request){
        $product=product::find($request->product_id);
        $product->valor=$request->novopreco;
        $product->update();
        return response()->json(['status'=>200]);
    }

    public function alterarquantidadeproduto(Request $request){
        $product=product::find($request->product_id);
        return response()->json($product);
    }
    public function updatequantidadeproduto(Request $request){
        $product=product::find($request->product_id);
        $product->stoock+=$request->novaquantidade;
        $product->update();
        return response()->json(['status'=>200]);
    }

    
    public function alterarnomeproduto(Request $request){
        $product=product::find($request->product_id);
        return response()->json($product);
    }
    public function updatenomeproduto(Request $request){
        $product=product::find($request->product_id);
        $product->nome=$request->novonome;
        $product->update();
        return response()->json(['status'=>200]);
    }


    public function excluirproduto(Request $request)
    {
        if($request->product_id)
        {
           product::where('id',$request->product_id)->delete(); 
           return response()->json(['status'=>200]);
        }
    }
}
