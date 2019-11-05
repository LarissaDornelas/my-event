@extends('assets')
@section('title')
Meu Evento - Login
@endsection
@section('content')


<div class="container-fluid" style="height:100%; padding:0px !important;" />
<div class="row align-items-center" align="center" style="height:100%">
    <div class="col" style="height:100%">
        <img alt="Meu Evento" src={{asset('assets/images/login-bg.png')}} class="login-bg-image" />
    </div>
    <div class="col mainbox flex-column justify-content-center align-items-center" align=" center style=" height:100%">

        <div class="header-login ">

            <h4 class="login-title">Entrar</h4>
            <span class="login-subtitle1">Entre com sua conta Google </span>
            <button id="btn-fblogin" href="#" class="btn btn-google"><img class="img-google"
                    src="https://img.icons8.com/color/48/000000/google-logo.png"> Entrar com o Google</button>
            <span class="login-subtitle2">Ou entre com seu email</span>
        </div>

        <div class="panel panel-info" style="width: 50%; margin:0px !important">


            <div class="panel-body">
                @if(session('error'))
                <div style="display:block" id="login-alert" class="alert alert-danger col-sm-12">Email ou Senha
                    incorretos</div>
                @endif
                <form id="loginform" class="form-horizontal" role="form" action={{Route('login')}} method="POST">
                    @csrf
                    <div style="margin-bottom: 25px; border-radius: 6px;"
                        class="input-group @if(session('error')) has-error @endif">
                        <span class="input-group-addon"><i class="ti-email"></i></span>
                        <input id="login-username" type="text" class="form-control " name="email" value=""
                            placeholder="email" required>

                    </div>

                    <div style="width: 100%; border-radius: 6px;"
                        class="input-group @if(session('error')) has-error @endif">
                        <span class="input-group-addon"><i class="ti-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password"
                            placeholder="senha" required>
                    </div>



                    <div class="input-group" style="margin-top: 20px;">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar de mim
                            </label>
                        </div>
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->


                        <button id="btn-login" type="submit" class="btn btn-app-primary" style="width:100%">Entrar
                        </button>



                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Sistema exclusivo para clientes de Cida Dornelas Assessoria e Cerimonial. Para mais
                                informações
                                <a href="#">
                                    clique aqui
                                </a>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
