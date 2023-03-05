@extends('base')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="col-md-8 offset-md-2 shadow-sm p-3 mb-5 bg-white rounded">
  <form action="{{route('departement.store')}}" method="post">
    @csrf
  <div class="row">
  <div class="form-group col-12">
      <label for="Name">Codigo:</label>
      <input type="text" name="ref" class="form-control" placeholder="digite o codigo de categoria" value="{{old('ref')}}">
      @error('ref')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group col-12">
      <label for="Name">Nome:</label>
      <input type="text" name="nome" class="form-control" placeholder="digite o nome de categoria" value="{{old('nome')}}">
      @error('nome')
      <span class="text-danger">{{$message}}</span>
      @enderror
    <button class="btn btn-primary mt-2 float-right">Cadastrar</button>

    </div>
   
   
  </div>
  </form>
</div>
@endsection