<?php

namespace App\Services;

use App\Models\Employe;
use App\Models\Endereco;
use App\Models\user;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeService
{
    public  function save_employe(Employe $employe,Endereco $endereco)
    {
      try{
        DB::beginTransaction();
        $employe->save();
        $endereco->employe_id=$employe->id;
        $endereco->save();
        $user=new user();
        $user->password=Hash::make($employe->cpf);
        $user->name=$employe->nome;
        $user->login=$employe->login;
        $user->save();
         DB::commit();
         return ['status'=>'ok','message'=>'O empregado foi adicionado com successo'];
      }catch(Exception $e){
        Log::error('error',['file'=>'EmployeService.save_employe','message'=>$e->getMessage()]);
        DB::rollBack();
        return ['status'=>'error','message'=>'O empregado nao pode ser cadastrado'];
        

      }

    }
}
