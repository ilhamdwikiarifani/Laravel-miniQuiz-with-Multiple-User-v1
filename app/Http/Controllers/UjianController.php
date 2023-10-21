<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ujian = Ujian::get();
        return view('backEnd.buatUjian.index', compact('ujian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.buatUjian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Ujian $ujian)
    {
        $ujian->soalUjian = $request->soalUjian;

        if ($request->correct == 'opsiJawaban1') {
            $ujian->correct = $request->opsiJawaban1;
        } elseif ($request->correct == 'opsiJawaban2') {
            $ujian->correct = $request->opsiJawaban2;
        } else {
            $ujian->correct = $request->opsiJawaban3;
        }

        $ujian->opsiJawaban =  json_encode(array(
            'opsiJawaban1' => $request->opsiJawaban1,
            'opsiJawaban2' => $request->opsiJawaban2,
            'opsiJawaban3' => $request->opsiJawaban3,
        ));

        $ujian->save();
        return redirect('buat-ujian')->with('success', 'berhasil membuat Soal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ujian $ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {


        Ujian::where('id', $request->idx)->delete();

        return redirect()->back()->with('success', 'berhasil menghapus soal Ujian');
    }
}
