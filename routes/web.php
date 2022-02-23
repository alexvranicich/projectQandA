<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Models\Rating;

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
Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'home'])->name('home.show');
Route::get('/logout',[HomeController::class, 'logout']);

Route::get('/register' , [RegisterController::class, 'register_show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register_validation'])->name('register.store');

Route::get('/login' , [LoginController::class, 'login_show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login_validation'])->name('login.validate');

Route::get('/question', [QuestionController::class, 'question_show'])->name('question.show');
Route::post('/question', [QuestionController::class, 'question_store'])->name('question.store');

Route::get('/answer', [AnswerController::class, 'answer_show'])->name('answer.show');
Route::post('/answer', [AnswerController::class, 'answer_store'])->name('answer.store');
Route::get('/answerList', [AnswerController::class, 'answer_list'])->name('answer.list');

Route::post('/rating', [RatingController::class, 'rating_js'])->name('rating.validate');

Route::get('/search', [HomeController::class, 'search'])->name('search.show');




