@extends('adminlte::page')

@section('meta_tags')
    <link rel="icon" href="/img/tennis-ball.png" type="image/png">
@stop

@section('title', 'Planos')

@section('content_header')
    <h1><i class="fas fa-home"></i> &nbsp;Home</h1>
@stop

@section('content')
    
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3 link-clients">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Clientes</span>
                    <span class="info-box-number" id="tot-clients"><i class="fas fa-spinner fa-pulse"></i></span>
                </div>
            </div>
        </div>

    </div>

@stop

@section('js')
    <script src="/js/home/home.js"></script>
@stop