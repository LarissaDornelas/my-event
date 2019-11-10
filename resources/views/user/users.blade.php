@extends('baseAdmin')
@section('pageTitle')
<h1>Usuários</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Usuários</li>
@endsection
@section('pageContent')
<div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-4 ">
            <input type="text" class="form-control" id="validationDefault01" placeholder="Pesquisar">
        </div>
        <div class="col-lg-6">
            <button class="btn btn-app-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar
                Usuário</button>
        </div>

    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('createUser') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">Nome Completo</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nome Completo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Sexo</label>
                                <select name="gender" class="form-control">
                                    <option value="Outros">Outros</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Telefone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone">
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
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="cpf">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
                            </div>
                            <div class="col-md-4">
                                <label for="cpf">Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Cidade"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Estado</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="Estado">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="cpf">Bairro</label>
                                <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                                    placeholder="Bairro" required>
                            </div>
                            <div class="col-md-4">
                                <label for="cpf">Rua</label>
                                <input type="text" class="form-control" id="street" name="street" placeholder="Rua"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Complemento</label>
                                <input type="text" class="form-control" id="complement" name="complement"
                                    placeholder="Complemento">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="email">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    placeholder="Instagram" required>
                            </div>
                            <div class="col-6">
                                <label for="email">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="Facebook" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="eventImage">Adicionar uma imagem de perfil</label>
                            <input type="file" name="image" class="form-control-file" id="image">
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
</div>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show message-alert" id="alert" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show message-alert" id="alert" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<table id="orderTable" class="table table-striped table-bordered app-table" style="width:100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Administrador</th>
            <th>Status</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($userData as $item)


        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->cellPhone}}</td>
            <td>@if($item->admin)Sim @else Não @endif</td>
            <td>@if($item->active)Ativo @else Inativo @endif</td>
            <td>
                <a id="see-details-ufop" class='general-links' href="{{route('getOneUser', ['id' => $item->id])}}"><span
                        class="ti-eye"></span></a>
            </td>
        </tr>

        @endforeach

    </tbody>

</table>


</div>
@endsection
