<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GESTÃO DAS VENDAS</title>
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
   


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
   

    
   @yield('css')

</head>

<body id="page-top" class="shadow-sm p-3 mb-5 rounded bg-white">
@include('sweetalert::alert')
@include('sessions.alterar_preço_product')
@include('sessions.alterar_quantidade_product')
@include('sessions.detail_compra_modal')
@include('sessions.alterarnomproduto')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand  bg-primary"  href="{{route('forntend.create')}}">
               
                <div class="sidebar-brand-text">GESTÃO DAS VENDAS <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-2">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{'relatorio'== request()->path() ? 'bg-info text-white' :''}}">
                <a class="nav-link" href="{{route('relatorio')}}">
                <i class="fab fa-first-order-alt"></i>
                    <span>Relatorio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item {{'allorder'== request()->path() ? 'bg-info text-white' :''}}">
                <a class="nav-link"  href="{{route('allorder')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Todas Vendas</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item  {{'list'== request()->path() ? 'bg-info text-white' :''}}">
                <a class="nav-link" href="{{route('list')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Lista produto</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item {{'employe'== request()->path() ? 'bg-info text-white' :''}}">

                <a class="nav-link" href="{{route('employe.create')}}" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cadastro de empregado</span></a>
            </li>
            
            <hr class="sidebar-divider">

            <li class="nav-item {{'allempregado'== request()->path() ? 'bg-info text-white' :''}}">

                <a class="nav-link" href="{{route('allempregado')}}" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pagamento Salario</span></a>
            </li>

            <hr class="sidebar-divider">
         <li class="nav-item {{'categoria'== request()->path() ? 'bg-info text-white' :''}}">
                <a class="nav-link" href="{{route('categoria.create')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Adicionar categoria</span></a>
            </li>


            <hr class="sidebar-divider">

            <li class="nav-item {{'product'== request()->path() ? 'bg-info text-white' :''}}">
                <a class="nav-link" href="{{route('product.create')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Adicionnar produto</span></a>
            </li>

            <li class="nav-item {{'alluser'== request()->path() ? 'bg-info text-white' :''}}">
                <a class="nav-link" href="{{route('alluser')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Todos Usuário</span></a>
            </li>

            <!-- Heading -->
           
            <!-- Nav Item - Pages Collapse Menu -->
         

            <!-- Nav Item - Utilities Collapse Menu -->
          

            <!-- Divider -->
        
            <!-- Nav Item - Pages Collapse Menu -->
         

            <!-- Nav Item - Charts -->
          

            <!-- Nav Item - Tables -->
         

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                 
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Qual produto está procurando ?" id="talon" style="font-size:18px ;">
                            
                        </div>
                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append" id="talon">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                      

                        <!-- Nav Item - Messages -->
                      
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if(Auth::check()) {{Auth::user()->name}}
                                 @else
                                 <span id="logar">
                                   Logar
                                 </span>
                                @endif
                                <img class="img-profile rounded-circle"
                                    src="{{asset('template/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
              

                <div class="container-fluid">
               
             
                    <div class="row">
                   
                      @yield('content')
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Quer sair de sistema ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">NAO</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">SIM</a>
                </div>
            </div>
        </div>
    </div>  

    <!-- Bootstrap core JavaScript-->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



<!-- Page level custom scripts -->

<script src="{{asset('assets/plugins/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  
    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>

 

 




    @yield('scripts')
    <script>
      $(function(){$('#cpf').mask('000.000.000-00')})

      $("#cep").on('blur',function(){
        if(this.value){
          $.ajax({
            url:"https://api.postmon.com.br/v1/cep/"+this.value,
            dataType:'json',
            crossDomain:true,
            statusCode:{
              200:function(data){
                console.log(data);

              $('#lograduro').val(data.logradouro);
              $('#cidade').val(data.cidade);
              $('#estado').val(data.estado);
              $('#bairro').val(data.bairro);
              },
              400:function(msg){
                console.log(msg);

              },
              404:function(msg){
                console.log(msg);
              },
            }

          })
        }
      })
    </script>

<script>
$(document).ready(function(){
  $("#talon").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  @if(!Auth::check())
  <script>
    window.location.href="{{url('user')}}";
  </script>
  @endif

</body>

</html>