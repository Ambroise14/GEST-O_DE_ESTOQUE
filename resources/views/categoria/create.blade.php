@extends('base')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="container">
<div class="card">
  <div class="card-body text-center" style="background-color:deeppink;color:white">Qual tipo de produto ,voce quer vender ? ,embaixo voce pode cadastrá-los</div>
</div>
</div>
<hr>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
  <div class="card-body">
  <form action="{{route('categoria.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="row">
  <div class="form-group col-6">
      <label for="Name">Codigo:</label>
      <input type="text" name="ref" class="form-control" placeholder="digite o codigo de categoria" value="{{old('ref')}}">
      @error('ref')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group col-6">
      <label for="Name">Nome:</label>
      <input type="text" name="nome" class="form-control" placeholder="digite o nome de categoria" value="{{old('nome')}}">
      @error('nome')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group col-12">
      <label for="Name">Image:</label>
      <input type="file" name="image" class="form-control" placeholder="digite o email de usuario">
      @error('image')
      <span class="text-danger">{{$message}}</span>
      @enderror
    <button class="btn btn-primary mt-4 float-right">Cadastrar</button>

    </div>
   
  </div>
  </form>
  </div>
</div>
    </div>
  </div>
</div>




@endsection