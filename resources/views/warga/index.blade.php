@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Data Warga</h4>
                    </div>
                </div>

                <div class="card-body">
                    {{-- <div class="row mb-4">

                        <div class="col-md-3 iq-search-bar device-search">
                            <form action="" class="">
                                <input type="text" class="text search-input" placeholder="Cari" name="strquery">
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="iq-search-bar device-search">
                                <form action="#" class="searchbox">
                                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                    <input type="text" class="text search-input" placeholder="Search here..."
                                        name="strquery">
                                </form>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <select class="form-control" id="select-warga-status-filter" name="filter">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Warga
                                </option>
                                <option value="yes" {{ request('status') == 'yes' ? 'selected' : '' }}>Teverifikasi
                                </option>
                                <option value="no" {{ request('status') == 'no' ? 'selected' : '' }}>Belum
                                    Terverifikasi</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control" id="select-warga-status-filter" name="filter">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Warga
                                </option>
                                <option value="yes" {{ request('status') == 'yes' ? 'selected' : '' }}>Teverifikasi
                                </option>
                                <option value="no" {{ request('status') == 'no' ? 'selected' : '' }}>Belum
                                    Terverifikasi</option>
                            </select>
                        </div>

                        @can('create_wargas')
                            <div class="col-md-2 items-end">
                                <a href="/warga/create/1" type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Data Warga
                                </a>
                            </div>
                        @endcan
                    </div> --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 mb-3 lg:grid-cols-4 gap-1">

                        {{-- <div class="">
                                <div class="iq-search-bar device-search">
                                    <form action="#" class="searchbox">
                                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                        <input type="text" class="text search-input" placeholder="Search here..."
                                            name="strquery">
                                    </form>
                                </div>
                            </div>  --}}

                        <form action="" class="col-span-2">
                            <div class="relative">
                                <input type="text" placeholder="Cari Nama / NIK ..."
                                    class="w-full pl-4 pr-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-[#fafbfe]"
                                    name="strquery">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </form>

                        {{-- <div class="col-span-2">
                            <select class="form-control" id="select-warga-status-filter" name="filter">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Warga
                                </option>
                                <option value="yes" {{ request('status') == 'yes' ? 'selected' : '' }}>Teverifikasi
                                </option>
                                <option value="no" {{ request('status') == 'no' ? 'selected' : '' }}>Belum
                                    Terverifikasi</option>
                                <option value="domisili_sesuai"
                                    {{ request('status') == 'domisili_sesuai' ? 'selected' : '' }}>
                                    Domisili Sesuai KTP</option>
                                <option value="domisili_tidak_sesuai"
                                    {{ request('status') == 'domisili_tidak_sesuai' ? 'selected' : '' }}>Domisili Tidak
                                    Sesuai KTP</option>
                            </select>
                        </div> --}}

                        {{-- <div class="">
                            <select class="form-control" id="select-warga-search-filter" name="filter-search" required>
                                <option value="" selected>Cari Berdasarkan</option>
                                <option value="pendidikan" {{ request('status') == 'pendidikan' ? 'selected' : '' }}>
                                    Pendidikan
                                </option>
                                <option value="agama" {{ request('status') == 'agama' ? 'selected' : '' }}>Agama</option>
                                <option value="pekerjaan" {{ request('status') == 'pekerjaan' ? 'selected' : '' }}>Pekerjaan
                                </option>
                                <option value="rt" {{ request('status') == 'rt' ? 'selected' : '' }}>RT
                                </option>
                                <option value="rw" {{ request('status') == 'rw' ? 'selected' : '' }}>RW</option>
                            </select>
                        </div>  --}}

                        <div class="">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal"
                                data-target="#staticBackdrop">
                                Filter Berdasarkan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Filter Warga</h1>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="">
                                                <select class="form-control" id="select-warga-status-filter" name="filter">
                                                    <option value="all"
                                                        {{ request('status') == 'all' ? 'selected' : '' }}>Semua Warga
                                                    </option>
                                                    <option value="yes"
                                                        {{ request('status') == 'yes' ? 'selected' : '' }}>Teverifikasi
                                                    </option>
                                                    <option value="no"
                                                        {{ request('status') == 'no' ? 'selected' : '' }}>Belum
                                                        Terverifikasi</option>
                                                    <option value="domisili_sesuai"
                                                        {{ request('status') == 'domisili_sesuai' ? 'selected' : '' }}>
                                                        Domisili Sesuai KTP</option>
                                                    <option value="domisili_tidak_sesuai"
                                                        {{ request('status') == 'domisili_tidak_sesuai' ? 'selected' : '' }}>
                                                        Domisili Tidak
                                                        Sesuai KTP</option>
                                                    <option hx-get={{ route('wargas.filter-pendidikan') }}
                                                        hx-trigger="click" hx-swap="innerHtml" hx-target="#formFilter"
                                                        value="pendidikan"
                                                        {{ request('status') == 'pendidikan' ? 'selected' : '' }}>
                                                        Pendidikan
                                                    </option>
                                                    <option hx-get={{ route('wargas.filter-agama') }} hx-trigger="click"
                                                        hx-swap="innerHtml" hx-target="#formFilter" value="agama"
                                                        {{ request('status') == 'agama' ? 'selected' : '' }}>Agama</option>
                                                    <option hx-get={{ route('wargas.filter-pekerjaan') }} hx-trigger="click"
                                                        hx-swap="innerHtml" hx-target="#formFilter" value="pekerjaan"
                                                        {{ request('status') == 'pekerjaan' ? 'selected' : '' }}>Pekerjaan
                                                    </option>
                                                    <option hx-get={{ route('wargas.filter-status-perkawinan') }}
                                                        hx-trigger="click" hx-swap="innerHtml" hx-target="#formFilter"
                                                        value="status-perkawinan"
                                                        {{ request('status') == 'status-perkawinan' ? 'selected' : '' }}>
                                                        Status Perkawinan
                                                    </option>
                                                </select>
                                            </div>

                                            <div id="formFilter">

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @can('create_wargas')
                            <div class="">
                                <a href="/warga/create/1" type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Data Warga
                                </a>
                            </div>
                        @endcan
                    </div>

                    <div class="overflow-x-scroll md:overflow-x-hidden">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>NO KK</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>STATUS DALAM KELUARGA</th>
                                    @role('Admin')
                                        <th>Status</th>
                                    @endrole
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wargas as $warga)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $warga->nama }}</td>
                                        <td>{{ $warga->nik }}</td>
                                        <td>{{ $warga->nkk }}</td>
                                        <td>{{ $warga->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        <td>{{ $warga->status_keluarga == '0' ? 'Anggota Keluarga' : 'Kepala Keluarga' }}
                                        </td>
                                        @role('Admin')
                                            <td>
                                                @if ($warga->verified == 'yes')
                                                    Terverifikasi
                                                @else
                                                    Belum Terverifikasi
                                                @endif
                                            </td>
                                        @endrole
                                        <td>
                                            @can('read_wargas')
                                                <a href="{{ route('wargas.show', $warga->id) }}"
                                                    class="btn btn-primary btn-sm mr-2 my-1 edit-btn">
                                                    <i class="ri-information-fill"></i>
                                                    Detail
                                                </a>
                                            @endcan
                                            @can('edit_wargas')
                                                <a href="{{ route('wargas.edit1', $warga->id) }}"
                                                    class="btn btn-secondary btn-sm mr-2 my-1 edit-btn">
                                                    <i class="ri-edit-2-line"></i>
                                                    Edit
                                                </a>
                                            @endcan
                                            @can('edit_wargas')
                                                @if ($warga->verified == 'no')
                                                    <a href={{ route('wargas.verify', $warga->id) }}
                                                        class="btn btn-warning btn-sm mr-2 my-1 edit-btn">
                                                        <i class="ri-check-line"></i>
                                                        Verifikasi
                                                    </a>
                                                @endif
                                            @endcan
                                            <div id="addDawis" hx-get="/warga/isDawis/{{ $warga->id }}"
                                                hx-swap="innerHtml" hx-trigger="load">
                                            </div>

                                            <a class="btn btn-danger btn-sm mr-2 my-1 edit-btn"
                                                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                                hx-delete="/warga/{{ $warga->id }}"><i
                                                    class="ri-delete-bin-2-line"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- $(function() {
        $('#select-warga-search-filter').change(e => {
            window.location.href =
                `{{ route('wargas.index') }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
        });
    }); --}}
@endsection

@section('script')
    <script>
        // $(function() {
        //     $('#select-warga-status-filter').change(e => {
        //         window.location.href =
        //             `{{ route('wargas.index') }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
        //     });
        // });

        $(function() {
            $('#select-warga-status-filter').change(function(e) {
                var selectedValue = $(e.target).val();
                var excludedOptions = ['pendidikan', 'agama', 'pekerjaan', 'status-perkawinan'];

                if (selectedValue && !excludedOptions.includes(selectedValue)) {
                    window.location.href = `{{ route('wargas.index') }}?status=${selectedValue}`;
                } else if (!selectedValue) {
                    window.location.href = `{{ route('wargas.index') }}`;
                }
            });
        });
    </script>
@endsection
