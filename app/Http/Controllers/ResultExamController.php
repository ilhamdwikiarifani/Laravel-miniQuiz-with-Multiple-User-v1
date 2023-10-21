<?php

namespace App\Http\Controllers;

use App\Models\Result_Exam;
use Illuminate\Http\Request;

class ResultExamController extends Controller
{
    public function result_exam_index()
    {
        $result_exam = Result_Exam::with('user')->latest()->get();

        return view('backEnd.result.index', compact('result_exam'));
    }

    public function result_exam_destroy(Request $request)
    {

        Result_Exam::where('id', $request->idx)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Hasil Ujian Siswa');
    }
}
