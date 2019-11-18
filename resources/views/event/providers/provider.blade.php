@extends('baseEvent')
@section('pageContent')

<div class="jumbotron">

    <div class="container-fluid">


        <div class="row justify-content-center">

            @if (session('status'))
            <div class=" alert alert-success alert-dismissible fade show message-alert" id="alert" role="alert">
                {{ session('status') }}
                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('error'))
            <div class=" alert alert-danger alert-dismissible fade show message-alert" id="alert" role="alert">
                {{ session('error') }}
                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="col-12">
                <h4 style=" margin-bottom: 35px;">Fornecedores</h4>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">

                        <div class="card">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <h6>Fornecedores contratados</h6>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-secondary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg"> + &nbsp; Adicionar
                                        Fornecedor</button>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12">
                                    @if(count($eventProviders)>0)
                                    <table class="table  table-sm " style="text-align:center">
                                        <tbody>
                                            <tr>
                                                <th style="text-align:left">Categoria</th>
                                                <th style="text-align:left">Nome</th>
                                                <th>Valor</th>
                                                <th>Pago</th>
                                                <th></th>
                                            </tr>
                                            @foreach ($eventProviders as $item)
                                            <tr>
                                                <td style="text-align:left">{{$item->providerCategoryName}}</td>
                                                <td style="text-align:left"> {{$item->providerName}}</td>
                                                <td>{{$item->value}}</td>
                                                <td>@if($item->paid)<i class=" ti-check" style="color:green"></i>@else
                                                    <i class="ti-close" style="color:red"></i> @endif
                                                </td>
                                                <td style="text-align:center">
                                                    <i class="ti-pencil edit deleteIcon" data-toggle="modal"
                                                        data-target="#editProvider" data-paid="{{$item->paid}}"
                                                        data-value="{{$item->id}}" data-price="{{$item->value}}"
                                                        data-event='{{Request::segment(2)}}'></i>
                                                    &nbsp;<i class="ti-trash  deleteProvider deleteIcon"
                                                        data-toggle="modal" data-target="#deleteProviderModal"
                                                        data-value="{{$item->id}}" data-email="teste"></i>
                                                </td>
                                            </tr>
                                            @endforeach




                                        </tbody>
                                    </table>
                                    @else
                                    <div align="center" style="margin:30px">
                                        <h5>Não há fornecedores cadastrados no seu evento.</h5>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="container">




                            </div>
                        </div>



                    </div>


                </div>
            </div>
        </div>



        <div class="modal fade" id="deleteProviderModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{Route('deleteEventProvider', ['idEvent' => Request::segment(2)])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Remover Fornecedor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Tem certeza que deseja remover este fornecedor do evento?</p>
                            <input type="hidden" id="removeProvider" name="provider">
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


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('addEventProvider', ['id' => Request::segment(2)]) }}" method="POST">

                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar fornecedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">Fornecedor</label>
                                <select id="provider_id" name="provider_id" class="form-control">
                                    <option value='1' selected>Escolher...</option>
                                    @foreach ($providers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                    @endforeach




                                </select>
                                <span class="category-label">Não encontrou o fornecedor desejado? Solicite <a
                                        href="#">aqui</a></span>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Categoria</label>
                                <select id="provider_category_id" name="provider_category_id" class="form-control">
                                    <option value='1' selected>Escolher...</option>
                                    @foreach ($providerCategory as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>

                                    @endforeach



                                </select>
                                <span class="category-label">Não encontrou a categoria desejada? Solicite <a
                                        href="#">aqui</a></span>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="name">Descrição/Observações</label>
                                <textarea type="text" class="form-control" rows="3" id="description" name="description"
                                    placeholder="Escreva aqui uma descrição ou observações relacionadas a este fornecedor... "
                                    required></textarea>
                            </div>



                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="value">Valor</label>
                                <input type="number" class="form-control" name="value"
                                    placeholder="Valor em reais. Apenas números" required>
                            </div>
                            <div class="col-md-6" style="margin-top: 5%;">
                                <label class="switch">
                                    <input name="paid" value="true" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <label for="paid">Pagamento realizado</label>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-app-primary">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-------->

    <div class="modal fade " id='editProvider' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editForm" action="" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar pagamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="value">Valor</label>
                                <input type="number" class="form-control" id="editValue" name="value"
                                    placeholder="Valor em reais. Apenas números" required>
                            </div>
                            <div class="col-md-6" style="margin-top: 5%;">
                                <label class="switch">
                                    <input name="paid" value="true" id="editPaid" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <label for="paid">Pagamento realizado</label>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-app-primary">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @endsection
    @section('addjs')
    <script type="text/javascript" src="{{asset('assets/js/myEvent/eventProvider.js')}}"></script>
    @endsection
