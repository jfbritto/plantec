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




    //dias disponiveis
    Route::get('/datas-disponiveis/listar/{id}', 'AvailableDateController@list');
    Route::post('/datas-disponiveis/cadastrar', 'AvailableDateController@store');
    Route::delete('/datas-disponiveis/deletar', 'AvailableDateController@destroy');

    //reservas
    Route::get('/reservas', 'ReservationController@index');
    Route::get('/reservas/listar', 'ReservationController@list');
    Route::put('/reservas/change-status', 'ReservationController@changeStatus');

    // contratos
    Route::get('/contratos/listar/{id_student}', 'ContractController@list');
    Route::post('/contratos/cadastrar', 'ContractController@store');
    Route::delete('/contratos/cancelar', 'ContractController@destroy');
    
    // faturas
    Route::get('/faturas/listar/{id_student}', 'InvoiceController@listNextOpen');
    Route::get('/faturas/listar-entradas-por-mes', 'InvoiceController@listReceivedByMonth');
    Route::put('/faturas/receber', 'InvoiceController@receive');
    
    // planos
    Route::get('/planos', 'PlanController@index');
    Route::get('/planos/listar', 'PlanController@list');
    Route::post('/planos/cadastrar', 'PlanController@store');
    Route::put('/planos/editar', 'PlanController@update');
    Route::delete('/planos/deletar', 'PlanController@destroy');

    // aulas programadas
    Route::get('/aulas-programadas', 'ScheduledClassesController@index');
    Route::get('/aulas-programadas/listar/{id}', 'ScheduledClassesController@list');
    Route::get('/aulas-programadas/buscar', 'ScheduledClassesController@search');
    Route::post('/aulas-programadas/cadastrar', 'ScheduledClassesController@store');
    Route::delete('/aulas-programadas/deletar', 'ScheduledClassesController@destroy');
    
    // aulas programadas resultado
    Route::get('/aulas-programadas-resultado/listar/{id}', 'ScheduledClassesResultController@list');
    Route::post('/aulas-programadas-resultado/cadastrar', 'ScheduledClassesResultController@store');

    

    //responsáveis
    Route::get('/responsaveis', 'UserController@responsible');
    Route::post('/responsaveis/cadastrar', 'UserController@storeResponsible');
    Route::get('/responsaveis/listar', 'UserController@listResponsible');
    Route::put('/responsaveis/editar', 'UserController@updateResponsible');
    Route::delete('/responsaveis/deletar', 'UserController@destroy');

    //funcionarios
    Route::get('/funcionarios', 'UserController@employee');
    Route::post('/funcionarios/cadastrar', 'UserController@storeEmployee');
    Route::get('/funcionarios/listar', 'UserController@listEmployee');
    Route::put('/funcionarios/editar', 'UserController@updateEmployee');
    Route::delete('/funcionarios/deletar', 'UserController@destroy');

    // entradas
    Route::get('/entradas', 'EntryController@index');
    Route::get('/entradas/listar', 'EntryController@list');

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

    //métodos de pagamento
    Route::get('/metodos-de-pagamento', 'PaymentMethodController@index');
    Route::get('/metodos-de-pagamento/listar', 'PaymentMethodController@list');
    Route::post('/metodos-de-pagamento/cadastrar', 'PaymentMethodController@store');
    Route::put('/metodos-de-pagamento/editar', 'PaymentMethodController@update');
    Route::delete('/metodos-de-pagamento/deletar', 'PaymentMethodController@destroy');

    //subtipos de métodos de pagamento
    Route::get('/subtipos-de-metodos-de-pagamento/listar', 'PaymentMethodSubtypeController@list');
    Route::post('/subtipos-de-metodos-de-pagamento/cadastrar', 'PaymentMethodSubtypeController@store');
    Route::delete('/subtipos-de-metodos-de-pagamento/deletar', 'PaymentMethodSubtypeController@destroy');

    //telefones
    Route::get('/telefones/listar', 'PhoneController@list');
});