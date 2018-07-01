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

//RUTAS DEL FRONTEND

Route::get('/', [
    'as'=>'front.index',
    'uses'=>'FrontController@index'
]);

Route::get('categories/{name}',[
    'uses'=>'FrontController@searchCategory',
    'as'  =>'search.category'
]);
Route::get('tags/{name}',[
    'uses'=>'FrontController@searchTag',
    'as'  =>'search.tag'
]);
Route::get('articles/{slug}',[
    'uses'=>'FrontController@viewArticle',
    'as'  =>'view.article'
]);
//RUTAS DEL PANEL DE ADMINISTRACION

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::group(['middleware'=>['admin']],function(){
    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy',[
        'uses'=>'UsersController@destroy',
        'as'  =>'users.destroy'
    ]);
    });
    Route::resource('categories','CategoriesController');
    Route::get('categories/{id}/destroy',[
        'uses'=>'CategoriesController@destroy',
        'as'  =>'categories.destroy'
    ]);

    Route::resource('tags','TagsController');
    Route::get('tags/{id}/destroy',[
        'uses'=>'TagsController@destroy',
        'as'  =>'tags.destroy'
    ]);
    Route::resource('articles','ArticlesController');
    Route::get('articles/{id}/destroy',[
        'uses'=>'ArticlesController@destroy',
        'as'  =>'articles.destroy'
    ]);

    Route::get('images',[
        'uses'=>'ImagesController@index',
        'as'  =>'images.index'
    ]);
    ///define todos los metodos del controlador
    /*  Route::get('view/{id}',[ //No hay necesidad que este view sea igual que el de abajo, quien manda es este
        'uses'=>'testController@view', //le indico qué controlador usar con "uses"
        'as'  =>'articlesView'
    ]);
*/
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
