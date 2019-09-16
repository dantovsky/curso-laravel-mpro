<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

// Receber e multiplicar dois números
Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nomes/{id}', 'MeuControlador@getNomeByID');

// Aula 26 | Resources com a criação de controller com o comando:
// php artisan make:controller ClienteControlador --resource
Route::resource('/cliente', 'ClienteControlador');
