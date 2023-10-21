@extends('backEnd.index')

@section('content')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Create Soal Ujian</button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('buat-ujian') }}><i
                class="fa-solid fa-chevron-left me-2"></i>
            <span class="d-none d-lg-inline-block">Kembali</span></a>
    </div>
</div>
<div class="container  bg-white border p-3 py-4 rounded-bottom" style="margin-top: -1px">
    <form action={{ route('buat-ujian.store') }} method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row px-2">

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Pertanyaan</label>

                <textarea name="soalUjian" id="summernote" cols="30" rows="10"></textarea>

                {{-- <input type="text" class="form-control  @error('soalUjian') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="soalUjian"
                    value="{{ old('soalUjian') }}"> --}}
                @error('soalUjian')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-4">
                <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                <input type="text" class="form-control @error('opsiJawaban1') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="opsiJawaban1"
                    value="{{ old('opsiJawaban1') }}">
                @error('opsiJawaban')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-4">
                <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                <input type="text" class="form-control @error('opsiJawaban2') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="opsiJawaban2"
                    value="{{ old('opsiJawaban2') }}">
                @error('opsiJawaban')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-4">
                <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                <input type="text" class="form-control @error('opsiJawaban3') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="opsiJawaban3"
                    value="{{ old('opsiJawaban3') }}">
                @error('soalUjian')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Correct Answer</label>
                <select class="form-select" name="correct">
                    <option value="opsiJawaban1" selected>Opsi 1</option>
                    <option value="opsiJawaban2" selected>Opsi 2</option>
                    <option value="opsiJawaban3" selected>Opsi 3</option>
                </select>
                @error('correct')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection