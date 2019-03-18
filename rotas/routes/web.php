<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "<h1>Seja bem vindo!!</h1>";
});

Route::get('/ola/sejabemvindo', function () {
    return "Olá visitante, seja bem vindo!!";
});

// Rotas com parametros. O get é uma funcao estática da classe Route
Route::get('/nome/{nome}/{sobrenome}', function($nome, $sn) {
    return "<h1>Olá, $nome $sn</h1>";
});

Route::get('/repetir/{nome}/{n}', function($nome, $n) {
    if(is_integer($n)) {
        for($i=0; $i<$n; $i++) {
            echo "<h1>Olá, $nome </h1>";
        }
    } else
        echo "Você não digitou um inteiro";
});

// ---------------------------------------------------------------------------
// Passar parâmetros para as rotas:
// ---------------------------------------------------------------------------

// Params restringidos
Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n) {
    for($i=0; $i<$n; $i++) {
        echo "<h1>Olá, $nome: $i </h1>";
    }    
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

// Sem restrição (param opcional)
Route::get('/seunomesemregra/{nome?}', function($nome=null) { // ----------------------| a interrogacao torna o param opcional
    if(isset($nome)) {
        echo "<h1>Olá, $nome";
    } else
        echo "Voce não passou nenhum nome";
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

// ---------------------------------------------------------------------------
// 14 Agrupamento e rotas
// ---------------------------------------------------------------------------

Route::prefix('app')->group(function() {
    Route::get('/', function() {
       return "Págine principal do APP";
    });
    Route::get('/profile', function() {
        return "Págine profile  do APP";
    });
    Route::get('/about', function() {
        return "Págine ABOUT do APP";
    });
});


// ---------------------------------------------------------------------------
// 14 Redirecionamento rotas
// ---------------------------------------------------------------------------
Route::redirect('/aqui', '/ola', 301);

Route::get('/hello', function () {
    return view('hello');
});

// outra forma de chamar uma view
Route::view('/hello', 'hello');

// utilização de array associativo, servindo de paramatros que o blade espera receber (nome, sobrenome)
Route::view('/viewnome', 'hellonome', ['nome'=>'João', 'sobrenome'=>'Silva']);

Route::get('hellonome/{nome}/{sobrenome}', function($nome, $sn) {
    return view('hellonome', ['nome' => $nome, 'sobrenome' => $sn]);
});

// ---------------------------------------------------------------------------
// 18 Requisições HTTP
// ---------------------------------------------------------------------------
Route::get('/rest/hello', function() {
    return "Hello (GET)";
});

Route::post('/rest/hello', function() {
    return "Hello (POST)";
});

Route::delete('/rest/hello', function() {
    return "Hello (DELETE)";
});

Route::put('/rest/hello', function() {
    return "Hello (PUT)";
});

Route::patch('/rest/hello', function() {
    return "Hello (PATCH)";
});

Route::options('/rest/hello', function() {
    return "Hello (OPTIONS)";
});