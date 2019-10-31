@extends('baseAdmin')
@section('pageTitle')
<h1>Fornecedores</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Fornecedores</li>
@endsection
@section('pageContent')
<div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-4 ">
            <input type="text" class="form-control" id="validationDefault01" placeholder="Pesquisar">
        </div>
        <div class="col-lg-6">
            <button class="btn btn-app-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar
                Fornecedor</button>
        </div>

    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('createProvider') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Fornecedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">Nome do Fornecedor</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Categoria</label>
                                <select id="providerCategory_id" name="providerCategory_id" class="form-control">
                                    <option value='' selected>Escolher...</option>
                                    @foreach ($providerCategories as $item)
                                    <option value={{$item->id}}>{{$item->name}}</option>
                                    @endforeach

                                </select>
                                <span class="category-label">Não encontrou a categoria desejada? Cadastre <a
                                        href="{{route('getAllProviderCategories')}}">aqui</a></span>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="name">Descrição</label>
                                <textarea class="form-control" id="name" name="description" placeholder="Descrição"
                                    rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Telefone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="instagram_name">Instagram</label>
                                <input type="text" class="form-control" id="instagram_name" name="instagram_name"
                                    placeholder="Conta do instagram" required>
                            </div>
                            <div class="col-6">
                                <label for="facebook_name">Facebook</label>
                                <input type="text" class="form-control" id="facebook_name" name="facebook_name"
                                    placeholder="Conta do Facebook" required>
                            </div>
                        </div>
                        <div class="switches">
                            <div class="form-row ">

                                <div class="col-6">
                                    <label class="switch">
                                        <input name="active" value="true" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    <label for="active">Ativo</label>
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
            <th>Fornecedor</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Categoria</th>
            <th>Status</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($providerData as $item)


        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->providerCategoryName}}</td>
            <td>@if($item->active)Ativo @else Inativo @endif</td>
            <td>
                <a id="see-details-ufop" class='general-links'
                    href="{{route('getOneProvider', ['id' => $item->id])}}"><span class="ti-eye"></span></a>
            </td>
        </tr>

        @endforeach

    </tbody>

</table>


</div>
@endsection
