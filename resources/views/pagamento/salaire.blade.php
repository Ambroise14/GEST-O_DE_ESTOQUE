@extends('base')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h6><strong>Nome Empregado</strong> ::{{$empregado->nome}} 
          
          <details class="float-right text-info">
            <summary>Veja todos pagamentos</summary>
            <table class="table table-bordered myTable">
          <thead>
            <tr>
            <th>Salario de base</th>
            <th>prime</th>
            <th>Salario de base</th>
           <th>Data pagamento</th>

            </tr>
          </thead>
          <tbody>
           @if(isset($pagar) && count($pagar)>0)
           @foreach($pagar as $emp)
           <tr>
            <td>{{$emp->salaire}}</td>
            <td>{{$emp->prime.'%'}}</td>
            <td>{{$emp->salaire_net}}</td>
            <td>{{$emp->datapagamento}}</td>
         
           </tr>
           @endforeach
           @endif
          </tbody>
        </table>
          </details></h6>
        </div>
      </div>
    </div>
    <div class="col-12 mt-4">
      <div class="card">
        <div class="card-body">
               
       <form action="{{route('pagamentostore')}}" method="post">
       @csrf
        <input type="hidden" value="{{$empregado->id}}" name="employe_id">
       <div class="row">
       <div class="col-4">
          <div class="form-group">
              <label for="Salaire">Salario de base:</label>
              <input type="text" value="{{$empregado->salaire}}" class="form-control base" style="font-size:24px" name="salaire">
            </div>
       </div>
       <div class="col-4">
          <div class="form-group">
              <label for="Salaire">Prime:</label>
              <input type="text" class="form-control" id="prime" style="font-size:24px" name="prime">
            </div>
       </div>
       <div class="col-4">
          <div class="form-group">
              <label for="Salaire">Valor calculado com primo:</label>
              <input type="text" class="form-control luanasal" style="font-size:24px">
            </div>
       </div>
       <div class="col-7">
          <div class="form-group">
              <label for="Salaire">Data de pagamento:</label>
              <input type="date" class="form-control" style="font-size:24px" name="date">
            </div>
       </div>
       <div class="col-5">
          <div class="form-group">
              <label for="Salaire">Salario a receber:</label>
              <input type="text" class="form-control luanasal" style="font-size:24px" name="salariofinal">
            </div>
            <button class="btn btn-primary float-right mt-2">Pagar</button>
       </div>
       </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>

@section('scripts')

<script>
   $('.luanasal').val($('.base').val());
  $(document).on('keyup','#prime',function(){
    var prime=$(this).val();
    if(prime){
      var t=parseFloat($('.base').val());
     $('.luanasal').val(t+parseFloat(prime*t/100)+".00");
    }else{
      $('.luanasal').val($('.base').val())

    }
  })
</script>
<script>
  $(function(){
  })
</script>
@endsection
@endsection