@extends('base')
@section('content')
<div class="container">
   <div class="row">
   <div class="col-sm-8 shadow-sm p-3 mb-5 bg-body rounded">
    <h4 class="text-white text-center" style="background-color:deeppink">Vendas de hoje</h4>
     
    <div class="card mt-4">
      <div class="card-body text-center">
        <h2 id="luanaca" style="color:blue">R$:</h2>
      </div>
    </div>
    <br><hr>
    <details open>
   <summary style="font-size: 25px;">Detalhas De Vendas♣</summary>

      <table class="table table-bordered" style="font-style:italic">
        <thead class="bg-dark text-white">
          <tr>
            <th>Nome</th>
            <th>Preço unitário</th>
            <th>Quantidade</th>
            <th>Valor total</th>
             <th>desconto</th>
             <th>Total Pagar</th>

          </tr>
        </thead>
        <tbody>
          @php $totals=0 ;@endphp
          @foreach($relatorios as $r)
          <tr>
            <td>{{$r->n}}</td>
            <td>{{'R$'. $r->pv}}</td>
            <td>{{$r->t}}</td>
            <td>{{'R$'.$r->t*$r->pv.'.00'}}</td>
            <td>R${{$r->pv-$r->tp}}.00</td>
            <td>{{'R$'.$r->tp .'.00'}}</td>
          </tr>
          @php $totals+=$r->tp ; @endphp
          @endforeach
        </tbody>
      </table>
      <p data-totals="{{$totals}}" id="pk"></p>
    </details>
  </div>

  <div class="col-sm-4 shadow-sm p-3 mb-5 bg-body rounded">
  <h5 class="bg-dark text-white text-center">Quero saber as vendas passadas</h5>
  <form action="">
    <div class="form-group">
      <label for="">Data inicial</label>
      <input type="date" class="form-control" id="date1">
    </div>
    <div class="form-group">
      <label for="">Data Finale</label>
      <input type="date" class="form-control" id="date2">
      <button class="btn btn-primary form-control mt-3" type="button" id="procurar">Procurar saber</button>
    </div>
  </form>
  </div>
   </div>
</div>
<div class="container costumers text-dark" id="datarelatoriointerval"></div>
@section('scripts')
<script>
  $('#luanaca').text('R$:'+$('#pk').attr('data-totals') +".00");
  $(document).on('click','#procurar',function(){
    var date1=$('#date1').val();
    var date2=$('#date2').val();
    $.post("{{route('relatoriointerval')}}",{date1:date1,date2:date2},(result)=>{
      $('#datarelatoriointerval').html(result);
      $('#intervaldate').text(result.date1+ " a "+  result.date2);
    })

  })
</script>
<script>
  $(function(){
    
  })
</script>
@endsection
@endsection