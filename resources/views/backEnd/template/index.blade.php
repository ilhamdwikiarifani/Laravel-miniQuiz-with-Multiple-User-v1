@extends('backEnd.index')

@section('content')



@include('backEnd.components.messageModal')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Template</button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('template/create') }}><i
                class="fa-solid fa-plus me-lg-2"></i> <span class="d-none d-lg-inline-block">Create
                Something</span></a>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="table-responsive py-1 overflow-hidden">
        <table id="example" class="table table-borderless" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <form method="POST" action="">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <div class="badge border-0 bg-warning p-2 fw-normal"> <a href={{ url('template/edit') }}
                                        class="text-decoration-none text-white"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                </div>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge border-0 bg-danger p-2 fw-normal"
                                    onclick="return confirm('Yakin Menghapus Data ini?')"> <i
                                        class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </div>

                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection