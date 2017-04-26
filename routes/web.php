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

//Bookモデルを扱えるようにする
use App\Book;
//Request関数を使えるようにする
use Illuminate\Http\Request;

// show index
Route::get('/', 'BooksController@index');

//Add new book
Route::post('/books','BooksController@store');

//show a book record 第一引数は、「押されたボタンの引数に何が入っていたか」という見方
Route::post('/booksedit/{book}', 'BooksController@show');
   
//Update record
Route::post('/books/update','BooksController@update');

//Delete a book
Route::delete('/delete/{book}','BooksController@delete');


    
//以下認証関係　自動で追加された
Auth::routes();

Route::get('/home', 'BooksController@index');

