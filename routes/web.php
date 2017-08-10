<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/editProfile', function () {
    return view('editProfile');
});

//RUTAS DEL CHAT-------------------------------------------------------------
Route::post('/chat', 'ChatContoroller@index');
Route::post('/mensajeN', 'ChatContoroller@newMessage');
Route::post('/chats', 'ChatContoroller@chats');

Route::post('/register1', 'redirectRegister@index');
Route::get('/buscador', 'searchResults@first');
Route::get('/home', 'HomeController@index');
Route::get('/searchResults/', 'searchResults@index');
Route::post('/change-password', 'updatePasswordController@update');
Route::post('/change-email', 'updateEmailController@update');


Route::resource('adminPanel', 'adminController');
Route::resource('usersControl', 'UsersController');
Route::resource('usersAdmControl', 'UsersAdmController');
Route::resource('publications', 'publicationsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
