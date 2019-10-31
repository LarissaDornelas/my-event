@extends('baseAdmin')
@section('pageTitle')
<h1>Detalhes do Fornecedor</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('getAllProviders')}}">Fornecedores</a></li>
<li class="breadcrumb-item active">Detalhes do Fornecedor</li>

@endsection
@section('pageContent')
<section id="main-content">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="provider-profile">
                        <div class="row">
                            <div class="col-lg-3" style="border-right: 0.1px solid grey;">
                                <div class="provider-photo m-b-20">
                                    <img class="img-fluid" style="max-height: 240px;"
                                        src="{{asset('assets/images/avatar-provider.jpg')}}" alt="" />
                                </div>
                                <div class="provider-work">
                                    <h5>Sobre</h5>
                                    {{$providerData->description}}
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="provider-profile-name">{{$providerData->name}}</div>
                                <div class="provider-Location"><i class="ti-location-pin"></i> João Monlevade - MG</div>


                                <div class="custom-tab provider-profile-tab">

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="1">
                                            <div class="contact-information">
                                                <h4>Informações de Contato</h4>
                                                <div class="phone-content">
                                                    <span class="contact-title">Telefone:</span>
                                                    <span class="labelDetail">{{$providerData->phone}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">Endereço:</span>
                                                    <span class="labelDetail">123, Rajar Goli, South Mugda</span>
                                                </div>
                                                <div class="email-content">
                                                    <span class="contact-title">Email:</span>
                                                    <span class="labelDetail">{{$providerData->email}}</span>
                                                </div>
                                                <div class="website-content">
                                                    <span class="contact-title">Website:</span>
                                                    <span class="labelDetail">{{$providerData->website}}</span></span>
                                                </div>
                                                <div class="website-content">
                                                    <span class="contact-title">Facebook:</span>
                                                    <span
                                                        class="labelDetail">{{$providerData->facebook_name}}</span></span>
                                                </div>
                                                <div class="skype-content">
                                                    <span class="contact-title">Instagram:</span>
                                                    <span class="labelDetail">{{$providerData->instagram_name}}</span>
                                                </div>
                                            </div>
                                            <div class="basic-information">
                                                <h4>Informações Básicas</h4>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Categoria:</span>
                                                    <span class="labelDetail">{{$providerData->providerCategoryName}}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="contact-title">Ativo:</span>
                                                    <span class="labelDetail">@if($providerData->active)Sim @else Não
                                                        @endif</span>
                                                </div>

                                            </div>

                                        </div>
                                        <button class="btn btn-app-primary" data-toggle="modal"
                                            data-target=".bd-example-modal-lg">Editar</button>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('updateProvider', ['id' => $providerData->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Fornecedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>

                <div class="modal-body">


                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="name">Nome do Fornecedor</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                                value="{{$providerData->name}}" required>
                        </div>
                        <div class="col-md-6">

                            <label for="name">Categoria</label>
                            <select id="providerCategory_id" name="providerCategory_id" class="form-control">
                                <option value=''>Escolher...</option>
                                @foreach ($providerCategories as $item)
                                <option value={{$item->id}} @if($providerData->providerCategory_id ==
                                    $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach

                            </select>
                            <span class="category-label">Não encontrou a categoria desejada? Cadastre <a
                                    href="{{route('getAllProviderCategories')}}">aqui</a></span>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="name">Descrição</label>
                            <textarea class="form-control" id="name" name="description" placeholder="Descrição" rows="3"
                                required>{{$providerData->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{$providerData->email}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Telefone</label>
                            <input value="{{$providerData->phone}}" type="text" class="form-control" id="phone"
                                name="phone" placeholder="Telefone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="instagram_name">Instagram</label>
                            <input type="text" value="{{$providerData->instagram_name}}" class="form-control"
                                id="instagram_name" name="instagram_name" placeholder="Conta do instagram" required>
                        </div>
                        <div class="col-6">
                            <label for="facebook_name">Facebook</label>
                            <input type="text" value="{{$providerData->facebook_name}}" class="form-control"
                                id="facebook_name" name="facebook_name" placeholder="Conta do Facebook" required>
                        </div>
                    </div>
                    <div class="switches">
                        <div class="form-row ">

                            <div class="form-group ">
                                <label class="switch">
                                    <input name="active" value="true" type="checkbox" @if($providerData->active) checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                                <label for="active">Ativo</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-app-primary">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
