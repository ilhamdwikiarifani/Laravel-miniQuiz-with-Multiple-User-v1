<?php

namespace App\Http\Controllers;

use App\Models\Result_Exam;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function exam_index()
    {
        $ujian = Ujian::all();

        return view('backEnd.exam.index', compact('ujian'));
    }

    public function exam_proses(Request $request, Ujian $ujian)
    {

        $ujian = Ujian::all();

        $hasilTrue = 0;
        $hasilFalse = 0;

        for ($i = 1; $i <= $ujian->count(); $i++) {
            $status[] = $request->input("opsiJawaban$i");
        }

        foreach ($ujian as $key => $datas) {
            $opsi[] = $datas->correct;

            if ($status[$key] === $opsi[$key]) {
                $hasilTrue++;
            } else {
                $hasilFalse++;
            }
        }

        $totalSoal = $hasilTrue + $hasilFalse;

        $userCurrent = Auth::user()->id;

        $overall = $hasilTrue . '/' . $totalSoal;


        Result_Exam::create([
            'user_id' => $userCurrent,
            'benar' => $hasilTrue,
            'salah' => $hasilFalse,
            'jumlahSoal' => $totalSoal,
            'overall' => $overall
        ]);

        return redirect('result-exam');
    }
}
