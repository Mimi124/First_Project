<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StudentController;
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
//MANY TO MANY RELATIONSHIP - JUNCTION TABLE

Route::get('/', function () {
    return view('layout.master');
});

//courses
Route::prefix('/courses')->group(function(){
Route::get('/', [CourseController::class, 'showAllCourses'])->name('showAllCourses');
Route::get('/add', [CourseController::class, 'showAddCoursePage']);
Route::get('/{id}', [CourseController::class, 'showOneCourse'])->name('viewCourse');

Route::get('/{id}/edit', [CourseController::class, 'showEditCoursePage'])->name('updateCourse');
Route::post('/', [CourseController::class, 'saveCourse']);
Route::put('/', [CourseController::class, 'updateCourse']);
// Route::patch('/courses', [CourseController::class, 'updateCourse']);
Route::delete('/', [CourseController::class, 'deleteCourse']);
});
//Programmes
Route::prefix('/programmes')->group(function(){
Route::get('/', [ProgrammeController::class, 'showProgrammes'])->name('showProgrammes');
Route::get('/add', [ProgrammeController::class, 'showAddProgrammePage']);
Route::get('/{id}', [ProgrammeController::class, 'showOneProgramme'])->name('viewProgramme');

Route::post('/', [ProgrammeController::class, 'saveProgrammes']);
Route::get('/{id}/edit', [ProgrammeController::class, 'showEditProgrammePage'])->name('updateProgrammes');;
Route::patch('/', [ProgrammeController::class, 'updateProgrammes']);
Route::delete('/', [ProgrammeController::class, 'deleteProgramme']);
});

//Students
// Route::get('/students', [StudentController::class, 'showAllStudents']);
// Route::get('/students/add', [StudentController::class, 'showAddStudentPage']);
// Route::get('/students/{id}', [StudentController::class, 'showOneStudent'])->name('viewProgramme');

// Route::post('/students', [StudentController::class, 'saveStudent']);
// Route::put('/students', [StudentController::class, 'updateStudent']);
// Route::get('/students/{id}/edit', [StudentController::class, 'showEditStudentPage'])->name('updateProgrammes');;

// 
Route::prefix('/students')->group(function(){
    Route::get('/', [StudentController::class, 'showAllStudents'])->name('showAllStudents');
     Route::get('/add', [StudentController::class, 'showAddStudentPage']);
    Route::get('/{id}', [StudentController::class, 'showOneStudent'])->name('viewStudent');

    Route::post('/', [StudentController::class, 'saveStudent']);
    Route::get('/{id}/edit', [StudentController::class, 'showEditStudentPage'])->name('updateStudent');
    Route::put('/', [StudentController::class, 'updateStudent']);
    Route::delete('/', [StudentController::class, 'deleteStudent']);
});




