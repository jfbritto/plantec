<?php

use Illuminate\Support\Facades\Route;

//LOGIN
Route::get('/', 'AuthenticateController@index')->name('login');
Route::post('/login', 'AuthenticateController@login');

Route::get('/register', 'AuthenticateController@register')->name('register');
Route::post('/register', 'UserController@storeAdmin');

Route::group(['middleware' => ['admin']], function(){

    //logout
    Route::post('/logout', 'AuthenticateController@logout');

    //home
    Route::get('/home', 'HomeController@index');
    Route::get('/home/all', 'HomeController@all');

    //especies
    Route::get('/especies', 'SpecieController@index');
    Route::get('/especies/listar', 'SpecieController@list');
    Route::post('/especies/cadastrar', 'SpecieController@store');
    Route::put('/especies/editar', 'SpecieController@update');
    Route::delete('/especies/deletar', 'SpecieController@destroy');

    //clientes
    Route::get('/clientes', 'UserController@index');
    Route::get('/clientes/exibir/{id}', 'UserController@show');
    Route::get('/clientes/encontrar', 'UserController@find');
    Route::get('/clientes/listar', 'UserController@list');
    Route::get('/clientes/buscar', 'UserController@search');
    Route::post('/clientes/cadastrar', 'UserController@store');
    Route::put('/clientes/editar', 'UserController@update');
    Route::delete('/clientes/deletar', 'UserController@destroy');

    //planteis
    Route::get('/planteis', 'PlantationController@index');
    Route::get('/planteis/listar', 'PlantationController@list');
    Route::post('/planteis/cadastrar', 'PlantationController@store');
    Route::put('/planteis/editar', 'PlantationController@update');
    Route::delete('/planteis/deletar', 'PlantationController@destroy');

    //vendas
    Route::get('/vendas', 'SaleController@index');
    Route::get('/vendas/listar', 'SaleController@list');
    Route::get('/vendas/listar-por-plantel', 'SaleController@listByPlantation');
    Route::get('/vendas/listar-por-cliente', 'SaleController@listByClient');
    Route::post('/vendas/cadastrar', 'SaleController@store');
    Route::put('/vendas/editar', 'SaleController@update');
    Route::delete('/vendas/deletar', 'SaleController@destroy');





    // despesas
    Route::get('/despesas', 'ExpenseController@index');
    Route::get('/despesas/listar', 'ExpenseController@list');
    Route::post('/despesas/cadastrar', 'ExpenseController@store');
    Route::delete('/despesas/deletar', 'ExpenseController@destroy');

    //centro de custo
    Route::get('/centros-de-custo', 'CostCenterController@index');
    Route::get('/centros-de-custo/listar', 'CostCenterController@list');
    Route::post('/centros-de-custo/cadastrar', 'CostCenterController@store');
    Route::put('/centros-de-custo/editar', 'CostCenterController@update');
    Route::delete('/centros-de-custo/deletar', 'CostCenterController@destroy');

    //subtipos de centro de custo
    Route::get('/subtipos-de-centros-de-custo/listar', 'CostCenterSubtypeController@list');
    Route::post('/subtipos-de-centros-de-custo/cadastrar', 'CostCenterSubtypeController@store');
    Route::delete('/subtipos-de-centros-de-custo/deletar', 'CostCenterSubtypeController@destroy');

    //telefones
    Route::get('/telefones/listar', 'PhoneController@list');
});