<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ResultExamController;
use App\Http\Controllers\StudentExamController;
use App\Http\Controllers\UjianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('backEnd.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');


Route::middleware([auth::class])->group(
    function () {

        Route::get('dashboard', function () {
            return view('backEnd.layout.home');
        });

        Route::get('exam', [ExamController::class, 'exam_index']);
        Route::post('exam-proses', [ExamController::class, 'exam_proses']);

        Route::get('result-exam', [ResultExamController::class, 'result_exam_index']);


        Route::middleware([admin::class])->group(
            function () {

                Route::get('template', function () {
                    return view('backEnd.template.index');
                });

                Route::get('template/create', function () {
                    return view('backEnd.template.create');
                });

                Route::get('template/edit', function () {
                    return view('backEnd.template.edit');
                });


                Route::get('example', function () {
                    return view('backEnd.ujian.index');
                });


                Route::post('/proses', function (Request $request) {

                    $status1 = $request->input("opsi1");
                    $status2 = $request->input("opsi2");
                    $status3 = $request->input("opsi3");

                    $hasilFalse = 0;
                    $hasilTrue = 0;

                    if ($status1 === 'opsiBenar1') {
                        $hasilTrue += 1;
                    } else {
                        $hasilFalse += 1;
                    }

                    if ($status2 === 'opsiBenar3') {
                        $hasilTrue += 1;
                    } else {
                        $hasilFalse += 1;
                    }

                    if ($status3 === 'opsiBenar2') {
                        $hasilTrue += 1;
                    } else {
                        $hasilFalse += 1;
                    }

                    $totalSoal = $hasilTrue + $hasilFalse;

                    dd(
                        'Hasil Benar = '  . $hasilTrue,
                        'Salah = '  . $hasilFalse,
                        'jumlah Soal = ' . $totalSoal,
                        'Overall = ' . $hasilTrue . '/' . $totalSoal
                    );
                });

                Route::resource('buat-ujian', UjianController::class);

                Route::resource('manage-user', ManageUserController::class)
                    ->only('index', 'create', 'store', 'destroy');

                Route::delete('result-exam/{id}', [ResultExamController::class, 'result_exam_destroy'])
                    ->name('result-exam.destroy');
            }
        );
    }
);
