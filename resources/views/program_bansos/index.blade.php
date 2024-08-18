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
                    <div class="grid grid-cols-1 md:grid-cols-2 mb-3 gap-1">
                        @can('read_bansos')
                            <form action="" class="">
                                <div class="relative">
                                    <input type="text" placeholder="Cari Program ..."
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
                        @endcan

                        @can('create_bansos')
                            <div class="">
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
                                        @can('edit_bansos')
                                            <a href="{{ route('programbansos.edit', $program->id) }}"
                                                class="btn btn-secondary btn-sm mr-2 my-1 edit-btn">
                                                <i class="ri-edit-2-line"></i>
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete_bansos')
                                            <div hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                                hx-post={{ route('programbansos.is-used', $program->id) }} hx-trigger="load"
                                                hx-swap="innerHtml" hx-target="this"></div>
                                        @endcan
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
