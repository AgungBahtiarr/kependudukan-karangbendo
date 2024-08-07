@extends('layouts.app')


@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Data Program Bansos</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">

                        <div class="col-md-3 iq-search-bar device-search">
                            <form action="" class="">
                                <input type="text" class="text search-input" placeholder="Cari" name="strquery">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="select-warga-status-filter" name="filter">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Warga
                                </option>
                                <option value="yes" {{ request('status') == 'yes' ? 'selected' : '' }}>Teverifikasi
                                </option>
                                <option value="no" {{ request('status') == 'no' ? 'selected' : '' }}>Belum
                                    Terverifikasi</option>
                            </select>
                        </div>

                        @can('create_kematians')
                            <div class="col-md-3 items-end">
                                <a href={{ route('programbansos.create') }} type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Program Bansos
                                </a>
                            </div>
                        @endcan
                    </div>

                    <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Program</th>
                                <th>Sumber Dana</th>
                                <th>Jenis Bantuan</th>
                                <th>Detail Bantuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $program->nama_program }}</td>
                                    <td>{{ $program->sumber_dana }}</td>
                                    <td>{{ $program->jenis_bantuan }}</td>
                                    <td>{{ $program->detail_bantuan }}</td>
                                    <td>
                                        {{-- @can('read_kematians')
                                            <a href="{{ route('kematians.show', $warga->id) }}"
                                                class="btn btn-primary btn-sm mr-2 my-1 edit-btn">
                                                <i class="ri-information-fill"></i>
                                                Detail
                                            </a>
                                        @endcan --}}
                                        <a href="{{ route('programbansos.edit', $program->id) }}"
                                            class="btn btn-secondary btn-sm mr-2 my-1 edit-btn">
                                            <i class="ri-edit-2-line"></i>
                                            Edit
                                        </a>
                                        {{-- <div id="addDawis" hx-get="/warga/isDawis/{{ $warga->id }}" hx-swap="innerHtml"
                                            hx-trigger="load">
                                        </div> --}}

                                        <div hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                            hx-post={{ route('programbansos.is-used', $program->id) }} hx-trigger="load"
                                            hx-swap="innerHtml" hx-target="this"></div>
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
