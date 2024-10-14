@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Warga</h1>


        <div class="my-4">
            <ol
                class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Informasi <span class="hidden sm:inline-flex sm:ms-2">Personal</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="me-2">2</span>
                        Alamat <span class="hidden sm:inline-flex sm:ms-2"></span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <span class="me-2">3</span>
                        Dawis <span class="hidden sm:inline-flex sm:ms-2"></span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="me-2">4</span>
                    Kegiatan
                </li>
            </ol>
        </div>

        <div class="mt-4">
            @error('error')
                <div class="alert alert-danger" role="alert">
                    <div class="iq-alert-text">{{ $errors->first() }}</div>
                </div>
            @enderror
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <h1 class="mb-4 font-semibold">Informasi Personal</h1>
            <form action="{{ route('wargas.store1') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control" required pattern="\d{16}"
                            title="NIK harus terdiri dari 16 digit angka" minlength="16" maxlength="16"
                            value="{{ $wargaSession ? $wargaSession['nik'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nkk">NKK</label>
                        <input type="text" id="nkk" name="nkk" class="form-control" required pattern="\d{16}"
                            minlength="16" maxlength="16" title="NKK harus terdiri dari 16 digit angka"
                            value="{{ $wargaSession ? $wargaSession['nkk'] : '' }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required
                            value="{{ $wargaSession ? $wargaSession['nama'] : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" required>
                            @if ($wargaSession)
                                <option value="L" {{ $wargaSession['jenis_kelamin'] == 'L' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="P" {{ $wargaSession['jenis_kelamin'] == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            @else
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required
                            value="{{ $wargaSession ? $wargaSession['tempat_lahir'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" placeholder="dd-mm-yyyy" name="tanggal_lahir" class="form-control" required
                            value="{{ $wargaSession ? $wargaSession['tanggal_lahir'] : '' }}">
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" aria-label="Default select example" name="id_agama" required>
                            @if ($wargaSession)
                                @foreach ($agamas as $agama)
                                    <option value={{ $agama->id }}
                                        {{ $wargaSession['id_agama'] == $agama->id ? 'selected' : '' }}>
                                        {{ $agama->nama_agama }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" selected disabled>Pilih Agama</option>
                                @foreach ($agamas as $agama)
                                    <option value={{ $agama->id }}>{{ $agama->nama_agama }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select class="form-control" name="id_pendidikan" required>
                            @if ($wargaSession)
                                @foreach ($pendidikans as $pendidikan)
                                    <option value={{ $pendidikan->id }}
                                        {{ $wargaSession['id_pendidikan'] == $pendidikan->id ? 'selected' : '' }}>
                                        {{ $pendidikan->nama_pendidikan }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                @foreach ($pendidikans as $pendidikan)
                                    <option value={{ $pendidikan->id }}>{{ $pendidikan->nama_pendidikan }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="id_status_perkawinan">Status Perkawinan</label>
                        <select class="form-control" aria-label="Default select example" name="id_status_perkawinan"
                            required>
                            @if ($wargaSession)
                                @foreach ($perkawinan as $kawin)
                                    <option value={{ $kawin->id }}
                                        {{ $wargaSession['id_status_perkawinan'] == $kawin->id ? 'selected' : '' }}>
                                        {{ $kawin->nama_status_kawin }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" selected disabled>Pilih Status Perkawinan</option>
                                @foreach ($perkawinan as $kawin)
                                    <option value={{ $kawin->id }}>{{ $kawin->nama_status_kawin }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_keluarga">Status Dalam Keluarga</label>
                        <select class="form-control" aria-label="Default select example" name="status_keluarga" required>
                            @if ($wargaSession)
                                <option value="0" {{ $wargaSession['status_keluarga'] == '0' ? 'selected' : '' }}>
                                    Anggota Keluarga</option>
                                <option value="1" {{ $wargaSession['status_keluarga'] == '1' ? 'selected' : '' }}>
                                    Kepala Keluarga</option>
                            @else
                                <option value="" selected disabled>Pilih Status Dalam Keluarga</option>
                                <option value="0">Anggota Keluarga</option>
                                <option value="1">Kepala Keluarga</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select class="form-control" aria-label="Default select example" name="id_pekerjaan" required>
                            @if ($wargaSession)
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value={{ $pekerjaan->id }}
                                        {{ $wargaSession['id_pekerjaan'] == $pekerjaan->id ? 'selected' : '' }}>
                                        {{ $pekerjaan->nama_pekerjaan }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" disabled selected>Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value={{ $pekerjaan->id }}>{{ $pekerjaan->nama_pekerjaan }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="form-group">
                            <label for="jabatan">Jabatan (Struktur PKK)</label>
                            <select id="jabatan" name="jabatan" class="form-control" required>
                                <option value="" disabled {{ !$wargaSession ? 'selected' : '' }}>Pilih Jabatan
                                </option>
                                <option value="Anggota"
                                    {{ $wargaSession && $wargaSession['jabatan'] == 'Anggota' ? 'selected' : '' }}>Anggota
                                </option>
                                <option value="Bukan Anggota"
                                    {{ $wargaSession && $wargaSession['jabatan'] == 'Bukan Anggota' ? 'selected' : '' }}>
                                    Bukan
                                    Anggota</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateWargaForm() {
            var nik = document.getElementById('nik');
            var nkk = document.getElementById('nkk');
            var nama = document.querySelector('input[name="nama"]');
            var jenisKelamin = document.querySelector('select[name="jenis_kelamin"]');
            var tempatLahir = document.querySelector('input[name="tempat_lahir"]');
            var tanggalLahir = document.querySelector('input[name="tanggal_lahir"]');
            var agama = document.querySelector('select[name="id_agama"]');
            var pendidikan = document.querySelector('select[name="id_pendidikan"]');
            var statusPerkawinan = document.querySelector('select[name="id_status_perkawinan"]');
            var statusKeluarga = document.querySelector('select[name="status_keluarga"]');
            var pekerjaan = document.querySelector('select[name="id_pekerjaan"]');

            // NIK validation
            if (nik.value.length !== 16 || !/^\d+$/.test(nik.value)) {
                alert('NIK harus terdiri dari 16 digit angka');
                nik.focus();
                return false;
            }

            if (nik.value === nkk.value) {
                alert('NIK dan NKK tidak boleh sama');
                nik.focus();
                return false;
            }

            // NKK validation
            if (nkk.value.length !== 16 || !/^\d+$/.test(nkk.value)) {
                alert('NKK harus terdiri dari 16 digit angka');
                nkk.focus();
                return false;
            }

            // Nama validation
            if (nama.value.trim() === '') {
                alert('Nama tidak boleh kosong');
                nama.focus();
                return false;
            }

            // Jenis Kelamin validation
            if (jenisKelamin.value === '') {
                alert('Pilih Jenis Kelamin');
                jenisKelamin.focus();
                return false;
            }

            // Tempat Lahir validation
            if (tempatLahir.value.trim() === '') {
                alert('Tempat Lahir tidak boleh kosong');
                tempatLahir.focus();
                return false;
            }

            // Tanggal Lahir validation
            if (tanggalLahir.value === '') {
                alert('Pilih Tanggal Lahir');
                tanggalLahir.focus();
                return false;
            }

            // Agama validation
            if (agama.value === '') {
                alert('Pilih Agama');
                agama.focus();
                return false;
            }

            // Pendidikan validation
            if (pendidikan.value === '') {
                alert('Pilih Pendidikan');
                pendidikan.focus();
                return false;
            }

            // Status Perkawinan validation
            if (statusPerkawinan.value === '') {
                alert('Pilih Status Perkawinan');
                statusPerkawinan.focus();
                return false;
            }

            // Status Keluarga validation
            if (statusKeluarga.value === '') {
                alert('Pilih Status Dalam Keluarga');
                statusKeluarga.focus();
                return false;
            }

            // Pekerjaan validation
            if (pekerjaan.value === '') {
                alert('Pilih Pekerjaan');
                pekerjaan.focus();
                return false;
            }

            return true;
        }

        document.getElementById('nik').addEventListener('input', checkNikNkk);
        document.getElementById('nkk').addEventListener('input', checkNikNkk);

        function checkNikNkk() {
            var nik = document.getElementById('nik');
            var nkk = document.getElementById('nkk');

            if (nik.value === nkk.value && nik.value !== '') {
                nik.setCustomValidity('NIK dan NKK tidak boleh sama');
                nkk.setCustomValidity('NIK dan NKK tidak boleh sama');
            } else {
                nik.setCustomValidity('');
                nkk.setCustomValidity('');
            }
        }
    </script>
@endsection


{{-- <div class="modal fade" id="createWargaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('wargas.store') }}" method="POST">
@csrf
<div class="form-group">
    <label for="no_registrasi">No Registrasi</label>
    <input type="text" name="no_registrasi" class="form-control" required>
</div>
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="nama" class="form-control" required>
</div>
<div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" name="nik" class="form-control" required>
</div>
<div class="form-group">
    <label for="nkk">NKK</label>
    <input type="text" name="nkk" class="form-control" required>
</div>
<div class="form-group">
    <label for="jabatan">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" required>
</div>
<div class="grid grid-cols-2 gap-4">
    <div class="form-group">
        <label for="agama">Agama</label>
        <select class="form-select" aria-label="Default select example" name="id_agama">
            <option selected>Pilih Agama</option>
            @foreach ($agamas as $agama)
            <option value={{ $agama->id }}>{{ $agama->nama_agama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
            <option selected>Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-2 gap-4">
    <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <select class="form-select" aria-label="Default select example" name="id_pendidikan">
            <option selected>Pilih Pendidikan</option>
            @foreach ($pendidikans as $pendidikan)
            <option value={{ $pendidikan->id }}>{{ $pendidikan->nama_pendidikan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pekerjaan">Pekerjaan</label>
        <select class="form-select" aria-label="Default select example" name="id_pekerjaan">
            <option selected>Pilih Pekerjaan</option>
            @foreach ($pekerjaans as $pekerjaan)
            <option value={{ $pekerjaan->id }}>{{ $pekerjaan->nama_pekerjaan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="id_status_perkawinan">Status Perkawinan</label>
        <select class="form-select" aria-label="Default select example" name="id_status_perkawinan">
            <option selected>Pilih Status Perkawinan</option>
            @foreach ($perkawinan as $kawin)
            <option value={{ $kawin->id }}>{{ $kawin->nama_status_kawin }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status_keluarga">Status Di Keluarga</label>
        <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
            <option selected>Pilih Status Di Keluarga</option>
            <option value="0">Anggota Keluarga</option>
            <option value="1">Kepala Keluarga</option>
        </select>
    </div>
</div>
<div class="grid grid-cols-2 gap-4">
    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>
</div>

<div class="form-group">
    <label for="alamat_jalan">Alamat Jalan</label>
    <input type="text" name="alamat_jalan" class="form-control" required>
</div>

<div class="grid grid-cols-2 gap-4">
    <div class="form-group">
        <label for="rt">RT</label>
        <input type="text" name="rt" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="rw">RW</label>
        <input type="text" name="rw" class="form-control" required>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary">Tambah</button>
</div>
</form>
</div>
</div>
</div>
</div> --}}
