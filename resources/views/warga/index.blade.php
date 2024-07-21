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
                    <div class="row mb-4">

                        <div class="col-md-3 iq-search-bar device-search">
                            <form action="" class="">
                                <input type="text" class="text search-input" placeholder="Cari" name="strquery">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="select-warga-status-filter" name="filter">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Warga</option>
                                <option value="1" {{ request('status') == 'aktif' ? 'selected' : '' }}>Kepala Keluarga
                                </option>
                                <option value="0" {{ request('status') == 'non aktif' ? 'selected' : '' }}>Anggota
                                    Keluarga
                                </option>
                            </select>
                        </div>

                        @can('create_wargas')
                            <div class="col-md-3 items-end">
                                <a href="/warga/create/1" type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Data Warga
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
                                    <td>{{ $warga->status_keluarga == '0' ? 'Anggota Keluarga' : 'Kepala Keluarga' }}</td>
                                    @role('Admin')
                                        <td>
                                            @if ($warga->verified == 'yes')
                                                Terverifikasi
                                            @else
                                                @can('edit_wargas')
                                                    @if ($warga->verified == 'no')
                                                        <a href={{ route('wargas.verify', $warga->id) }}
                                                            class="btn btn-warning btn-sm mr-2 my-1 edit-btn">
                                                            <i class="ri-check-line"></i>
                                                            Verifikasi
                                                        </a>
                                                    @endif
                                                @endcan
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
                                        <div id="addDawis" hx-get="/warga/isDawis/{{ $warga->id }}" hx-swap="innerHtml"
                                            hx-trigger="load">
                                        </div>
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
            $('#select-warga-status-filter').change(e => {
                window.location.href =
                    `{{ route('wargas.index') }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
            });
        });
    </script>
@endsection
