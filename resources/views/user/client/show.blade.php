@extends('adminlte::page')

@section('meta_tags')
    <link rel="icon" href="/img/tennis-ball.png" type="image/png">
@stop

@section('title', 'Cliente')

@section('content_header')
    
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-user"></i> &nbsp;Cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/clientes"><i class="fas fa-user-graduate"></i> &nbsp;Clientes</a></li>
                    <li class="breadcrumb-item active name_user"></li>
                </ol>
            </div>
        </div>
    </div>

@stop

@section('content')

    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title"> Dados Pessoais </h3>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm" id="delete-client" title="Deletar Aluno">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modalEditClient" title="Editar Aluno">
                    <i class="fas fa-pen"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" id="id_usr" value="{{$id}}">

            <div class="row">
                <div class="col-md-3 col-6">

                    <strong><i class="fas fa-user mr-1"></i> Nome</strong>
                    <p class="text-muted" id="name"></p>

                </div>
                <div class="col-md-3 col-6">

                    <strong><i class="fas fa-at mr-1"></i> Email</strong>
                    <p class="text-muted" id="email"></p>

                </div>
                <div class="col-md-3 col-6">

                    <strong><i class="fas fa-birthday-cake mr-1"></i> Nascimento</strong>
                    <p class="text-muted" id="birth"></p>

                </div>
                <div class="col-md-3 col-6">

                    <strong><i class="fas fa-user mr-1"></i> CPF</strong>
                    <p class="text-muted" id="cpf"></p>

                </div>
                <div class="col-md-4 col-4">

                    <strong><i class="fas fa-user mr-1"></i> RG</strong>
                    <p class="text-muted" id="rg"></p>
                
                </div>
                <div class="col-md-4 col-4">

                    <strong><i class="fas fa-ring mr-1"></i> Estado civil</strong>
                    <p class="text-muted" id="civil_status"></p>

                </div>
                <div class="col-md-4 col-4">

                    <strong><i class="fas fa-user-tie mr-1"></i> Profissão</strong>
                    <p class="text-muted" id="profession"></p>

                </div>
            </div>

            <hr>

            <div class="row" id="box-phones-registered">
            
            </div>

            <hr>

            <div class="row">
                <div class="col-md-10 col-8">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>
                    <p class="text-muted" id="address"></p>
                </div>
                <div class="col-md-2 col-4">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> CEP</strong>
                    <p class="text-muted" id="zip_code"></p>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title"> Compras realizadas </h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm" id="" title="Listar contratos">
                            <i class="fas fa-list"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modalStoreContract" id="btn-new-contract" style="display: none;" title="Cadastrar contrato">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-valign-middle table-hover table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="list"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- ****************************
    *                               *
    *        MODAIS DA PÁGINA       *
    *                               * 
    ********************************* -->

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditClient">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formEditClient">          
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_edit">Nome</label>
                                <input type="text" required name="name_edit" id="name_edit" class="form-control" placeholder="Informe o nome">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email_edit">Email</label>
                                <input type="email" name="email_edit" id="email_edit" class="form-control" placeholder="Informe o email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birth_edit">Data de nascimento</label>
                                <input type="date" required name="birth_edit" id="birth_edit" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cpf_edit">CPF</label>
                                <input type="text" name="cpf_edit" id="cpf_edit" class="form-control cpf" placeholder="Informe o CPF">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rg_edit">RG</label>
                                <input type="text" name="rg_edit" id="rg_edit" class="form-control" placeholder="Informe o RG">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="civil_status_edit">Estado civil</label>
                                <select name="civil_status_edit" id="civil_status_edit" class="form-control">
                                    <option value="">-- Selecione --</option>
                                    <option value="Solteiro">Solteiro(a)</option>
                                    <option value="Casado">Casado(a)</option>
                                    <option value="Divorciado">Divorciado(a)</option>
                                    <option value="Viuvo">Viuvo(a)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="profession_edit">Profissão</label>
                                <input type="text" name="profession_edit" id="profession_edit" class="form-control" placeholder="Informe a profissão">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="zip_code_edit">CEP</label>
                                <input type="text" name="zip_code_edit" id="zip_code_edit" data-type="edit" class="form-control zip_code" placeholder="Informe o CEP" maxlength="9">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="uf_edit">UF</label>
                                <input type="text" name="uf_edit" id="uf_edit" class="form-control" placeholder="Informe o UF">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city_edit">Cidade</label>
                                <input type="text" name="city_edit" id="city_edit" class="form-control" placeholder="Informe a cidade">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="neighborhood_edit">Bairro</label>
                                <input type="text" name="neighborhood_edit" id="neighborhood_edit" class="form-control" placeholder="Informe o bairro">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_edit">Endereço</label>
                                <input type="text" name="address_edit" id="address_edit" class="form-control" placeholder="Informe o endereço">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_number_edit">Número</label>
                                <input type="text" name="address_number_edit" id="address_number_edit" class="form-control" placeholder="Informe o número">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complement_edit">Complemento</label>
                                <input type="text" name="complement_edit" id="complement_edit" class="form-control" placeholder="Ex: Casa, Ap. 101">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row" id="box-phones">
                    
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <a title="Adicionar telefone" href="#" class="btn btn-success" data-toggle="modal" data-target="#modalAddPhone"><i class="fas fa-plus"></i>&nbsp;&nbsp;<i class="fas fa-phone"></i></a>
                <button type="submit" class="btn btn-primary" form="formEditClient">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalAddPhone">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Telefone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_number">Número</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control phone" placeholder="Informe o telefone">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-success" id="btn-add-phone">Adicionar</a>
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('js')
    <script src="/js/user/client/show.js"></script>
@stop