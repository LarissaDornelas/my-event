@extends(Session::get('admin')[0] ? 'baseAdmin' : 'baseDefault')
@section('pageTitle')
<h1>Eventos Concluídos</h1>
@endsection
@section('breadcrumbLinks')
<li class="breadcrumb-item"><a class="general-links" href="{{ route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Eventos Concluídos</li>
@endsection
@section('pageContent')

<div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-4 ">
            <input type="text" class="form-control" id="validationDefault01" placeholder="Pesquisar">
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
            <i class="ti-calendar"> {{\Carbon\Carbon::parse($item->date)->format('d/m/Y')}}</i>
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
