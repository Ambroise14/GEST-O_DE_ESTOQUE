@extends('base')
@section('css')
<style>
  .dt-button.red {
        color: red;
    }
 
    .dt-button.orange {
        color: orange;
    }
 
    .dt-button.blue {
        color: blue;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/datatables.min.css"/>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-body" style="background-color:black;color:white"><h6 class="text-center">Todos Usuarios</h6></div>
</div>
    </div>
  </div>
</div>
<div class="container mt-4">
 
        <table id="examplee" class="table table-striped table-bordered">
          
            <thead class="bg-info">
              
              <tr>
                <th>Numero User</th>
                <th>Nome</th>
                <th>Login</th>
                <th>papel</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($users) && count($users)>0)
              @foreach($users as $u)
              <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->login}}</td>
                <td>{{$u->estado()}}</td>

              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
   
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/datatables.min.js"></script>

    
<script>
  $(document).ready(function(){
    $('#examplee').DataTable({
     
      dom: 'Bfrtip',
      responsive:"true",
     
        scrollCollapse: true,
        paging: true,
        LengthPage:30,
      buttons: [
        {
            extend: 'pdf',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ]
   
    });
     
  });
</script>
@endsection
@endsection
