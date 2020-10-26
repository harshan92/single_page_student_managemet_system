<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get_all_students', [StudentController::class, 'getAllStudents']);
Route::get('/get_student_by_id/{student_id}', [StudentController::class, 'getStudentByID']);
Route::post('/create_new_student', [StudentController::class, 'createNewStudent']);
Route::put('/update_student', [StudentController::class, 'updateExsistingStudent']);
Route::delete('/delete_student/{student_id}', [StudentController::class, 'deleteStudentByID']);