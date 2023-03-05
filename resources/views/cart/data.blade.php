<div class="container">
  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Preço unitário</th>
            <th>Quantidade</th>
            <th>Valor total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @php $total=0;@endphp
        @if(isset($cart) && count($cart)>0)
          @foreach($cart as $item)
          <tr>
            <td>{{$item->product->nome}}</td>
            <td>{{$item->product->valor}}</td>
            <td  class="text-center">
            <div class="input-group">
            <button type="button" class="btn btn-secondary btn-decision" data-idcart="{{$item->id}}" decision="0" style="border:0px">-</button>
            <input type="number" class="form-control text-center btn-decision" value="{{$item->qts}}" style="width:15px;border:0px" data-idcart="{{$item->id}}">
            <button type="button" class="btn btn-info btn-decision" data-idcart="{{$item->id}}" decision="1" style="border:0px">+</button>
          </div>   
            </td>
            <td>{{$item->product->valor*$item->qts}}</td>
            <td>
            <button type="button" class="btn btn btn-delete float-right" style="background-color:deeppink;color:black" data-idcart="{{$item->id}}">retirar</button>
            </td>
          </tr>
           @php $total+=$item->product->valor*$item->qts;@endphp
          @endforeach
          @else
        @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

@if($total > '0')
<div class="d-flex bd-highlight justify-content-xxl-between">
  <div class="p-2 flex-grow-1 bd-highlight"><strong>Total a pagar</strong>:<input type="text" value="{{$total}}" style="font-size:20px;border:0px;"></div>
  <div class="p-2 bd-highlight"><button class="btn btn-info venda" id="venda" value="venda">Venda</button></div>
</div>
@endif
