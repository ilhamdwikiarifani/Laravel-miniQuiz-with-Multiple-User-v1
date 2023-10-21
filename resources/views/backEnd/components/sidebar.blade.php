<div class="pe-3 mt-2" id="sidebar-wrapper">
    <div class="list-group list-group-flush mt-2">
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('dashboard') ? 'activeSidebar' : '') }}" href={{
            url('dashboard') }}><i class="fa-regular fa-folder-closed me-2"></i>Dashboard</a>
        @can('admin')
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('manage-user') ? 'activeSidebar' : '') }}" href={{
            url('manage-user') }}><i class="fa-solid fa-user-plus me-2"></i>Manage User</a>
        {{-- <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('template*') ? 'activeSidebar' : '' ) }} " href={{
            url('template') }}><i class="fa-solid fa-code me-2"></i>Template</a> --}}
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('buat-ujian*') ? 'activeSidebar' : '' ) }} " href={{
            url('buat-ujian') }}><i class="fa-regular fa-pen-to-square me-2"></i>Buat soal ujian</a>
        @endcan
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('result-exam') ? 'activeSidebar' : '' ) }} " href={{
            url('result-exam') }}><i class="fa-solid fa-check me-2"></i> Result Exam</a>
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('exam') ? 'activeSidebar' : '' ) }} " href={{
            url('exam') }}><i class="fa-regular fa-rectangle-list me-2"></i> Exam</a>
        {{-- <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('example') ? 'activeSidebar' : '' ) }} " href={{
            url('example') }}><i class="fa-solid fa-question me-2"></i> Ujian Static</a> --}}
    </div>
</div>