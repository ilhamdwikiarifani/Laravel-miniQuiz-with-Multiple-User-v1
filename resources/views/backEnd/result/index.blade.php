@extends('backEnd.index')

@section('content')



@include('backEnd.components.messageModal')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Result Exam</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="table-responsive py-1 overflow-hidden">
        <table id="example" class="table table-borderless" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th> Benar</th>
                    <th> Salah</th>
                    <th>Jumlah Soal</th>
                    <th>Overall</th>
                    @can('admin')
                    <th>Actions</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @if (Auth::user() && Auth::user()->role->name === 'admin')
                @foreach ($result_exam as $key => $datas)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        {{ $datas->user->name }}
                    </td>
                    <td>{{ $datas->benar }}</td>
                    <td>{{ $datas->salah }}</td>
                    <td>{{ $datas->jumlahSoal }}</td>
                    <td>{{ $datas->overall }}</td>
                    @can('admin')
                    <td>
                        <form method="POST" action={{ route('result-exam.destroy', $datas->id) }}>
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="idx" value="{{ $datas->id }}">
                                <button type="submit" class="badge border-0 bg-danger p-2 fw-normal"
                                    onclick="return confirm('Yakin Menghapus Data ini?')"> <i
                                        class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </div>

                        </form>
                    </td>
                    @endcan
                </tr>
                @endforeach
                @else
                @foreach ($result_exam as $key => $datas)
                @if ($datas->user->is(auth()->user()))
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        {{ $datas->user->name }}
                    </td>
                    <td>{{ $datas->benar }}</td>
                    <td>{{ $datas->salah }}</td>
                    <td>{{ $datas->jumlahSoal }}</td>
                    <td>{{ $datas->overall }}</td>
                </tr>
                @endif
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection