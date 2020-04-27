<?php


Route::group(['module' => 'Author', 'middleware'  => [ 'auth','web']], function() {
    Route::get('authors/view', ['as' => 'authors.view', 'uses' => 'AuthorController@index']);

    Route::get('author/create', ['as' => 'author.create', 'uses' => 'AuthorController@create']);
    Route::post('author/store', ['as' => 'author.store', 'uses' => 'AuthorController@store']);

    Route::get('author/{author}/edit', ['as' => 'author.edit', 'uses' => 'AuthorController@edit']);
    Route::patch('author/{author}/update', ['as' => 'author.update', 'uses' => 'AuthorController@update']);

    Route::delete('author/delete', ['as' => 'author.delete', 'uses' => 'AuthorController@delete']);

});

