@extends('baseAdmin')
@section('pageTitle')
<h1>Eventos</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Eventos</li>
@endsection
@section('pageContent')

<div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-4 ">
            <input type="text" class="form-control" id="validationDefault01" placeholder="Pesquisar">
        </div>
        <div class="col-lg-6">
            <button class="btn btn-app-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar
                Evento</button>
        </div>

    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('createUser') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>

                <div class="modal-body">


                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="name">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Celular</label>
                            <input type="text" class="form-control" id="cellPhone" name="cellPhone"
                                placeholder="Celular" required>
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="switches">
                        <div class="form-row ">

                            <div class="form-group ">
                                <label class="switch">
                                    <input name="active" value="true" type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                                <label for="active">Ativo</label>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group ">
                                <label class="switch">
                                    <input name="admin" value="true" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <label for="admin">Administrador</label>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-app-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="cards-row">

    <div class="card-mini">
        <img src='{{asset('assets/images/marrie-default.jpg')}}' class="card-image" />
        <div class="card-title">
            Camila e Marcos
        </div>
        <div class="card-desc">
            <i class="ti-bookmark-alt"> Casamento com Recepção</i>
            <br>
            <i class="ti-calendar"> 03/10/2020</i>
            <br>
            <i class="ti-alarm-clock"> 19hrs</i>
            <br>

            <br>
        </div>
        <div class="card-actions">
            <button type='button' class='card-action-readMore btn-card'
                onclick="window.location.href='{{route('getOneEvent', ['id'=> 1])}}'">Ver detalhes</button>
        </div>
    </div>



</div>
@endsection
