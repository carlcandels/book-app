<?php


Route::group(['module' => 'Book', 'middleware'  => [ 'auth','web']], function() {
    Route::get('books/view', ['as' => 'books.view', 'uses' => 'BookController@index']);

    Route::get('book/create', ['as' => 'book.create', 'uses' => 'BookController@create']);
    Route::post('book/store', ['as' => 'book.store', 'uses' => 'BookController@store']);

    Route::get('book/{book}/edit', ['as' => 'book.edit', 'uses' => 'BookController@edit']);
    Route::patch('book/{book}/update', ['as' => 'book.update', 'uses' => 'BookController@update']);

    Route::delete('book/delete', ['as' => 'book.delete', 'uses' => 'BookController@delete']);

});

