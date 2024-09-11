<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\IntakeController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\IntakeCourseController;
use App\Http\Controllers\UniversityCourseController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('get-states', [DependentController::class, 'getStates']);
    Route::get('get-cities', [DependentController::class, 'getCities']);

    Route::resource('university', UniversityController::class)->names('university');
    Route::resource('course', CourseController::class)->names('course')->middleware('accessLevel:1');
    Route::resource('intake', IntakeController::class)->names('intake');
    Route::resource('agent', AgentController::class)->names('agent')->middleware('accessLevel:1,2');
    Route::resource('application', ApplicationController::class)->names('application')->middleware('accessLevel:1,2,3');
    // Route::resource('university-courses', UniversityCourseController::class)->names('university-courses');

    Route::prefix('university-courses')->group(function () {
        Route::get('/', [UniversityCourseController::class, 'index'])->name('university-courses.index');
        Route::get('/count', [UniversityCourseController::class, 'count'])->name('university-courses.count');
        Route::get('list', [UniversityCourseController::class, 'list'])->name('university-courses.list');
        Route::get('create', [UniversityCourseController::class, 'create'])->name('university-courses.create')->middleware('accessLevel:1');
        Route::post('store', [UniversityCourseController::class, 'store'])->name('university-courses.store')->middleware('accessLevel:1');
        Route::get('{course}', [UniversityCourseController::class, 'show'])->name('university-courses.show');
        Route::get('{course}/detail', [UniversityCourseController::class, 'detail'])->name('university-courses.detail');
    });
    // Route::resource('intake-coourses', IntakeCourseController::class)->names('intake');
});
