@extends('base')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-body" style="background-color:deeppink;color:white"><h2 class="text-center">Cadastro de Empregado</h2></div>
</div>
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          
  <form action="{{route('employe.store')}}" method="post">
  @csrf
  <div class="row">
  <div class="form-group col-6">
      <label for="Name">Nome:</label>
      <input type="text" name="nome" class="form-control" placeholder="digite o nome de usuario">
    </div>
    <div class="form-group col-6">
      <label for="Name">Departement:</label>
      <select class="form-control" name="departement_id">
     @if(isset($departement) && count($departement)>0)
                @foreach($departement as $dep)
                <option value="{{$dep->id}}">{{$dep->nome}}</option>
                @endforeach
     @endif
     </select>
    </div>
    <div class="form-group col-6">
      <label for="Name">Login:</label>
      <input type="text" name="login" class="form-control" placeholder="digite o login de usuario">
    </div>
    <div class="form-group col-6">
      <label for="Name">CPF:</label>
      <input type="text" name="cpf" class="form-control" placeholder="digite o CPF de usuario">
    </div>
    <div class="form-group col-6">
      <label for="Name">Salaire Brut:</label>
      <input type="text" name="salaire" class="form-control" placeholder="digite o salaire de usuario">
    </div>
    <div class="form-group col-6">
      <label for="Name">CEP:</label>
      <input type="text" name="cep" class="form-control" placeholder="digite o email de usuario" id="cep">
    </div>
    <div class="form-group col-12">
      <label for="Name">Cidade:</label>
      <input type="email" name="cidade" class="form-control" placeholder="digite a cidade de usuario" id="cidade"  readonly>
    </div>
    
    <div class="form-group col-12">
      <label for="Name">Endereço:</label>
      <input type="text" name="endereco" class="form-control" placeholder="digite o endereço de usuario" id="lograduro" readonly>
    </div>
    <div class="form-group col-12">
      <label for="Name">Bairro:</label>
      <input type="text" name="bairro" class="form-control" placeholder="digite o numero da casa" id="bairro"  readonly>
    </div>
    <div class="form-group col-6">
      <label for="Name">Numero:</label>
      <input type="number" name="numero" class="form-control" placeholder="digite o numero da casa">
    </div>
    <div class="form-group col-6">
      <label for="Name">Complement:</label>
      <input type="text" name="complement" class="form-control" placeholder="digite o complement da casa">
    </div>
    <div class="form-group col-12">
      <label for="Name">Estado:</label>
      <input type="text" name="estado" class="form-control" placeholder="digite o estado de usuario" id="estado"  readonly>
    <button class="btn btn-primary mt-2 float-right">Cadastrar</button>

    </div>
  </div>
  </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

