@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Data Catatan Rumah Tangga</h4>
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
                            <select class="form-control" id="select-cargas-status-filter" name="filter">
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                                <option value="yes" {{ request('status') == 'yes' ? 'selected' : '' }}>Terverifikasi
                                </option>
                                <option value="no" {{ request('status') == 'no' ? 'selected' : '' }}>Belum Terverifikasi
                                </option>
                            </select>
                        </div>

                        @can('create_cargas')
                            <div class="col-md-3 items-end">
                                <a href={{ route('cargas.create1') }} type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Catatan Rumah Tangga
                                </a>

                                <!-- Modal Tambah Data Kader Baru -->
                                {{-- @include('cargas.create') --}}
                            </div>
                        @endcan
                    </div>

                    <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NKK</th>
                                <th>Kriteria Rumah</th>
                                <th>Sumber air</th>
                                <th>Satu Rumah Satu KK</th>
                                @role('Admin')
                                    <th>Status</th>
                                @endrole
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargas as $carga)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $carga->nkk }}</td>
                                    <td>{{ $carga->kriteria_rumah == '1' ? 'Layak huni' : 'Tidak Layak Huni' }}</td>
                                    <td>{{ $carga->sumber_air->nama_sumber_air }}</td>
                                    <td>{{ $carga->satu_rumah_satu_kk == '1' ? 'Ya' : 'Tidak' }}</td>
                                    @role('Admin')
                                        <td>
                                            @if ($carga->verified == 'yes')
                                                Terverifikasi
                                            @else
                                                Belum Terverifikasi
                                            @endif
                                        </td>
                                    @endrole
                                    @can('edit_cargas')
                                        @if ($carga->verified == 'no')
                                            <a href={{ route('cargas.verify', $carga->id) }}
                                                class="btn btn-warning btn-sm mr-2 my-1 edit-btn">
                                                <i class="ri-check-line"></i>
                                                Verifikasi
                                            </a>
                                        @endif
                                    @endcan
                                    <td>
                                        <a href="{{ route('cargas.show', $carga->id) }}"
                                            class="btn btn-primary btn-sm mr-2 my-1 edit-btn">
                                            <i class="ri-information-fill"></i>
                                            Detail
                                        </a>
                                        <a class="btn btn-danger btn-sm mr-2 my-1 edit-btn"
                                            hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                            hx-delete={{ route('cargas.delete', $carga->id) }}><i
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
@endsection

@section('script')
    <script>
        $(function() {
            $('#select-cargas-status-filter').change(e => {
                window.location.href =
                    `{{ route('cargas.index') }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
            });
        });
    </script>
@endsection
