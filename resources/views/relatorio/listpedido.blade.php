@extends('base')
@section('content')
<div class="container">
<div class="card">
  <div class="card-body">
  <table class="table table-bordered myTable overflow-auto dataTable" id="dataTable">
    <thead class="bg-dark text-white">
      <tr>
        <th>Data Pedido</th>
        <th>Total Pedido</th>
        <th>Detailhas Pedido</th>
        
      </tr>
    </thead>
    <tbody>
      @if(isset($pedidos) && count($pedidos)>0)
      @foreach($pedidos as $p)
      <tr>
        <td>{{$p->datapedido}}</td>
        <td class="text-center">{{'R$' .':'.$p->totalpagar }}</td>
        <td><button class="btn btn-info float-right details" order_id="{{$p->id}}" data-toggle="modal" data-product_id="0" data-target="#detail_compra_modal">
         detalhas pedido
        </button></td>

      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  </div>
</div>
</div>
@section('scripts')
 <!-- Page level plugins -->
 <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
<script>
  
  $(document).on('click','.details',function(){
   var order_id=$(this).attr('order_id');
   $.post("{{route('order_details')}}",{order_id:order_id},(result)=>{
    $('#detailsdata').html(result);
   })
  });
</script>
@endsection
@endsection
