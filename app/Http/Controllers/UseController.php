<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UseController extends Controller
{
  
    public function login(){
        return view('user.login',['title'=>'Cadastro de Usuario']);
    }

  
    public function store(Request $request) {
       $request->validate(['login'=>'required','password'=>'required']);
       $credentials=['login'=>$request->login,'password'=>$request->password];
       if(Auth::attempt($credentials)){
        return redirect("catalogue");
       }else{
        dd('nom');
       }

    }

    public function rep() {
        return view('user.register',['title'=>'Cadastro de Usuario']);
    }

    public function register(Request $request){
        $user=new User();
        $user->name=$request->nome;
        $user->login=$request->login;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('allempregado')->with('ok','usuario foi adicionado com successo');
    }

    public function alluser(Request $request){
        $data=[];
        $user=User::all();
        $data['users']=$user;
        return view('user.list',$data);
    }

    public function showcart(Request $request){
        $data=[];
        $cart=cart::all();
        return view('cart.data',compact('cart'));
    }

public function logout(){
    Auth::logout();
    return redirect('catalogue');
}

  

    
}
