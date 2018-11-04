<?php

// LOGIN USUARIO

Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout'); 


// REGISTRO DE USUARIO
 
Route::get('/response', function () {
    return view('auth/response');
});
Route::resource('/register', 'Auth\RegisterController');
Route::get('activacion/{code}','RegisterUserController@activate');
Route::post('complete/{id}','RegisterUserController@complete');


// OPCIONES USUARIO

Route::resource('/usuario/perfil','PerfilUserController');
Route::get('/usuario/password/','PerfilUserController@password')->name('usuario.password'); 
Route::get('/usuario_pedido/{id}','PedidoUserController@index')->name('usuario.pedido');
Route::get('/usuario_pedido_show/{id}','PedidoUserController@show')->name('usuario.pedido.show');  
Route::get('/usuario_pedido_reporte/{id}','PedidoUserController@reportepdf')->name('usuario.pedido.reporte');

// LOGIN ADMINISTRADOR 

  Route::prefix('admin')->group(function() {

  Route::get('/bienvenido', 'AdminHomeController@index')->name('admin.bienvenido'); 
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
 
});


// OPCIONES ADMINISTRADOR


Route::get('/categoria/estado/{id}','CategoriaController@estado');
Route::resource('/categoria','CategoriaController');

Route::get('/producto/estado/{id}','ProductoController@estado');
Route::resource('/producto','ProductoController');

Route::get('/oferta/estado/{id}','OfertaController@estado');
//Route::get('/inicio/oferta/mostrar','OfertaController@mostraroferta');
Route::resource('/oferta','OfertaController');

Route::get('/pedido/','PedidoController@index');
Route::get('/pedido/{id}','PedidoController@show');
Route::get('/pedido/estado/{id}','PedidoController@estado');
Route::get('/pedido/reporte/{id}','PedidoController@reportepdf')->name('pedido.reporte');

Route::get('/administrador/estado/{id}','AdminController@estado')->name('administrador.estado');
Route::resource('/administrador','AdminController');
Route::resource('/usuario','UserController');


// STORE

Route::get('/inicio','HomePageController@index')->name('inicio');
Route::get('/shop','StoreController@index')->name('shop.index');
Route::get('/shop/{product}', 'StoreController@show')->name('shop.show');
//Route::get('/categoria/{id}','StoreController@mostrarCategoria');
Route::get('/mostrar/categoria/{id}','StoreController@mostrarCategoria');
Route::get('/shop/oferta','StoreController@mostraroferta');


// CARRITO

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Auth::routes();

// Redirecciona en caso de URL incorrecta. 
Route::get('/{slug?}','HomePageController@index')->name('inicio');



