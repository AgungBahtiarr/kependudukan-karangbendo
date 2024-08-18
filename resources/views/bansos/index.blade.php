@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Data Penerima Bantuan Sosial</h4>
                    </div>
                </div>

                <div class="card-body">
                    {{-- <div class="row mb-4">

                        <div class="col-md-3 iq-search-bar device-search">
                            <form action="" class="">
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                <input type="text" class="text search-input" placeholder="Cari" name="strquery">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="select-user-status-filter" name="filter">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua KK</option>
                                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non aktif" {{ request('status') == 'non aktif' ? 'selected' : '' }}>Non Aktif
                                </option>
                            </select>
                        </div>

                        @can('create_bansos')
                            <div class="col-md-3 items-end">
                                <a href={{ route('bansos.create') }} type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Data Bansos
                                </a>
                            </div>
                        @endcan
                    </div> --}}


                    <div class="grid grid-cols-1 md:grid-cols-2 mb-3 lg:grid-cols-4 gap-1">
                        <form action="" class="">
                            <div class="relative">
                                <input type="text" placeholder="Cari NIK ..."
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

                        <div class="lg:col-span-2">
                            <select class="form-control" id="select-filter" name="filter">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Filter Berdasarkan</option>
                                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non aktif" {{ request('status') == 'non aktif' ? 'selected' : '' }}>Non Aktif
                                </option>

                                @foreach ($programs as $program)
                                    <option value="{{ $program->nama_program }}"
                                        {{ request('status') == $program->nama_program ? 'selected' : '' }}>
                                        {{ $program->nama_program }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @can('create_bansos')
                            <div class="">
                                <a href={{ route('bansos.create') }} type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Data Bansos
                                </a>
                            </div>
                        @endcan
                    </div>


                    <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Sumber Dana</th>
                                <th>Jenis Bantuan</th>
                                <th>Detail Bantuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bansoses as $bansos)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bansos->nik }}</td>
                                    <td>{{ $bansos->program->nama_program }}</td>
                                    <td>{{ $bansos->program->jenis_bantuan }}</td>
                                    <td>{{ $bansos->program->detail_bantuan }}</td>
                                    <td>{{ $bansos->status == '1' ? 'Aktif' : 'Non-Aktif' }}</td>
                                    <td>
                                        <a href="{{ route('bansos.edit', $bansos->id) }}"
                                            class="btn btn-warning btn-sm mr-2 my-1 edit-btn">
                                            <i class="ri-edit-2-line"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm mr-2 my-1 edit-btn"
                                            hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                            hx-delete={{ route('bansos.delete', $bansos->id) }}><i
                                                class="ri-delete-bin-2-line"></i>Delete</a>

                                        <div hx-get={{ route('bansos.isLog', $bansos->id) }} hx-trigger="load"
                                            hx-target="this" hx-swap="innerHtml">
                                        </div>

                                        @if ($bansos->status == '1')
                                            <button class="btn btn-light btn-sm mr-2"
                                                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                                hx-post="/bansos/status/{{ $bansos->id }}/0"
                                                hx-trigger="click">Non-Aktifkan</button>
                                        @else
                                            <button class="btn btn-light btn-sm mr-2"
                                                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                                hx-post="/bansos/status/{{ $bansos->id }}/1"
                                                hx-trigger="click">Aktifkan</button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('#select-filter').change(e => {
                window.location.href =
                    `{{ route('bansos.index') }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
            });
        });
    </script>
@endsection
