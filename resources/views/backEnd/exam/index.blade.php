@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Ujian</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3">
        @if ($ujian->count() > 0) <form action={{ url('exam-proses') }} method="POST">
            @csrf
            @foreach ($ujian as $key => $datas)

            <?php 
                            $options = json_decode(json_decode(json_encode($datas->opsiJawaban)),true);
                        ?>

            <p>{{ $key+1 }} . {!! $datas->soalUjian !!}</p>
            <ul class="list-unstyled">
                <li><input type="radio" name="opsiJawaban{{ $key+1 }}" value="{{ $options['opsiJawaban1'] }}">{{
                    $options['opsiJawaban1'] }}
                </li>
                <li><input type="radio" name="opsiJawaban{{ $key+1 }}" value="{{ $options['opsiJawaban2'] }}"> {{
                    $options['opsiJawaban2']
                    }}
                </li>
                <li><input type="radio" name="opsiJawaban{{ $key+1 }}" value="{{ $options['opsiJawaban3'] }}"> {{
                    $options['opsiJawaban3']
                    }}
                </li>

            </ul>
            @endforeach
            <button type="submit" class="btn btn-primary text-13px">Submit</button>
        </form>
        @else
        <div>Tidak Ada Soal !</div>
        @endif
    </div>
</div>
@endsection