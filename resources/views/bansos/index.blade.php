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
                    <div class="row mb-4">

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
@endsection
