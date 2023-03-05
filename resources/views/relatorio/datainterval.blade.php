@if($date1 && $date2)
<details open>
   <summary>clique para me fechar,por favor</summary>
      <table class="table table-bordered">
        <thead class="bg-dark text-white">
          <tr>
            <th>Nome</th>
            <th>Preço unitario</th>
            <th>Quantidade:</th>
            <th>Valor total:</th>
            <th>Desconto</th>
            <th>Total pagar</th>
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
      <div class="card mt-1">
        <div class="card-body">
          <h2 class="text-center">Total  Vendas de <span class="bg-dark text-white"> {{$date1}} {{'a'}} {{$date2}}</span>:<output style="font-size:3rem;color:deeppink">R$:{{$totals.'.00'}}</output> </h2>
        </div>
      </div>
    </details>
@endif