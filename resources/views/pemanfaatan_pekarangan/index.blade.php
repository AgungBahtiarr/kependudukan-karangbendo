@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Data Catatan Pemanfaatan Pekarangan</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">

                        <div class="col-md-3 iq-search-bar device-search">
                            <form action="" class="">
                                {{-- <a class="search-link" href="#"><i class="ri-search-line"></i></a> --}}
                                <input type="text" class="text search-input" placeholder="Cari" name="strquery">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="select-user-status-filter" name="filter">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua KK</option>
                                {{-- <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="non aktif" {{ request('status') == 'non aktif' ? 'selected' : '' }}>Non Aktif</option> --}}
                            </select>
                        </div>

            </div>

            <table id="datatable" class="table data-table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NKK</th>
                        <th>Kriteria Rumah</th>
                        <th>Sumber air</th>
                        <th>Satu Rumah Satu KK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargas as $carga)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $carga->nkk }}</td>
                            <td>{{ $carga->kriteria_rumah }}</td>
                            <td>{{ $carga->sumber_air->nama_sumber_air }}</td>
                            <td>{{ $carga->satu_rumah_satu_kk }}</td>
                            <td>
                                <!-- Edit Data Kader -->
                                <a href={{route('pekarangans.create')}} class="btn btn-success btn-sm mr-2 my-1 create-btn">
                                    <i class="ri-create-2-line"></i>
                                    Tambah
                                </a>
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
