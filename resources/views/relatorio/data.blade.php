<table class="table table-striped">
    <thead class="bg-dark text-white">
      <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>total</th>
        
      </tr>
    </thead>
    <tbody>
      @if(isset($details) && count($details)>0)
      @foreach($details as $p)
      <tr  class="bg-info text-white">
        <td>{{$p->product->nome}}</td>
        <td>{{$p->product->valor}}</td>
        <td>{{$p->qts}}</td>
        <td>{{$p->qts * $p->valor}}</td>
   
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>