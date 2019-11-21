@extends(Session::get('admin')[0] ? 'baseAdmin' : 'baseDefault')
@section('pageContent')


<section id="main-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Total de eventos em andamento</div>
                        <div class="stat-digit">9 eventos</div>
                    </div>
                    <div class="progress">
                        <div style="background: #b95353!important;" class="progress-bar progress-bar-success w-85"
                            role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text"> Total de eventos concluídos</div>
                        <div class="stat-digit"> 56 eventos </div>
                    </div>
                    <div class="progress">
                        <div style="background: #b95353!important;" class="progress-bar progress-bar-primary w-55"
                            role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Usuários ativos no sistema</div>
                        <div class="stat-digit">300 usuários</div>
                    </div>
                    <div class="progress">
                        <div style="background: #b95353!important;" class="progress-bar progress-bar-warning w-50"
                            role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-two">
                    <div class="stat-content">
                        <div class="stat-text">Fornecedores ativos no sistema</div>
                        <div class="stat-digit">92 fornecedores</div>
                    </div>
                    <div class="progress">
                        <div style="background: #b95353!important;" class="progress-bar progress-bar-danger w-65"
                            role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Categorias de Eventos</h4>
                </div>
                <div class="card-body">
                    <div class="current-progress">
                        <div class="progress-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Casamento com Recepção</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div style="background: #b95353 !important;"
                                                class="progress-bar progress-bar-primary w-70 " role="progressbar"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Casamento sem recepção</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-15"
                                                style="background: #b95353 !important;" role="progressbar"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                15%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Festa de 15 anos</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div style="background:#b95353!important;"
                                                class="progress-bar progress-bar-primary w-10" role="progressbar"
                                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                10%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Bodas</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div style="background: #b95353!important;"
                                                class="progress-bar progress-bar-primary w-5" role="progressbar"
                                                aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">
                                                5%
                                            </div>
                                        </div>
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
