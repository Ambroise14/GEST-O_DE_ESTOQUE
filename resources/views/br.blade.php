
<div class="table-responsive">
    
    <table class="table table-bordered shadow-sm p-3 mb-5 rounded" style="background:#6495ED; color:white">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Valor</th>
          <th>Quantidade</th>
          <th>Total</th>
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
            <div class="btn-group">
            <button type="button" class="btn btn-secondary btn-decision" data-idcart="{{$item->id}}" decision="0">-</button>
            <button type="button" class="btn btn-primary">{{$item->qts}}</button>
            <button type="button" class="btn btn-info btn-decision" data-idcart="{{$item->id}}" decision="1">+</button>
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
      <tfoot>
        <tr>
          <td colspan="1" style="background-color:rgb(1, 16, 22)"><span>Total:</span></td>
          <td><strong><h4 style="font-family:Matura MT Script Capitals">RS:{{$total}}.00</h4></strong></td>
        </tr>
      </tfoot>
      @if($total > '0')
        <div class="container shadow-sm p-1 mb-2 bg-white rounded">
        <div class="row">
          <div class="col-4">
            <label for="">Desconto:%</label>
            <input type="text" id="desconte" class="text-center" style="width:100px;">
          </div>
    
          <div class="col-4">
            Total a pagar:
            <strong><span id="default_total" style="font-size:2rem;color:rgb(1, 16, 22)">{{$total .'.00'}} RS</span></strong>
            <input type="hidden" id="defaulttotalinput" value="{{$total}}">
            <input type="hidden" id="pas" value="{{$total}}">
          </div>
          <div class="col-4">
            <button class="btn btn-primary float-right" type="button" id="venda">Finalizar venda</button>
          </div>
    
         
        </div>
        </div>
       @endif
      </table>
    </div>
     
    
    
    