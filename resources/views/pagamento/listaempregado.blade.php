@extends('base')
@section('content')
<div class="container">
  <div class="row">
  <div class="col-12">
  <div class="card">
      <div class="card-body">
        <table class="table table-bordered myTable">
          <thead>
            <tr>
            <th>Nome Completo</th>
            <th>Funcão</th>
            <th>Salario de base</th>
            <th>prime</th>
          <th>Action</th>

            </tr>
          </thead>
          <tbody>
           @if(isset($employes) && count($employes)>0)
           @foreach($employes as $emp)
           <tr>
            <td>{{$emp->nome}}</td>
            <td>{{$emp->function->nome}}</td>
            <td>{{$emp->salaire}}</td>
            <td>{{$emp->prime}}</td>
          <td>
           <a href="{{route('pagamento',['empregado_id'=>$emp->id])}}">
           <button class="btn btn-primary">
              pagar
            </button>
           </a>
          </td>
           </tr>
           @endforeach
           @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection