@extends('adminlte::page')

@section('meta_tags')
    <link rel="icon" href="/img/tennis-ball.png" type="image/png">
@stop

@section('title', 'Vendas')

@section('content_header')
    <h1><i class="fas fa-shopping-cart"></i> &nbsp;Vendas</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title"> </h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-valign-middle table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Espécie</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th>Descrição</th>
                            <th>Pagamento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list"></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalInfo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formInfo">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea readonly name="description" id="description" class="form-control" cols="30" rows="5" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="formInfo">Salvar</button>
            </div> -->
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="/js/sale/home.js"></script>
@stop