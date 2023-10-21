@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Dashboard</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3">
        <h2 class="mt-3">Selamat Datang <span class="text-warning">{{ Auth::user()->name }}🚀</span></h2>
        <p class="mt-3">Dashoard <code></code> The starting state of the menu will appear
            collapsed on
            smaller screens, and will appear
            non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>
            Make sure to keep all page content within the
            <code>#page-content-wrapper</code>
            . The top navbar is optional, and just for demonstration. Just create an element with the
            <code>#sidebarToggle</code>
            ID which will toggle the menu when clicked.
        </p>
    </div>
</div>
@endsection