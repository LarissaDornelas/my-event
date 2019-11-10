@extends('baseEvent')
@section('pageContent')

<div class="jumbotron">

    <div class="container-fluid">


        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills nav-settings" style="margin-top: 65px;" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">Integrar Contas</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Ajustes do Evento</a>

                </div>
            </div>
            <div class="col-10">
                <h4 style=" margin-bottom: 35px;">Configurações</h4>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">

                        <div class="card">

                            <h6>Contas vinculadas ao evento</h6>

                            <div class="row ">
                                <div class="col-md-8">
                                    <table class="table  table-sm ">
                                        <tbody>
                                            @foreach ($usersData as $item)
                                            <tr>
                                                <td>{{$item->userName}}</td>
                                                <td style="text-align:left">{{$item->email}}</td>
                                                <td style="text-align:center"><i
                                                        class="ti-close deleteAccount deleteIcon" data-toggle="modal"
                                                        data-target="#deleteAccountModal" data-value="{{$item->id}}"
                                                        data-email="{{$item->email}}"></i>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <h6>Adicionar conta</h6>
                            @if (session('status'))
                            <div class=" alert alert-success alert-dismissible fade show message-alert" id="alert"
                                role="alert">
                                {{ session('status') }}
                                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session('errorType'))
                            <div class=" alert alert-danger alert-dismissible fade show message-alert" id="alert"
                                role="alert">
                                {{ session('errorType') }}
                                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="container">
                                <p>Ao adicionar uma nova conta você permite que outro usuário
                                    faça edições e tenha acesso a todos os dados do seu evento.
                                </p>
                                <form action="{{ route('accountIntegration', ['id' => Request::segment(2)]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div style=" border-radius: 6px;"
                                                class="input-group @if(session('error')) has-error @endif">
                                                <span class="input-group-addon"><i class="ti-email"></i></span>
                                                <input id="login-username" type="text" class="form-control "
                                                    name="account" value=""
                                                    placeholder="Digite o email para adicionar ao evento." required>
                                            </div>
                                            @if(session('error'))
                                            <div style="display:block" id="login-alert"
                                                class="alert alert-danger col-sm-12">{{session('error')}}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-secondary">Adicionar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">


                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show message-alert" id="alert"
                            role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show message-alert" id="alert"
                            role="alert">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="provider-profile">
                                    <div class="row">
                                        <div class="col-lg-3" style="border-right: 0.1px solid grey;">
                                            <div class="provider-photo m-b-20">
                                                <div class="image-card"
                                                    style="background: url({{asset('images/' . $eventData->image_url)}}) center"
                                                    .></div>
                                            </div>
                                            <div class="provider-work">
                                                <h6>Descrição</h6>
                                                {{$eventData->description}}
                                            </div>

                                        </div>
                                        <div class="col-lg-7">
                                            <h5>{{$eventData->name}}</h5>



                                            <div class="custom-tab provider-profile-tab">

                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="1">
                                                        <div class="contact-information">
                                                            <h4>Informações do Evento</h4>
                                                            <div class="website-content">
                                                                <span class="contact-title">Categoria:</span>
                                                                <span
                                                                    class="labelDetail">{{$eventData->eventCategoryName}}</span>
                                                            </div>
                                                            <div class="phone-content">
                                                                <span class="contact-title">Data:</span>
                                                                <span
                                                                    class="labelDetail">{{\Carbon\Carbon::parse($eventData->date)->format('d/m/Y')}}</span>
                                                            </div>
                                                            <div class="address-content">
                                                                <span class="contact-title">Cidade/Estado:</span>
                                                                <span
                                                                    class="labelDetail">{{$eventData->city}}/{{$eventData->state}}</span>
                                                            </div>
                                                            <div class="address-content">
                                                                <span class="contact-title">Local:</span>
                                                                <span class="labelDetail">{{$eventData->locale}}</span>
                                                            </div>
                                                            <div class="email-content">
                                                                <span class="contact-title">Horário:</span>
                                                                <span class="labelDetail">{{$eventData->hour}}</span>
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

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="{{ route('updateEvent', ['id' => Request::segment(2)]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Evento</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
                                                    <span aria-hidden="true"><i class="ti-close"></i></span>
                                                </button>
                                            </div>

                                            <div class="modal-body">


                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label for="name">Nome do evento</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Nome do evento" value="{{$eventData->name}}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="cpf">Data</label>
                                                        <input type="date" class="form-control" id="date" name="date"
                                                            placeholder="Data"
                                                            value="{{\Carbon\Carbon::parse($eventData->date)->format('Y-m-d')}}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="cpf">Horário</label>
                                                        <input type="text" class="form-control" id="hour" name="hour"
                                                            placeholder="Horário" value="{{$eventData->hour}}" required>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="state">Estado</label>
                                                        <input type="text" class="form-control"
                                                            value="{{$eventData->state}}" id="state" name="state"
                                                            placeholder="Estado" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="city">Cidade</label>
                                                        <input type="text" class="form-control"
                                                            value="{{$eventData->city}}" id="city" name="city"
                                                            placeholder="Cidade" required>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label for="locale">Local do evento</label>
                                                        <input type="text" class="form-control" id="locale"
                                                            name="locale" value="{{$eventData->locale}}"
                                                            placeholder="Descreva o(s) local(is) do evento" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="name">Descrição</label>
                                                        <textarea type="text" class="form-control" rows="3"
                                                            id="description" name="description"
                                                            placeholder="Escreva aqui uma descrição sobre o evento... "
                                                            required>{{$eventData->description}}</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="name">Categoria</label>
                                                        <select id="providerCategory_id" name="eventCategory_id"
                                                            class="form-control">
                                                            <option value='1' selected>Escolher...</option>
                                                            @foreach ($eventCategories as $item)
                                                            <option @if($eventData->eventCategoryName == $item->name)
                                                                selected @endif value={{$item->id}}>{{$item->name}}
                                                            </option>
                                                            @endforeach



                                                        </select>
                                                        <span class="category-label">Não encontrou a categoria desejada?
                                                            Cadastre <a
                                                                href="{{route('getAllEventCategories')}}">aqui</a></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="eventImage">Adicionar uma imagem</label>
                                                        <input type="file" name="image" class="form-control-file"
                                                            id="image">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="switch">
                                                        <input name="completed" value=1 type="checkbox"
                                                            @if($eventData->completed) checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <label for="active">Concluído</label>
                                                </div>


                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary "
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-app-primary">Salvar
                                                    Alterações</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{Route('accountRemove', ['idEvent' => Request::segment(2)])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Remover Conta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Tem certeza que deseja remover esta conta do evento?</p>
                            <input type="hidden" id="removeAccount" name="account">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-app-primary">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection
    @section('addjs')
    <script type="text/javascript" src="{{asset('assets/js/myEvent/settings.js')}}"></script>
    @endsection
