@extends('base')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body" id="datap"></div>
  </div>
</div>
<hr>
<div class="container mt-3">
  <div class="card">
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table table-bordered myTable dataTable" id="dataTable" width="100%">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Quantidade disponivel</th>
            <th>valor</th>
            <th>Produto</th>
          </tr>
        </thead>
        @foreach($products as $p)
        <tr>
          <td>{{$p->nome}}</td>
          <td class=" {{$p->stoock < '5' ? 'bg-danger text-white ' :''}}">{{$p->stoock}}</td>
          <td>{{$p->valor}}</td>
          <td>
            <button type="button" class="btn btn-info add-btn float-right" id-product="{{$p->id}}">Venda</button>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
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

 $(document).on('click','.add-btn',function(){
  var id=$(this).attr('id-product');
  $.post("{{route('adtocart')}}",{idproduct:id},(result)=>{
  if(result.status==400){
   window.location.href="{{route('user.create')}}";
  }else{
   showcart() 

  }
  })
 });

 $(document).on('click','.btn-decision',function(){
  var cart_id=$(this).attr('data-idcart');
  var decision=$(this).attr('decision');
  $.post("{{route('updatecart')}}",{cart_id:cart_id,decision:decision},(result)=>{
   showcart() 
  })
 });

 $(document).on('click','.btn-delete',function(){
  var cart_id=$(this).attr('data-idcart');
  $.post("{{route('deletecart')}}",{cart_id:cart_id},(result)=>{
   showcart() 
  })
 });

 $(document).on('click','#venda',function(){
  let total=$('#defaulttotalinput').val();
  let desconto=$("#desconte").val();
  $.post("{{route('venda')}}",{total:total,desconto:desconto},(result)=>{
    if(result.status==200){
     toastr.success(result.message);
    }
   showcart() 
   catalogue()
  })
 });

 function showcart(){
   $.get("{{route('showcart')}}",{},(result)=>{
    $('#datap').html(result);
  })
 }
 function catalogue(){
   $.get("{{route('datacatalogue')}}",{},(result)=>{
    $('#datacatalogue').html(result);
  })
 }
 // DESCONTE
 
 $(document).on('keyup','#desconte',function(){
  var top=parseInt($('#defaulttotalinput').val());

  var novo=parseInt($(this).val());
  $('#defaulttotalinput').val($("#pas").val()+".00"+"RS");
  $("#default_total").text($("#pas").val() +".00"+"RS");
  if(novo && novo <= top){
   $("#default_total").text(top-novo+".00"+"RS");
   $('#defaulttotalinput').val(top-novo );
  }else{
   if(novo){
     alert('O valor de desconto nao pode ser grande do que o valor da venda')
   }
  }
 });

</script>
@if($message=Session::get('okk'))
<script>
    
    toastr.success($message);                 
                  
</script>
@endif
<script>
 $(function(){
   showcart()
   catalogue() 
 })
</script>
@endsection
@endsection