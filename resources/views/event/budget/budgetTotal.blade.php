@extends('baseEvent')
@section('pageContent')
<div class="jumbotron">

    <div class="container-fluid">


        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills nav-settings" style="margin-top: 65px;" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">Orçamento Total</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Buffet</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Música para a cerimônia</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Música para a festa</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Salão de eventos</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">Vestido</a>

                </div>
            </div>
            <div class="col-10">
                <h4 style=" margin-bottom: 35px;">Orçamento</h4>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">

                        <div class="card">
                            <div class="pure-u-2-3 budget-detail">


                                <div class="app-my-budget  app-budget-aside box" data-section-active="summary">
                                    <h4 class="tools-title text-center title-budget">Meu orçamento</h4>

                                    <div class="pure-g border-bottom text-center budget-content">
                                        <div class="budget-group border-right">
                                            <div class="budget-balance app-modif-budget pointer">
                                                <img src="{{asset('assets/images/cofre.png')}}">
                                                <p class="budget-values">Custo estimado</p>
                                                <span class="budget-balance-amount">
                                                    R$ <span class="app-tools-budget-stats-estimado">25.000</span>
                                                </span>
                                                <p>
                                                    <a class="color-red">Modificar orçamento</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="budget-group">
                                            <div class="budget-balance ">
                                                <img src="{{asset('assets/images/moedas.png')}}"
                                                    style="max-width: 40px;">
                                                <p class="budget-values">Custo final</p>
                                                <span
                                                    class="app-tools-budget-final-cost-container budget-balance-amount budget-balance-amount-positive">
                                                    R$ <span class="app-tools-budget-stats-coste-final">28</span>
                                                </span>
                                                <ul>
                                                    <li class="inline-block mr10">
                                                        <span class="strong mr5">Pago:</span>
                                                        R$ <span class="app-total-paid">0</span>
                                                    </li>
                                                    <li class="inline-block">
                                                        <span class="strong mr5">Pendente:</span>
                                                        R$ <span class="app-total-pending">28</span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            @stop
