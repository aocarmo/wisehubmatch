<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/login',['as'=> 'site.login','uses'=>'Site\LoginController@index']);
Route::post('/login/entrar',['as'=> 'site.login.entrar','uses'=>'Site\LoginController@entrar']);
Route::get('/login/sair',['as'=> 'site.login.sair','uses'=>'Site\LoginController@sair']);

Route::get('/registro', ['as'=> 'site.registro','uses'=>'Site\RegistroController@index']);
Route::post('/registro/salvar', ['as'=> 'site.registro.salvar','uses'=>'Site\RegistroController@salvar']);

Route::get('/',['as'=> 'site.login','uses'=>'Site\LoginController@index']);
Route::group(['middleware'=>'auth'], function(){

    if(Auth::check() && Auth::User()->type == "dev"){
        Route::get('/', ['as'=> 'auth.desenvolvedor','uses'=>'Auth\Desenvolvedor\DesenvolvedorController@index']);
           }else{
        Route::get('/',['as'=> 'site.login.sair','uses'=>'Site\LoginController@sair']);
        }
    
    
    //Rotas para gestao das vagas    
    Route::get('/empresa/vagas/{id}',['as'=> 'auth.empresa','uses'=>'Auth\Empresa\EmpresaController@index']);
    Route::get('/empresa/vaga/criar',['as'=> 'auth.empresa.criar','uses'=>'Auth\Empresa\EmpresaController@criar']);
    Route::post('/empresa/vaga/salvar',['as'=> 'auth.empresa.salvar','uses'=>'Auth\Empresa\EmpresaController@salvar']);
    Route::get('/empresa/vaga/editar/{id}',['as'=> 'auth.empresa.editar','uses'=>'Auth\Empresa\EmpresaController@editarvaga']);
    Route::put('/empresa/vaga/atualizar/{id}',['as'=> 'auth.empresa.vaga.atualizar','uses'=>'Auth\Empresa\EmpresaController@atualizarvaga']);
    Route::get('/empresa/vaga/excluir/{id}',['as'=> 'auth.empresa.vaga.excluir','uses'=>'Auth\Empresa\EmpresaController@excluirVaga']);

    Route::get('/empresa/vaga/{id}/candidatos',['as'=> 'auth.empresa.vaga.candidatos','uses'=>'Auth\Empresa\EmpresaController@exibircandidatos']);

    //Rotas para o desenvolvedor
    Route::get('/desenvolvedor/vagas',['as'=> 'auth.desenvolvedor','uses'=>'Auth\Desenvolvedor\DesenvolvedorController@index']);
    Route::get('/desenvolvedor/vagas/candidatar/{id}',['as'=> 'auth.desenvolvedor.candidatar','uses'=>'Auth\Desenvolvedor\DesenvolvedorController@candidatar']);
    
    //Route::get('/',['as'=> 'site.home','uses'=>'Site\HomeController@index']);
    Route::get('/admin/cursos',['as'=> 'admin.cursos','uses'=>'Admin\CursoController@index']);
    Route::get('/admin/cursos/adicionar',['as'=> 'admin.cursos.adicionar','uses'=>'Admin\CursoController@adicionar']);
    Route::post('/admin/cursos/salvar',['as'=> 'admin.cursos.salvar','uses'=>'Admin\CursoController@salvar']);
    
    Route::get('/admin/cursos/editar/{id}',['as'=> 'admin.cursos.editar','uses'=>'Admin\CursoController@editar']);
    Route::put('/admin/cursos/atualizar/{id}',['as'=> 'admin.cursos.atualizar','uses'=>'Admin\CursoController@atualizar']);
    Route::get('/admin/cursos/deletar/{id}',['as'=> 'admin.cursos.deletar','uses'=>'Admin\CursoController@deletar']);

});




