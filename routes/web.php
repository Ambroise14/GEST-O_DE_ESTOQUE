<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DepartementControl;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('base');
});

//TRAITEMENT DE UTILISATEUR
Route::get('user',[UseController::class,'login'])->name('user.create');
Route::post('user.store',[UseController::class,'store'])->name('user.store');

Route::get('register',[UseController::class,'rep'])->name('register');
Route::post('user.register',[UseController::class,'register'])->name('user.register');

Route::get('logout',[UseController::class,'logout'])->name('logout');

Route::get('alluser',[UseController::class,'alluser'])->name('alluser');
//test
Route::get('test',[categoriaController::class,'indexo'])->name('test');


//TRAITEMENT DE DEPARTEMENT

Route::get('departement',[DepartementController::class,'create'])->name('departement.create');
Route::post('departement.store',[DepartementController::class,'store'])->name('departement.store');



//TRAITEMENT DE EMPLOYE
Route::get('employe',[EmployeController::class,'create'])->name('employe.create');
Route::post('employe.store',[EmployeController::class,'store'])->name('employe.store');


//TRAITEMENT DE  CATEGORIA
Route::get('categoria',[CategoriaController::class,'create'])->name('categoria.create');
Route::post('categoriap',[CategoriaController::class,'store'])->name('categoria.store');


//TRAITEMENT DE  PRODUCT

Route::get('product',[ProductController::class,'create'])->name('product.create');
Route::post('categoria',[ProductController::class,'store'])->name('product.store');

Route::post('alterarprecoproduto',[ProductController::class,'alterarprecoproduto'])->name('alterarprecoproduto');
Route::post('updateprecoproduto',[ProductController::class,'updateprecoproduto'])->name('updateprecoproduto');

Route::post('alterarquantidadeproduto',[ProductController::class,'alterarquantidadeproduto'])->name('alterarquantidadeproduto');
Route::post('updatequantidadeproduto',[ProductController::class,'updatequantidadeproduto'])->name('updatequantidadeproduto');

Route::post('excluirproduto',[ProductController::class,'excluirproduto'])->name('excluirproduto');

Route::post('alterarnomeproduto',[ProductController::class,'alterarnomeproduto'])->name('alterarnomeproduto');

Route::post('updatenomeproduto',[ProductController::class,'updatenomeproduto'])->name('updatenomeproduto');
//TRAITEMENT DE  Frontend

Route::get('datacatalogue',[FrontendController::class,'create'])->name('datacatalogue');


Route::get('list',[FrontendController::class,'list'])->name('list');


//TRAITEMENT DE  PANIER

Route::post('add-tocart',[CartController::class,'addtocart'])->name('adtocart');

Route::get('showcart',[CartController::class,'showcart'])->name('showcart');

Route::post('updatecart',[CartController::class,'updatecart'])->name('updatecart');
Route::post('deletecart',[CartController::class,'deletecart'])->name('deletecart');


//TRAITEMENT DE  VENTE


Route::post('venda',[FrontendController::class,'venda'])->name('venda');
Route::post('order_details',[FrontendController::class,'order_details'])->name('order_details');


//TRAITEMENT DE COMPTE RELATORIO
Route::get('allorder',[FrontendController::class,'allorder'])->name('allorder');



Route::post('relatoriointerval',[FrontendController::class,'relatoriointerval'])->name('relatoriointerval');


Route::get('visionadmin',[FrontendController::class,'visionadmin'])->name('visionadmin');

//TRAITEMENT DE PAGAMENTO DE EMPREGADO
Route::get('allempregado',[PagamentoController::class,'allempregado'])->name('allempregado');

Route::get('/{empregado_id}/pagamento',[PagamentoController::class,'index'])->name('pagamento');
Route::post('pagamentostore',[PagamentoController::class,'storepagamento'])->name('pagamentostore');

Route::middleware(['auth'])->group(function(){
Route::get('relatorio',[FrontendController::class,'relatorio'])->name('relatorio');
Route::get('catalogue',[FrontendController::class,'catalogue'])->name('forntend.create');
  
});