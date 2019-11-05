@extends('baseEvent')
@section('id')
{{$eventData->id}}
@endsection
@section('pageContent')
<div class="jumbotron">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-6">
                <div class="card card-img-detail" style="height: 95%;">
                    <div class="card-body">
                        <div class="image-event-card"
                            style="background: url({{asset('images/' . $eventData->image_url)}}) center" .></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-6">
                <div class="event-top-card">
                    <h1 class="display-4">{{$eventData->name}}</h1>
                    <p class="lead">{{$eventData->description}}
                    </p>
                </div>
                <div class="event-countdown">
                    <div class="countdown">
                        <div class="bloc-time hours" data-init-value="245">
                            <span class="count-title">FALTAM</span>


                            <div class="figure hours hours-1">
                                <span class="top">2</span>
                                <span class="top-back">
                                    <span>2</span>
                                </span>
                                <span class="bottom">2</span>
                                <span class="bottom-back">
                                    <span>2</span>
                                </span>
                            </div>

                            <div class="figure hours hours-2">
                                <span class="top">4</span>
                                <span class="top-back">
                                    <span>4</span>
                                </span>
                                <span class="bottom">4</span>
                                <span class="bottom-back">
                                    <span>4</span>
                                </span>
                            </div>
                            <div class="figure hours hours-2">
                                <span class="top">4</span>
                                <span class="top-back">
                                    <span>4</span>
                                </span>
                                <span class="bottom">4</span>
                                <span class="bottom-back">
                                    <span>4</span>
                                </span>
                            </div>
                            <div class="figure hours hours-2">
                                <span class="top">4</span>
                                <span class="top-back">
                                    <span>4</span>
                                </span>
                                <span class="bottom">4</span>
                                <span class="bottom-back">
                                    <span>4</span>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="event-itens">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4 d-flex justify-content-center bottom-itens">
                            <a href="#">
                                <img class="bottom-image" src="{{asset('assets/icons/tasks-icon.png')}}">
                            </a>
                            <span><strong>Tarefas Concluídas </strong></span>
                            5 de 10
                        </div>
                        <div class="col-md-4 d-flex justify-content-center bottom-itens">
                            <a href="#">
                                <img class="bottom-image" src="{{asset('assets/icons/truck-icon.png')}}">
                            </a>
                            <span><strong>Fornecedores </strong></span>
                            3 de 15
                        </div>
                        <div class="col-md-4 d-flex justify-content-center bottom-itens">
                            <a href="#">
                                <img class="bottom-image" src="{{asset('assets/icons/money-icon.png')}}">
                            </a>
                            <span><strong>Orçamento </strong></span>
                            R$8.000 de R$35.000

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
