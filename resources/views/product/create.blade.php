@extends('base')
@section('content')
<div class="container">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body" style="background-color:deeppink;color:white">Voce pode cadastrar seus produtos aqui</div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
       <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
   @csrf
      <div class="row">
      <div class="form-group col-12">
      <label for="Name">Categoria:</label>
      <select class="form-control" name="categoria_id">
     @if(isset($categoria) && count($categoria)>0)
                @foreach($categoria as $cat)
                <option value="{{$cat->id}}">{{$cat->nome}}</option>
                @endforeach
     @endif
     </select>
    </div>
    <div class="form-group col-4">
      <label for="Ref">Ref:</label>
      <input type="text" name="ref" placeholder="digite o codigo de produto" class="form-control">
    </div>
    <div class="form-group col-8">
      <label for="Ref">Nome:</label>
      <input type="text" name="nome" placeholder="digite o nome de produto" class="form-control">
    </div>
    <div class="form-group col-12">
      <label for="Ref">Description:</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group col-6">
      <label for="Ref">Preço unitario:</label>
      <input type="text" name="valor" placeholder="digite o preço de produto" class="form-control">
    </div>
    <div class="form-group col-6">
      <label for="Ref">Stock:</label>
      <input type="text" name="stoock" placeholder="digite a quantidade total de produto" class="form-control">
    </div>

    <div class="form-group col-12">
      <label for="Ref">Image:</label>
      <input type="file" name="image" placeholder="digite o codigo de produto" class="form-control">
    <button class="btn btn-primary mt-2 float-right">Cadastrar</button>

    </div>
      </div>
   </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
                    

@endsection