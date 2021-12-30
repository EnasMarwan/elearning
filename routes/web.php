<?php

use App\Models\User;
use App\Models\Course;
use App\Models\Tranier;
use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
],function(){
    Route::get('/', function () {
        $courses = Course::orderBy('id' ,'desc')->take(3)->get();
        $courses_num = Course::count();
        $students_num = User::count();
        $trainers_num = Tranier::count();
        $lessons_num = Lesson::count();
        $categories=Category::all();
        return view('welcome',[
            'courses' => $courses,
            'courses_num' => $courses_num,
            'students_num' => $students_num,
            'trainers_num' => $trainers_num,
            'lessons_num' => $lessons_num,
            'categories' => $categories,
        ]);
    })->name('index.home');
});

require __DIR__.'/dashboard.php';
