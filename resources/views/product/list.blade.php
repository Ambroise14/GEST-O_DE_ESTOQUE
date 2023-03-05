@extends('base')
@section('css')

@endsection
@section('content')

<hr>
 <div class="container-fluid  shadow-sm p-3 mb-5 bg-white">
  <input type="hidden" class="form-control" placeholder="o que está procurando" id="myInput">
  <table class="table table-bordered myTable dataTable" id="dataTable" width="100%">
     <thead class="bg-dark text-white">
       <tr>
         <th>Image</th>
         <th>Nome</th>
         <th>Stoock</th>
         <th>Valor</th>
       
         <th>Action</th>

       </tr>
     </thead>
     <tfoot>
    
     <tr>
         <th>Image</th>
         <th>Nome</th>
         <th>Stoock</th>
         <th>Valor</th>
         <th>Action</th>
       </tr>
     </tfoot>
     <tbody>
      @foreach($products as $p)
      <tr>
      <td style="width:20px"><img src="{{asset('images/product/'.$p->image)}}" height="50px" width="70px"></td>
      <td><strong>{{$p->nome}}</strong></td>
      <td class=" @if($p->stoock <'5') alert-danger @else text-dark @endif text-center text-white">{{$p->stoock}}</td>
      <td>{{$p->valor}}</td>
     <td style="width:20px;height:10px">
     <div class="nav-item dropdown text-center bg-gradient-info" text-white float-right">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ir para
        </a>
      
        <div class="dropdown-menu float-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item alterarnomeproduto" href="#" data-toggle="modal" data-product_id="{{$p->id}}" data-target="#modal_alterar_nome_product">Alterar nome produto</a>

          <a class="dropdown-item alterarpreco" href="#" data-toggle="modal" data-product_id="{{$p->id}}" data-target="#modalproduct">Alterar o preço</a>
          <a class="dropdown-item alterarquantidade" href="#" data-toggle="modal" data-product_id="{{$p->id}}" data-target="#alterar_quantidade_product_modal">Alterar quantidade</a>
          <a class="dropdown-item excluir" href="#" data-product="{{$p->id}}">Excluir produto</a>
          <div class="dropdown-divider"></div>
        </div>
      </div>
     </td>
      </tr>
      @endforeach
     </tbody>
  </table>
 </div>
 @section('scripts')
 <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>
 <script>
  // 
  $(document).on('click','.alterarpreco',function(){
   var id=$(this).attr('data-product_id');
   $.post("{{route('alterarprecoproduto')}}",{product_id:id},(result)=>{
   $('#antigopreco').val(result.valor);
   $('#valproduto').val(result.id);
   $('.nomealterado').text(result.nome);
   })
  });

  $(document).on('click','.alt',function(){
   var id=$(this).val();
   var novopreco=$('#novopreco').val();
   $.post("{{route('updateprecoproduto')}}",{product_id:id,novopreco:novopreco},(result)=>{
    window.location.reload(true);
   })
  });
  //FIN TRAITEMENT DE PRIX

  // COMMENCEMENT TRAITEMENT DE QUANTITE

  $(document).on('click','.alterarquantidade',function(){
   var id=$(this).attr('data-product_id');
   $.post("{{route('alterarquantidadeproduto')}}",{product_id:id},(result)=>{
   $('#restoqunatidade').val(result.stoock);
   $('#product_id_alterar').val(result.id);
   $('.nomealterado').text(result.nome);
   })
  });

  $(document).on('click','.novaquantidade',function(){
   var id=$(this).val();
   var novaquantidade=$('#novaquantidade').val();
   $.post("{{route('updatequantidadeproduto')}}",{product_id:id,novaquantidade:novaquantidade},(result)=>{
    window.location.reload(true);
   })
  });
  //FIN TRAITEMENT DE QUANTITE

  $(document).on('click','.alterarnomeproduto',function(){
   var id=$(this).attr('data-product_id');
   $.post("{{route('alterarnomeproduto')}}",{product_id:id},(result)=>{
   $('#antigonome').val(result.nome);
   $('#product_id_novo').val(result.id);
   $('.nomealterado').text(result.nome);
   })
  });

  $(document).on('click','.novonome',function(){
   var id=$(this).val();
   var novonome=$('#novonome').val();
   $.post("{{route('updatenomeproduto')}}",{product_id:id,novonome:novonome},(result)=>{
    window.location.reload(true);
   })
  });
  //FIN TRAITEMENT DE QUANTITE



  $(document).on('click','.excluir',function(){
   var id=$(this).attr('data-product');
   $.post("{{route('excluirproduto')}}",{product_id:id},(result)=>{
    window.location.reload(true);
   })
  });


 </script>

@endsection

@endsection
