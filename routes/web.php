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

Route::group(['middleware' => 'auth'], function () {

    Route::resource('cliente', 'ClienteController');
    Route::resource('pais', 'PaisController');
    Route::resource('estado', 'EstadoController');
    Route::resource('cidade', 'CidadeController');
    Route::resource('endereco', 'EnderecoController');

//    Route::get('/ajax', function (){
//        $pais_id = \Illuminate\Support\Facades\Input::get('pais_id');
//        $estados = \App\Estado::where('idPais', '=', $pais_id)->get();
//        return \Illuminate\Http\Response::json($estados);
//    });
//    Route::get('/ajaxteste', 'AjaxController@getEstados');
//    Route::get( '/ajax', array(
//        'as' => 'ajax',
//        'uses' => 'AjaxController@getEstados'
//    ) );

});
Route::get('getEstados/{id}', 'AjaxController@getEstados');
Route::get('getCidades/{id}', 'AjaxController@getCidades');
