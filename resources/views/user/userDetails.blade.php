@extends('baseAdmin')
@section('pageTitle')
<h1>Detalhes do Usuário</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('getAllUsers')}}">Usuários</a></li>
<li class="breadcrumb-item active">Detalhes do Usuário</li>

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
                    <div class="user-profile">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="user-photo m-b-20">
                                    <img class="img-fluid" style="max-height: 240px;"
                                        src="{{asset('assets/images/default-profile.png')}}" alt="" />
                                </div>
                                <div class="user-work">
                                    <h4>Redes Sociais</h4>
                                    <div class="work-content">
                                        <i class="ti-instagram"></i> fabi_dolabela


                                    </div>
                                    <div class="work-content">
                                        <i class="ti-facebook"></i> Fabiany Dolabela
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-8">
                                <div class="user-profile-name">{{$userData->name}}</div>
                                <div class="user-Location"><i class="ti-location-pin"></i> João Monlevade - MG</div>


                                <div class="custom-tab user-profile-tab">

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="1">
                                            <div class="contact-information">
                                                <h4>Informações de Contato</h4>
                                                <div class="phone-content">
                                                    <span class="contact-title">Telefone:</span>
                                                    <span class="labelDetail">{{$userData->phone}}</span>
                                                </div>
                                                <div class="address-content">
                                                    <span class="contact-title">Endereço:</span>
                                                    <span class="labelDetail">123, Rajar Goli, South Mugda</span>
                                                </div>
                                                <div class="email-content">
                                                    <span class="contact-title">Email:</span>
                                                    <span class="labelDetail">{{$userData->email}}</span>
                                                </div>
                                                <div class="website-content">
                                                    <span class="contact-title">Facebook:</span>
                                                    <span class="labelDetail">test</span></span>
                                                </div>
                                                <div class="skype-content">
                                                    <span class="contact-title">Instagram:</span>
                                                    <span class="labelDetail">test</span>
                                                </div>
                                            </div>
                                            <div class="basic-information">
                                                <h4>Informações Básicas</h4>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Aniversário:</span>
                                                    <span class="labelDetail">03/10/1998 </span>
                                                </div>
                                                <div class="gender-content">
                                                    <span class="contact-title">Gênero:</span>
                                                    <span class="labelDetail">Masculino</span>
                                                </div>
                                            </div>
                                            <div class="basic-information">
                                                <h4>Informações de conta</h4>
                                                <div>
                                                    <span class="contact-title">Administrador:</span>
                                                    <span class="labelDetail">@if($userData->admin)Sim @else Não @endif
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="contact-title">Ativo:</span>
                                                    <span class="labelDetail">@if($userData->active)Sim @else Não
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
        <form action="{{ route('updateUser', ['id'=> $userData->id]) }}" method="POST">
            @method('PUT')
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
                        <div class="col-md-12">
                            <label for="name">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo"
                                required value="{{$userData->name}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"
                                value="{{$userData->cpf}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$userData->phone}}"
                                placeholder="Telefone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Celular</label>
                            <input type="text" class="form-control" id="cellPhone" name="cellPhone"
                                value="{{$userData->cellPhone}}" placeholder="Celular" required>
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$userData->email}}"
                                placeholder="Email" required>
                        </div>
                    </div>
                    <div class="switches">
                        <div class="form-row ">

                            <div class="form-group ">
                                <label class="switch">
                                    <input name="active" value="true" type="checkbox" @if($userData->active) checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                                <label for="active">Ativo</label>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group ">
                                <label class="switch">
                                    <input name="admin" value="true" type="checkbox" @if($userData->admin) checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                                <label for="admin">Administrador</label>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-app-primary">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
