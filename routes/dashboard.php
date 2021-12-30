<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Trainer\ChapterController;
use App\Http\Controllers\Trainer\TrainerController;
use App\Http\Controllers\Trainer\LessonController;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
],function(){
    Route::get('Courses' , [UserController::class , 'index'])->name('courses.show');
    Route::get('Course/{course}' , [UserController::class , 'courseDetails'])->name('course.details');
    Route::get('Trainers' , [UserController::class , 'trainers'])->name('trainers.show');
    Route::get('search-course/' , [UserController::class , 'searchCourse'])->name('ca.show');
    Route::get('Contact/' , [UserController::class , 'contact'])->name('contact');
    Route::post('contact/' , [UserController::class , 'store'])->name('contact.store');
    Route::get('About/' , [UserController::class , 'about'])->name('about');
    Route::get('Payments/' , [UserController::class , 'payment'])->name('payment');
    
});






        
Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'middleware' => ['auth:admin'],

], function () {
    Route::prefix('/categories')->as('categories.')->group(function(){
            Route::get('/', [CategoriesController::class, 'index'])
                ->name('index');
            Route::get('/trash', [CategoriesController::class, 'trash'])
                ->name('trash');
            Route::get('/create',[CategoriesController::class, 'create'])
                ->name('create');
            Route::post('/categories', [CategoriesController::class, 'store'])
                ->name('store');
            Route::get('/{category}/edit', [CategoriesController::class, 'edit'])
                ->name('edit');
            Route::put('/{category}', [CategoriesController::class, 'update'])
                ->name('update');
            Route::get('/{id}', [CategoriesController::class, 'destroy'])
                ->name('destroy');
            Route::put('/trash/{category}/restore', [CategoriesController::class, 'restore'])
                ->name('restore');
            Route::delete('/trash/{category}', [CategoriesController::class, 'forceDelete'])
                ->name('forceDelete');
    });
    
    Route::get('/',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/addAdmin',[AdminController::class, 'create'])->name('admin.create');
    Route::post('/addAdmin',[AdminController::class, 'store'])->name('admin.store');

    Route::get('/courses',[AdminController::class, 'coursesShow'])->name('admin.courses');
    Route::get('/chapters/{id}',[ChapterController::class, 'index'])->name('admin.chapters');
    Route::get('/Lessons/{id}',[LessonController::class, 'index'])->name('admin.lessons');

    Route::get('/students',[AdminController::class, 'students'])->name('students.show');
    Route::get('/courses/{id}',[AdminController::class, 'courses'])->name('courses.St');
    Route::get('/students/{id}/courses/{course_id}/approve',[AdminController::class, 'approveCourse'])->name('course.approve');
    Route::get('/students/{id}/courses/{course_id}/reject',[AdminController::class, 'rejectCourse'])->name('course.reject');
    Route::get('/trainers',[AdminController::class, 'trainers'])->name('tr.show');
    Route::get('/trainers/{id}/approve',[AdminController::class, 'approveTrainer'])->name('trainer.approve');
    Route::get('/trainers/{id}/reject',[AdminController::class, 'rejectTrainer'])->name('trainer.reject');
    Route::get('trainer/{id}',[AdminController::class, 'trainerDestroy'])->name('trainer.destroy');
    Route::get('messages',[AdminController::class, 'messages'])->name('messages');
    Route::get('messages/{id}',[AdminController::class, 'messageDestroy'])->name('message.destroy');
    Route::get('/messages/{id}/approve',[AdminController::class, 'approveMessage'])->name('message.approve');
    Route::get('/messages/{id}/reject',[AdminController::class, 'rejectMessage'])->name('message.reject');

});

Route::group([
   
    'prefix' => LaravelLocalization::setLocale() . '/trainer' ,
    'middleware' => ['auth:trainer,admin'],

], function () {
    Route::prefix('/courses')->as('courses.')->group(function(){
            Route::get('/', [TrainerController::class, 'index'])
                ->name('index');
            Route::get('/trash', [TrainerController::class, 'trash'])
                ->name('trash');
            Route::get('/create',[TrainerController::class, 'create'])
                ->name('create');
            Route::post('/create', [TrainerController::class, 'store'])
                ->name('store');
            Route::get('/{id}/edit', [TrainerController::class, 'edit'])
                ->name('edit');
            Route::put('/{id}', [TrainerController::class, 'update'])
                ->name('update');
            Route::get('/{id}', [TrainerController::class, 'destroy'])
                ->name('destroy');
            Route::put('/trash/{course}/restore', [TrainerController::class, 'restore'])
                ->name('restore');
            Route::delete('/trash/{course}', [TrainerController::class, 'forceDelete'])
                ->name('forceDelete');
        });

        Route::get('students/{course}', [ChapterController::class, 'students'])
        ->middleware('auth:trainer')
        ->name('course.students');
        
Route::get('/profile' , [TrainerController::class, 'profile'])
        ->middleware('auth:trainer')
        ->name('trainer.profile');

Route::put('/profile/{id}' , [TrainerController::class, 'updateProfile'])
        ->middleware('auth:trainer')
        ->name('trainer.profile.update');

Route::post('/changepassword' , [TrainerController::class, 'changePass'])
        ->middleware('auth:trainer')
        ->name('trainer.change.password');
});



Route::group([
            'prefix' => LaravelLocalization::setLocale() . '/trainer/course',
            'middleware' => ['auth:trainer,admin'],
        
        ], function () {
            Route::prefix('/chapters')->as('chapters.')->group(function(){
                    Route::get('/{id}', [ChapterController::class, 'index'])
                        ->name('index');
                    Route::get('/create/{id}',[ChapterController::class, 'create'])
                        ->name('create');
                    Route::post('/create/{id}', [ChapterController::class, 'store'])
                        ->name('store');
                    Route::get('/{chapter}/edit', [ChapterController::class, 'edit'])
                        ->name('edit');
                    Route::put('/{chapter}', [ChapterController::class, 'update'])
                        ->name('update');
                    Route::get('/chapter/{chapter}', [ChapterController::class, 'destroy'])
                        ->name('destroy');
                        
                });
        });




Route::group([
            'prefix' => LaravelLocalization::setLocale() .  '/trainer/chapters',
            'middleware' => ['auth:trainer,admin'],
    ], function () {
            Route::prefix('/lessons')->as('lessons.')->group(function(){
                    Route::get('/{id}', [LessonController::class, 'index'])
                        ->name('index');
                    Route::get('/trash', [LessonController::class, 'trash'])
                        ->name('trash');
                    Route::get('/create/{chapter}',[LessonController::class, 'create'])
                        ->name('create');
                    Route::post('/create/{chapter}', [LessonController::class, 'store'])
                        ->name('store');
                    Route::get('/{lesson}/edit', [LessonController::class, 'edit'])
                        ->name('edit');
                    Route::put('/{lesson}', [LessonController::class, 'update'])
                        ->name('update');
                    Route::get('lesson/{lesson}', [LessonController::class, 'destroy'])
                        ->name('destroy');
                    Route::put('/trash/{lesson}/restore', [LessonController::class, 'restore'])
                        ->name('restore');
                    Route::delete('/trash/{lesson}', [LessonController::class, 'forceDelete'])
                        ->name('forceDelete');
                });
        });

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
],function(){
           
        Route::get('/dashboard', [StudentController::class, 'index'])->middleware(['auth'])->name('dashboard');
        Route::get('course/{id}',[StudentController::class , 'show'])->middleware(['auth'])->name('course.show');
        Route::post('course/{id}',[StudentController::class , 'addCourse'])->middleware(['auth'])->name('course.add');
        Route::get('courses/{course}/chapters' ,[StudentController::class , 'showChapters'])->middleware(['auth'])->name('chapters.show');
        Route::get('courses/{chapter}/lessons' ,[StudentController::class , 'showLessons'])->middleware(['auth'])->name('lessons.show');
        Route::get('courses/lesson/{lesson}' ,[StudentController::class , 'showLesson'])->middleware(['auth'])->name('lesson.show');
        Route::get('{lesson}/download' ,[StudentController::class , 'downloadFile'])->middleware(['auth'])->name('file.download');

        Route::get('profile' , [StudentController::class, 'profile'])
                ->middleware('auth:web')
                ->name('profile');

        Route::put('profile/{id}' , [StudentController::class, 'updateProfile'])
                ->middleware(['auth:web'])
                ->name('profile.update');

        Route::post('changepassword' , [StudentController::class, 'changePass'])
                ->middleware('auth:web')
                ->name('change.password');
});









