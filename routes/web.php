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

Route::get('/', [
    'uses'=>'postController@getIndex',
    'as'=>'blog.index'
]);

Route::get('post/{id}',[
    'uses'=>'postController@getPost',
    'as'=>'blog.post'
]);
Route::get('post/{id}/like',[
    'uses'=>'postController@likePost',
    'as'=>'blog.post.like'
]);
Route::get('about', function () {
    return view('other.about');
})->name('other.about');

Route::group(['prefix' => 'admin'], function() {
    Route::get('', [
        'uses'=>'postController@getAdminIndex',
        'as'=>'admin.index'
    ]);

    Route::get('create', [
        'uses'=>'postController@getAdminCreate',
        'as'=>'admin.create'
    ]);

    Route::post('create', [
        'uses'=>'postController@postAdminCreate',
        'as'=>'admin.create'
    ]);
    Route::get('delete/{id}', [
        'uses'=>'postController@deletePostAdmin',
        'as'=>'admin.delete'
    ]);
    Route::get('edit/{id}', [
        'uses'=>'postController@getAdminEdit',
        'as'=>'admin.edit'
    ]);

    Route::post('edit',[
        'uses'=>'postController@postAdminEdit',
        'as'=>'admin.update'
    ]);
});

