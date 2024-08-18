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
                    <div class="grid grid-cols-1 md:grid-cols-2 mb-3 lg:grid-cols-4 gap-1">
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

                                                    <option value="rumah_layak"
                                                        {{ request('status') == 'rumah_layak' ? 'selected' : '' }}>Rumah
                                                        Layak
                                                    </option>

                                                    <option value="rumah_tidak_layak"
                                                        {{ request('status') == 'rumah_tidak_layak' ? 'selected' : '' }}>
                                                        Rumah Tidak
                                                        Layak
                                                    </option>

                                                    <option value="ada_nkk_inang"
                                                        {{ request('status') == 'ada_nkk_inang' ? 'selected' : '' }}>
                                                        Dengan NKK Induk
                                                    </option>
                                                    <option value="tidak_ada_nkk_inang"
                                                        {{ request('status') == 'tidak_ada_nkk_inang' ? 'selected' : '' }}>
                                                        Tidak dengan NKK Induk
                                                    </option>

                                                    <option hx-get={{ route('cargas.filter-sumber-air') }}
                                                        hx-trigger="click" hx-swap="innerHtml" hx-target="#formFilter"
                                                        value="sumber-air"
                                                        {{ request('status') == 'sumber-air' ? 'selected' : '' }}>
                                                        Sumber Air
                                                    </option>

                                                    <option hx-get={{ route('cargas.filter-makanan-pokok') }}
                                                        hx-trigger="click" hx-swap="innerHtml" hx-target="#formFilter"
                                                        value="makanan-pokok"
                                                        {{ request('status') == 'makanan-pokok' ? 'selected' : '' }}>
                                                        Makanan Pokok
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

                        @can('create_cargas')
                            <div class="items-end">
                                <a href={{ route('cargas.create1') }} type="button" class="btn btn-primary btn-block">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Catatan
                                </a>
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
            $('#select-warga-status-filter').change(function(e) {
                var selectedValue = $(e.target).val();
                var excludedOptions = ['sumber-air','makanan-pokok'];

                if (selectedValue && !excludedOptions.includes(selectedValue)) {
                    window.location.href = `{{ route('cargas.index') }}?status=${selectedValue}`;
                } else if (!selectedValue) {
                    window.location.href = `{{ route('cargas.index') }}`;
                }
            });
        });
    </script>
@endsection
