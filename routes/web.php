<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgrammeController;
use Illuminate\Support\Facades\Route;

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
    return view('layout.master');
});

Route::get('/courses', [CourseController::class, 'showAllCourses']);
Route::get('/courses/add', [CourseController::class, 'showAddCoursePage']);
Route::post('/courses', [CourseController::class, 'saveCourse']);

Route::get('/programmes', [ProgrammeController::class, 'showProgrammes']);



