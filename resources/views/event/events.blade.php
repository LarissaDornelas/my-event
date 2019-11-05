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
        <form action="{{ route('createEvent') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="name">Nome do evento</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do evento"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="cpf">Data</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Data" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cpf">Horário</label>
                            <input type="text" class="form-control" id="hour" name="hour" placeholder="Horário"
                                required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="name">Descrição</label>
                            <textarea type="text" class="form-control" rows="3" id="description" name="description"
                                placeholder="Escreva aqui uma descrição sobre o evento... " required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Categoria</label>
                            <select id="providerCategory_id" name="eventCategory_id" class="form-control">
                                <option value='1' selected>Escolher...</option>
                                @foreach ($eventCategories as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                                @endforeach



                            </select>
                            <span class="category-label">Não encontrou a categoria desejada? Cadastre <a
                                    href="{{route('getAllEventCategories')}}">aqui</a></span>
                        </div>
                        <div class="form-group">
                            <label for="eventImage">Adicionar uma imagem</label>
                            <input type="file" name="image" class="form-control-file" id="image">
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
<div class="cards-row">

    @foreach ($eventData as $item)
    <div class="card-mini">
        <div class="image-card" style="background: url({{asset('images/' . $item->image_url)}}) center" .></div>

        <div class="card-title">
            {{$item->name}}
        </div>
        <div class="card-desc">
            <i class="ti-bookmark-alt"> {{$item->eventCategoryName}}</i>
            <br>
            <i class="ti-calendar"> {{$item->date}}</i>
            <br>
            <i class="ti-alarm-clock"> {{$item->hour}}</i>
            <br>

            <br>
        </div>
        <div class="card-actions">
            <button type='button' class='card-action-readMore btn-card'
                onclick="window.location.href='{{route('getOneEvent', ['id'=> $item->id])}}'">Ver detalhes</button>
        </div>
    </div>
    @endforeach



</div>
@endsection
