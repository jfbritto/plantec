@extends('adminlte::page')

@section('meta_tags')
    <link rel="icon" href="/img/tennis-ball.png" type="image/png">
@stop

@section('title', 'Plantéis')

@section('content_header')
    <h1><i class="fas fa-seedling"></i> &nbsp;Plantéis</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title"> </h3>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modalStorePlantation">
                <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-valign-middle table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Espécie</th>
                            <th>Quantidade</th>
                            <th>Plantio</th>
                            <th>Previsão</th>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalStorePlantation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Plantél</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formStorePlantation">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_specie">Espécie</label>
                                <select required name="id_specie" id="id_specie" class="form-control">
                                    <option value="1">Esp</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantidade</label>
                                <input type="number" required name="quantity" id="quantity" class="form-control" placeholder="Informe a quantidade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_time">Data plantio</label>
                                <input type="date" required name="start_time" id="start_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_time">Data previsão</label>
                                <input type="date" required name="end_time" id="end_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Descreva sobre o plantél" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formStorePlantation">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditPlantation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Plantél</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formEditPlantation">
                    <input type="hidden" required name="id_edit" id="id_edit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_specie_edit">Espécie</label>
                                <select required name="id_specie_edit" id="id_specie_edit" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity_edit">Quantidade</label>
                                <input type="number" required name="quantity_edit" id="quantity_edit" class="form-control" placeholder="Informe a quantidade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_time_edit">Data plantio</label>
                                <input type="date" required name="start_time_edit" id="start_time_edit" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_time_edit">Data previsão</label>
                                <input type="date" required name="end_time_edit" id="end_time_edit" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_edit">Descrição</label>
                                <textarea name="description_edit" id="description_edit" class="form-control" placeholder="Descreva sobre o plantél" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formEditPlantation">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modalSales">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vendas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <h5 class="font-weight-bold mb-4">
                    <span id="title-plantation"></span>
                    <span class="pull-right"><button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modalAddSales">Adicionar Venda</button></span>
                </h5>

                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="list-sales"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_plantation_add" value="">
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddSales">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formAddSales">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_client">Cliente</label>
                                <select required name="id_client" id="id_client" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity_sale">Quantidade</label>
                                <input type="number" required name="quantity_sale" id="quantity_sale" class="form-control" placeholder="Informe a quantidade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Valor</label>
                                <input type="text" required name="price" id="price" class="form-control money" placeholder="Informe o valor">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_sale">Observação</label>
                                <textarea name="description_sale" id="description_sale" class="form-control" cols="30" rows="5" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formAddSales">Salvar</button>
            </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="/js/plantation/home.js"></script>
@stop