@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Data Kematian</h4>
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
                                <a href={{route("kematian.create")}} type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Data Kematian
                                </a>
                            </div>
                        @endcan
                    </div>

                    <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>NIK Pelapor</th>
                                <th>Waktu Kematian</th>
                                <th>Kontak Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kematians as $kematian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$kematian->warga->nama}}</td>
                                    <td>{{ $kematian->nik }}</td>
                                    <td>{{ $kematian->nik_pelapor }}</td>
                                    <td>{{ $kematian->waktu_kematian }}</td>
                                    <td>{{ $kematian->kontak_keluarga }}</td>
                                    {{-- <td>
                                    @can('read_kematians')
                                        <a href="{{ route('kematians.show', $warga->id) }}"
                                            class="btn btn-primary btn-sm mr-2 my-1 edit-btn">
                                            <i class="ri-information-fill"></i>
                                            Detail
                                        </a>
                                    @endcan
                                    @can('edit_kematians')
                                        <a href="{{ route('kematians.edit1', $warga->id) }}"
                                            class="btn btn-secondary btn-sm mr-2 my-1 edit-btn">
                                            <i class="ri-edit-2-line"></i>
                                            Edit
                                        </a>
                                    @endcan
                                    <div id="addDawis" hx-get="/warga/isDawis/{{ $warga->id }}" hx-swap="innerHtml"
                                        hx-trigger="load">
                                    </div>

                                    <a class="btn btn-danger btn-sm mr-2 my-1 edit-btn"
                                        hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                        hx-delete={{ route('kematians.delete', $warga->id) }}><i
                                            class="ri-delete-bin-2-line"></i>Delete</a>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
