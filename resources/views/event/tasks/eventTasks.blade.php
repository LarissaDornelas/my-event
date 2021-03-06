@extends('baseEvent')
@section('pageContent')
<div class="jumbotron">

    <div class="container-fluid">


        <div class="row">

            <div class="col-12">
                <h4 style=" margin-bottom: 35px;">Tarefas</h4>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="card">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <h6>Todas as Tarefas</h6>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-secondary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg"> + &nbsp; Adicionar
                                        Tarefa</button>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12">
                                    @if(0==0)
                                    <table class="table  table-sm " style="text-align:center">
                                        <tbody>
                                            <tr>
                                                <th style="text-align:left">Nome</th>
                                                <th style="text-align:left">Categoria</th>
                                                <th>Prazo</th>
                                                <th>Atribuido à</th>
                                                <th>Prioridade</th>
                                                <th>Concluído</th>
                                                <th></th>
                                            </tr>

                                            <tr>
                                                <td style="text-align:left"></td>
                                                <td style="text-align:left"> </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td><i class=" ti-check" style="color:green"></i>

                                                </td>
                                                <td style="text-align:center">
                                                    <i class="ti-eye edit deleteIcon" data-toggle="modal"
                                                        data-target="#editTask" data-paid="" data-value="" data-price=""
                                                        data-event=''></i>
                                                    &nbsp;<i class="ti-trash  deleteProvider deleteIcon"
                                                        data-toggle="modal" data-target="#deleteProviderModal"
                                                        data-value="" data-email="teste"></i>
                                                </td>
                                            </tr>





                                        </tbody>
                                    </table>
                                    @else
                                    <div align="center" style="margin:30px">
                                        <h5>Não há tarefas cadastradas no seu evento.</h5>
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
    </div>



    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="" method="POST">

                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Tarefa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="editValue" name="value"
                                    placeholder="Nome da tarefa" required>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Categoria</label>
                                <select id="provider_category_id" name="provider_category_id" class="form-control">
                                    <option value='1' selected>Escolher...</option>

                                    <option value=""></option>

                                </select>
                                <span class="category-label">Não encontrou a categoria desejada? Solicite <a
                                        href="#">aqui</a></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="name">Descrição/Observações</label>
                                <textarea type="text" class="form-control" rows="3" id="description" name="description"
                                    placeholder="Escreva aqui uma descrição ou observações relacionadas a esta tarefa... "
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


    <div class="modal fade " id='editTask' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editForm" action="" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar tarefa</h5>
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

    @stop
