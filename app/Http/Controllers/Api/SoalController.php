<?php

namespace App\Http\Controllers\Api;

use App\Models\Ujian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{
    public function index()
    {
        $ujian = Ujian::get();

        return response()->json(['data', $ujian]);
    }

    public function soal_proses(Request $request, Ujian $ujian)
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


        // Result_Exam::create([
        //     'user_id' => $userCurrent,
        //     'benar' => $hasilTrue,
        //     'salah' => $hasilFalse,
        //     'jumlahSoal' => $totalSoal,
        //     'overall' => $overall
        // ]);

        return response()->json([
            'data', $ujian,
            'user_id' => $userCurrent,
            'benar' => $hasilTrue,
            'salah' => $hasilFalse,
            'jumlahSoal' => $totalSoal,
            'overall' => $overall
        ]);
    }
}
