<?php

Route::group(['namespace' => 'LoiPham\'.config("plugins.package_namespace").'Language\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('woo-commerce.woo-commerce.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'languages'], function () {

            Route::get('/', [
                'as' => 'language.list',
                'uses' => 'LanguageController@getList',
            ]);

            Route::get('/create', [
                'as' => 'language.create',
                'uses' => 'LanguageController@getCreate',
            ]);

            Route::post('/create', [
                'as' => 'language.create',
                'uses' => 'LanguageController@postCreate',
            ]);

            Route::get('/edit/{id}', [
                'as' => 'language.edit',
                'uses' => 'LanguageController@getEdit',
            ]);

            Route::post('/edit/{id}', [
                'as' => 'language.edit',
                'uses' => 'LanguageController@postEdit',
            ]);

            Route::get('/delete/{id}', [
                'as' => 'language.delete',
                'uses' => 'LanguageController@getDelete',
            ]);

            Route::post('/delete-many', [
                'as' => 'language.delete.many',
                'uses' => 'LanguageController@postDeleteMany',
                'permission' => 'language.delete',
            ]);
        });
    });

});
