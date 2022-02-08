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
Route::get('/courses/{id}/edit', [CourseController::class, 'showEditCoursePage'])->name('updateCourse');
Route::post('/courses', [CourseController::class, 'saveCourse']);
Route::put('/courses', [CourseController::class, 'updateCourse']);
Route::patch('/courses', [CourseController::class, 'updateCourse']);
Route::delete('/courses', [CourseController::class, 'deleteCourse']);



Route::get('/programmes', [ProgrammeController::class, 'showProgrammes']);
Route::get('/programmes/add', [ProgrammeController::class, 'showAddProgrammePage']);

Route::post('/programmes', [ProgrammeController::class, 'saveProgrammes']);
Route::get('/programmes/{id}/edit', [ProgrammeController::class, 'showEditProgrammePage'])->name('updateProgrammes');;
Route::patch('/programmes', [ProgrammeController::class, 'updateProgrammes']);
Route::delete('/programmes', [ProgrammeController::class, 'deleteProgramme']);



