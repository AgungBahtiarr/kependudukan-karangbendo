@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="row mx-1 my-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title w-100">
                        <h4 class="card-title d-inline-block mb-0">Akun Kader</h4>
                    </div>
                </div>
                <div class="card-body">
                    @error('addKader')
                        <div class="alert alert-danger" role="alert">
                            <div class="iq-alert-text">{{ $errors->first() }}</div>
                        </div>
                    @enderror
                    <div class="row mb-4">


                        {{-- <div class="col-md-3 iq-search-bar device-search">
                            <form action="" class="">
                                <input type="text" class="text search-input" placeholder="Cari" name="strquery">
                            </form>
                        </div> --}}
                        <div class="col-md-9">
                            <select class="form-control" id="select-user-status-filter" name="filter">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Kader</option>
                                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="non aktif" {{ request('status') == 'non aktif' ? 'selected' : '' }}>Non Aktif
                                </option>
                            </select>
                        </div>

                        @can('create_users')
                            <div class="col-md-3 items-end">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                    data-target="#createUserModal">
                                    <i class="ri-user-add-line"></i>
                                    Tambah Akun Kader
                                </button>

                                <!-- Modal Tambah Data Kader Baru -->
                                @include('user.create')
                            </div>
                        @endcan
                    </div>

                    <div class="overflow-x-scroll md:overflow-x-hidden w-full">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            @if ($user->status == 'aktif')
                                                <span class="btn btn-success btn-sm">{{ ucfirst($user->status) }}</span>
                                            @elseif ($user->status == 'non aktif')
                                                <span class="btn btn-danger btn-sm">{{ ucfirst($user->status) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit Data Kader -->
                                            <a href="{{ route('users.update', $user->id) }}"
                                                class="btn btn-warning btn-sm mr-2 my-1 edit-btn" data-toggle="modal"
                                                data-target="#editUserModal" data-name="{{ $user->name }}"
                                                data-nik="{{ $user->nik }}" data-username="{{ $user->username }}">
                                                <i class="ri-edit-2-line"></i>
                                                Edit
                                            </a>

                                            <!-- Modal Edit Data Kader -->
                                            @include('user.edit')

                                            <!-- Ubah Status Kader -->
                                            @if ($user->status == 'aktif')
                                                <form action="{{ route('users.status.update', $user->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="non aktif">
                                                    <button type="submit" class="btn btn-danger btn-sm mr-2 my-1">
                                                        <i class="ri-alert-line"></i> Non Aktifkan
                                                    </button>
                                                </form>
                                            @elseif ($user->status == 'non aktif')
                                                <form action="{{ route('users.status.update', $user->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="aktif">
                                                    <button type="submit" class="btn btn-success btn-sm mr-2 my-1">
                                                        <i class="ri-check-double-line"></i> Aktifkan
                                                    </button>
                                                </form>
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
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#select-user-status-filter').change(e => {
                window.location.href =
                    `{{ route('users.index') }}${$(e.target).val() ? `?status=${$(e.target).val()}` : ''}`;
            });
        });

        document.querySelectorAll('#togglePassword').forEach(item => {
            item.addEventListener('click', function(e) {
                const password = e.target.closest('.input-group').querySelector('#password');
                if (password.type === 'password') {
                    password.type = 'text';
                    item.innerHTML = '<i class="fa fa-eye-slash"></i>';
                } else {
                    password.type = 'password';
                    item.innerHTML = '<i class="fa fa-eye"></i>';
                }
            });
        });

        $('.edit-btn').on('click', function(e) {
            e.preventDefault()
            $('.edit-name').val($(this).data('name'))
            $('.edit-nik').val($(this).data('nik'))
            $('.edit-username').val($(this).data('username'))
            $('#edit-modal-form').attr('action', $(this).attr('href'))
        })
    </script>
@endsection
