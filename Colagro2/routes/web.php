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



Auth::routes();
Route::post('/Anuncios/updateUsuario','AnunciosController@updateUsuario')->name('anuncios.updateUsuario')->middleware('auth');
//Route::get('/Anuncios','AnunciosController@index');
//Route::get('/Anuncios/create','AnunciosController@create');
Route::get('/Anuncios/Perfil','AnunciosController@Perfil')->name('Anuncios.Perfil')->middleware('auth');
Route::get('/Anuncios/editarperfil','AnunciosController@editarperfil')->name('Anuncios.editarperfil')->middleware('auth');
Route::get('/Anuncios/Nanuncios','AnunciosController@Nanuncios')->name('Anuncios.Nanuncios');
Route::resource('Anuncios', 'AnunciosController')->middleware('auth');//con esta ruta se accede a todos los metodos de AnunciosController
//Route::get('/Anuncios/create','AnunciosController@create');

Route::delete('/{id}','AnunciosController@destroy')->name('anuncio.eliminar');
Route::get('/{id}','AnunciosController@edit')->name('anuncios.editar')->middleware('auth');
Route::patch('/{id}','AnunciosController@update')->name('anuncios.update')->middleware('auth');
Route::get('/','AnunciosController@index');

//Route::resource('Anuncios', 'UsuarioController');

//Route::get('/{Cat_nombre}','AnunciosController@filtrar')->name('Anuncios.filtrar');

// Route::get('/home', 'HomeController@index')->name('home');
