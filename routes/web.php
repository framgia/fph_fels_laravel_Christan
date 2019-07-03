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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile/{user}', 'UserController@profile');

Route::prefix('admin')->group(function (){
    Route::resource('/categories', 'AdminCategoryController');
    Route::post('/categories/{category}/words', 'AdminWordsController@store');
    Route::get('/categories/{category}/words/create', 'AdminWordsController@create');
    Route::resource('/words', 'AdminWordsController');
    Route::resource('/users', 'AdminUserController');

});

Route::resource('categories', 'CategoriesController');

Route::resource('lessons', 'LessonController');

Route::resource('quiz', 'QuizController');

Route::resource('answer', 'AnswerController', ['parameters' => ['answer' => 'user'] ]);

Route::resource('relationship', 'RelationshipController');
