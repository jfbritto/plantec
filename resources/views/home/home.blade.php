@extends('adminlte::page')

@section('meta_tags')
    <link rel="icon" href="/img/tennis-ball.png" type="image/png">
@stop

@section('title', 'Home')

@section('content_header')
    <h1><i class="fas fa-home"></i> &nbsp;Home</h1>
@stop

@section('content')
    
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3 link-clients">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Clientes</span>
                    <span class="info-box-number" id="tot-clients"><i class="fas fa-spinner fa-pulse"></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 link-species">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-seedling"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Espécies</span>
                    <span class="info-box-number" id="tot-species"><i class="fas fa-spinner fa-pulse"></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 link-plantations">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-seedling"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Plantéis</span>
                    <span class="info-box-number" id="tot-plantations"><i class="fas fa-spinner fa-pulse"></i></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 link-sales">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Vendas</span>
                    <span class="info-box-number" id="tot-sales"><i class="fas fa-spinner fa-pulse"></i></span>
                </div>
            </div>
        </div>

    </div>

@stop

@section('js')
    <script src="/js/home/home.js"></script>
@stop