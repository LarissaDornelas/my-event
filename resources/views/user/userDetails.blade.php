@extends(Session::get('admin')[0] ? 'baseAdmin' : 'baseDefault')

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
                            <div class="col-lg-3" style='border-right: 0.1px solid grey;'>
                                <div class="user-photo m-b-20">
                                    <img class="img-fluid" style="max-height: 240px;"
                                        src="{{asset('assets/images/default-profile.png')}}" alt="" />
                                </div>
                                <div class="user-work">
                                    <h4>Redes Sociais</h4>
                                    <div class="work-content">
                                        <i class="ti-instagram"></i> {{$userData->instagram}}


                                    </div>
                                    <div class="work-content">
                                        <i class="ti-facebook"></i> {{$userData->facebook}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="user-profile-name">{{$userData->name}}</div>
                                <div class="user-Location"><i class="ti-location-pin"></i> {{$userData->city}},
                                    {{$userData->state}}</div>


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
                                                    <span class="labelDetail">{{$userData->street}},
                                                        {{$userData->number}}, {{$userData->neighborhood}}</span>
                                                </div>
                                                <div class="email-content">
                                                    <span class="contact-title">Email:</span>
                                                    <span class="labelDetail">{{$userData->email}}</span>
                                                </div>
                                                <div class="website-content">
                                                    <span class="contact-title">Facebook:</span>
                                                    <span class="labelDetail">{{$userData->facebook}}</span></span>
                                                </div>
                                                <div class="skype-content">
                                                    <span class="contact-title">Instagram:</span>
                                                    <span class="labelDetail">{{$userData->instagram}}</span>
                                                </div>
                                            </div>
                                            <div class="basic-information">
                                                <h4>Informações Básicas</h4>
                                                <div class="birthday-content">
                                                    <span class="contact-title">Aniversário:</span>
                                                    <span
                                                        class="labelDetail">{{\Carbon\Carbon::parse($userData->birthday)->format('d/m/Y')}}
                                                    </span>
                                                </div>
                                                <div class="gender-content">
                                                    <span class="contact-title">Gênero:</span>
                                                    <span class="labelDetail">{{$userData->gender}}</span>
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
                    <h5 class="modal-title">Editar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>

                <div class="modal-body">


                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="name">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" value='{{$userData->name}}'
                                placeholder="Nome Completo" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Sexo</label>
                            <select name="gender" class="form-control">
                                <option value="Outros" @if($userData->gender==="outros") selected @endif> Outros
                                </option>
                                <option value="Feminino" @if($userData->gender==="feminino") selected @endif>Feminino
                                </option>
                                <option value="Masculino" @if($userData->gender==="masculino") selected @endif>Masculino
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="text" value='{{$userData->cpf}}' class="form-control" id="cpf" name="cpf"
                                placeholder="CPF" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Telefone</label>
                            <input type="text" value='{{$userData->phone}}' class="form-control" id="phone" name="phone"
                                placeholder="Telefone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Celular</label>
                            <input type="text" class="form-control" id="cellPhone" name="cellPhone"
                                placeholder="Celular" value='{{$userData->cellPhone}}' required>
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                value={{$userData->email}} required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="cpf">Cep</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"
                                value='{{$userData->cep}}' required>
                        </div>
                        <div class="col-md-4">
                            <label for="cpf">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade"
                                value='{{$userData->city}}' required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Estado</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Estado"
                                value='{{$userData->state}}'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="cpf">Bairro</label>
                            <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                                value='{{$userData->neighborhood}}' placeholder="Bairro" required>
                        </div>
                        <div class="col-md-4">
                            <label for="cpf">Rua</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Rua"
                                value='{{$userData->street}}' required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Complemento</label>
                            <input type="text" class="form-control" id="complement" name="complement"
                                value='{{$userData->complement}}' placeholder="Complemento">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="phone">Número</label>
                            <input type="text" class="form-control" id="number" name="number"
                                value='{{$userData->number}}' placeholder="Número da casa/apartamento">
                        </div>
                        <div class="col-md-6">
                            <label for="birthday">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                value='{{\Carbon\Carbon::parse($userData->date)->format('Y-m-d')}}'
                                placeholder="Data de nascimento">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                placeholder="Instagram" value='{{$userData->instagram}}' required>
                        </div>
                        <div class="col-6">
                            <label for="email">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook"
                                value='{{$userData->facebook}} ' required>
                        </div>
                    </div>
                    <br>

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
