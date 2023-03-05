<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

</style>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-2">G - ESTOQUE</h3>
        <div class="container">
      
        <form action="{{route('user.store')}}" method="post">
          @csrf
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                     @if($message=Session::get('okk'))
                    <div class="alert alert-danger">{{$message}}</div>
                    @endif
                    <div id="login-box" class="col-md-12">
                    
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="login" id="username" class="form-control" placeholder="Digite seu login" value="{{old('name')}}">
                                @error('login')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" placeholder="Digite seu cpf" value="{{old('password')}}">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</body>
