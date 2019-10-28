<?php
$namespaceAdmin = "\LoiPham\WooCommerce\App\Http\Controllers\Admin";
Route::group(['prefix' => Config('woo-commerce.admin_dir'), 'namespace' => $namespaceAdmin, 'middleware' => 'web'], function () {
    Route::get('login', 'AuthController@getCheckUsername')->name('getCheckUsername');
    Route::post('check-username', 'AuthController@postCheckUsername')->name('postCheckUsername');
    Route::post('login', 'AuthController@postLogin')->name('postLoginAdmin');
    Route::get('logout', 'AuthController@getLogout')->name('getLogoutAdmin');
    Route::group(['middleware' => 'checkRoleAdmin'], function () {
        Route::get('', 'IndexController@getIndex')->name('woo.admin.index');
        Route::resource('language', '\LoiPham\Language\Controllers\LanguageController');
    });
});
