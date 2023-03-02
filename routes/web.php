<?php

use Illuminate\Support\Facades\Route;

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

// Route Iniciar Banco de Dados
Route::get('/iniciar',
	'JogosClasseA\IniciarBancoDeDadosController@iniciar')
->name('iniciar');

// Route Página
Route::get('/',
	'JogosClasseA\PaginaController@home')
->name('/');
Route::get('/galeria',
	'JogosClasseA\PaginaController@galeria')
->name('galeria');
Route::get('/esportes',
	'JogosClasseA\PaginaController@esportes')
->name('esportes');
Route::get('esporte/{id}',
	'JogosClasseA\PaginaController@esporte')
->name('esporte');
Route::get('/cronograma',
	'JogosClasseA\PaginaController@cronograma')
->name('cronograma');
Route::get('/inscricoes',
	'JogosClasseA\PaginaController@inscricoes')
->name('inscricoes');

// Route Admin
Route::post('acessoadmin',
	'JogosClasseA\AdminController@acessoAdmin')
->name('acessoadmin');
Route::get('/admindelegacao/{id}',
	'JogosClasseA\AdminController@adminDelegacao')
->name('admindelegacao');
Route::get('/admingeral',
	'JogosClasseA\AdminController@adminGeral')
->name('admingeral');
Route::post('criareditarpessoa',
	'JogosClasseA\AdminController@criarEditarPessoa')
->name('criareditarpessoa');
Route::get('/visualizarpessoa/{id}',
	'JogosClasseA\AdminController@visualizarPessoa')
->name('visualizarpessoa');
Route::get('/deletarpessoa/{id}',
	'JogosClasseA\AdminController@deletarPessoa')
->name('deletarpessoa');
Route::get('/listarpessoasdelegacao',
	'JogosClasseA\AdminController@listarPessoasDelegacao')
->name('listarpessoasdelegacao');
Route::get('/getcategorias/{id}',
	'JogosClasseA\AdminController@getCategorias')
->name('getcategorias');
Route::get('/getpessoas/{categoria}',
	'JogosClasseA\AdminController@getPessoas')
->name('getpessoas');
Route::post('criareditartimes',
	'JogosClasseA\AdminController@criarEditarTimes')
->name('criareditartimes');
Route::get('/listartimesdelegacao',
	'JogosClasseA\AdminController@listarTimesDelegacao')
->name('listartimesdelegacao');
Route::get('/deletartime/{id}',
	'JogosClasseA\AdminController@deletarTime')
->name('deletartime');
Route::get('/buscarjogostimes/{categoria}',
	'JogosClasseA\AdminController@buscarJogosTimes')
->name('buscarjogostimes');
Route::post('criareditarjogos',
	'JogosClasseA\AdminController@criarEditarJogos')
->name('criareditarjogos');
Route::get('/buscarjogoscategoria/{categoria}',
	'JogosClasseA\AdminController@buscarJogosCategoria')
->name('buscarjogoscategoria');
Route::get('/visualizarjogo/{id}',
	'JogosClasseA\AdminController@visualizarJogo')
->name('visualizarjogo');
Route::get('/deletarjogo/{id}',
	'JogosClasseA\AdminController@deletarJogo')
->name('deletarjogo');
Route::get('/buscarmedalhatime/{id}',
	'JogosClasseA\AdminController@buscarMedalhaTime')
->name('buscarmedalhatime');
Route::post('criareditarmedalhatime',
	'JogosClasseA\AdminController@criarEditarMedalhaTime')
->name('criareditarmedalhatime');


Route::get('/listarpessoasseguro',
	'JogosClasseA\AdminController@listarPessoasSeguro')
->name('listarpessoasseguro');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {

	// Rota direcionar usuario para uma tela.
	Route::get('/home',
		'EntretenimentoOnline\DirecionarUsuariosController@direcionarTela')
	->name('home');
	// Logout no user.
	Route::get('sair',
		'EntretenimentoOnline\DirecionarUsuariosController@sair')
	->name('sair');

});
