@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Edit Data Warga</h1>


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

                <li class="flex items-center">
                    <span class="me-2">3</span>
                    Dawis
                </li>
            </ol>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('wargas.update1') }}" method="POST">
                @method('patch')
                @csrf
                <input type="hidden" name="id" value={{ $warga->id }}>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" minlength="16" maxlength="16" name="nik" id="nik"
                            class="form-control" required value="{{ $wargaSession ? $wargaSession['nik'] : $warga->nik }}"
                            pattern="\d{16}" title="NIK harus terdiri dari 16 digit angka" inputmode="numeric">
                    </div>
                    <div class="form-group">
                        <label for="nkk">NKK</label>
                        <input type="text" minlength="16" maxlength="16" name="nkk" id="nkk"
                            class="form-control" required value="{{ $wargaSession ? $wargaSession['nkk'] : $warga->nkk }}"
                            pattern="\d{16}" title="NKK harus terdiri dari 16 digit angka" inputmode="numeric">
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const nikInput = document.getElementById('nik');
                        const nkkInput = document.getElementById('nkk');

                        function allowOnlyNumbers(input) {
                            input.addEventListener('keypress', function(e) {
                                if (e.key < '0' || e.key > '9') {
                                    e.preventDefault();
                                }
                            });

                            input.addEventListener('paste', function(e) {
                                e.preventDefault();
                                const pastedData = e.clipboardData.getData('text');
                                const numbersOnly = pastedData.replace(/[^0-9]/g, '');
                                document.execCommand('insertText', false, numbersOnly.slice(0, 16));
                            });
                        }

                        function validateInput(input) {
                            if (input.value.length !== 16) {
                                input.setCustomValidity(`${input.name.toUpperCase()} harus terdiri dari 16 digit`);
                            } else {
                                input.setCustomValidity('');
                            }
                        }

                        function checkNikNkk() {
                            if (nikInput.value === nkkInput.value && nikInput.value !== '') {
                                nkkInput.setCustomValidity('NIK dan NKK tidak boleh sama');
                            } else {
                                nkkInput.setCustomValidity('');
                            }
                        }

                        [nikInput, nkkInput].forEach(input => {
                            allowOnlyNumbers(input);

                            input.addEventListener('input', function() {
                                validateInput(this);
                                checkNikNkk();
                            });
                        });

                        // Validasi form sebelum submit
                        document.querySelector('form').addEventListener('submit', function(e) {
                            validateInput(nikInput);
                            validateInput(nkkInput);
                            checkNikNkk();

                            if (!nikInput.validity.valid || !nkkInput.validity.valid) {
                                e.preventDefault();
                                alert('Mohon periksa kembali input NIK dan NKK');
                            }
                        });
                    });
                </script>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required
                            value="{{ $wargaSession ? $wargaSession['nama'] : $warga->nama }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" required>
                            @if ($wargaSession)
                                {{-- <option value={{$wargaSession['jenis_kelamin']}}></option> --}}
                                <option value="L" {{ $wargaSession['jenis_kelamin'] == 'L' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="P" {{ $wargaSession['jenis_kelamin'] == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            @elseif ($warga->jenis_kelamin != null)
                                <option value="L" {{ $warga->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P" {{ $warga->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            @else
                                <option value="" selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required
                            value="{{ $wargaSession ? $wargaSession['tempat_lahir'] : $warga->tempat_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['tanggal_lahir'] : $warga->tanggal_lahir }}>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
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
                            @elseif ($warga->id_agama != null)
                                @foreach ($agamas as $agama)
                                    <option value={{ $agama->id }}
                                        {{ $warga->id_agama == $agama->id ? 'selected' : '' }}>{{ $agama->nama_agama }}
                                    </option>
                                @endforeach
                            @else
                                <option value="" selected>Pilih Agama</option>
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
                            @elseif ($warga->id_pendidikan)
                                @foreach ($pendidikans as $pendidikan)
                                    <option value={{ $pendidikan->id }}
                                        {{ $warga->id_pendidikan == $pendidikan->id ? 'selected' : '' }}>
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


                <div class="grid grid-cols-2 gap-4">
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
                            @elseif ($warga->id_status_perkawinan)
                                @foreach ($perkawinan as $kawin)
                                    <option value={{ $kawin->id }}
                                        {{ $warga->id_status_perkawinan == $kawin->id ? 'selected' : '' }}>
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
                            @elseif ($warga)
                                <option value="0" {{ $warga->status_keluarga == '0' ? 'selected' : '' }}>Anggota
                                    Keluarga</option>
                                <option value="1" {{ $warga->status_keluarga == '1' ? 'selected' : '' }}>Kepala
                                    Keluarga</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
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
                            @elseif ($warga->id_pekerjaan)
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value={{ $pekerjaan->id }}
                                        {{ $warga->id_pekerjaan == $pekerjaan->id ? 'selected' : '' }}>
                                        {{ $pekerjaan->nama_pekerjaan }}
                                    </option>
                                @endforeach
                            @else
                                <option selected value="" disabled>Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value={{ $pekerjaan->id }}>{{ $pekerjaan->nama_pekerjaan }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="jabatan">Jabatan (Struktur PKK)</label>
                        <select id="jabatan" name="jabatan" class="form-control" required>
                            <option value="" disabled {{ !$wargaSession && !$warga->jabatan ? 'selected' : '' }}>
                                Pilih Jabatan
                            </option>
                            <option value="Anggota"
                                {{ ($wargaSession && $wargaSession['jabatan'] == 'Anggota') || (!$wargaSession && $warga->jabatan == 'Anggota')
                                    ? 'selected'
                                    : '' }}>
                                Anggota
                            </option>
                            <option value="Pengurus"
                                {{ ($wargaSession && $wargaSession['jabatan'] == 'Pengurus') ||
                                (!$wargaSession && $warga->jabatan == 'Pengurus')
                                    ? 'selected'
                                    : '' }}>
                                Pengurus
                            </option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>

            <script>
                function validateForm() {
                    var nik = document.getElementsByName('nik')[0];
                    var nkk = document.getElementsByName('nkk')[0];
                    var nama = document.getElementsByName('nama')[0];
                    var jenisKelamin = document.getElementsByName('jenis_kelamin')[0];
                    var tempatLahir = document.getElementsByName('tempat_lahir')[0];
                    var tanggalLahir = document.getElementsByName('tanggal_lahir')[0];
                    var agama = document.getElementsByName('id_agama')[0];
                    var pendidikan = document.getElementsByName('id_pendidikan')[0];
                    var statusPerkawinan = document.getElementsByName('id_status_perkawinan')[0];
                    var statusKeluarga = document.getElementsByName('status_keluarga')[0];
                    var pekerjaan = document.getElementsByName('id_pekerjaan')[0];

                    // Validasi NIK
                    if (nik.value.length !== 16 || !/^\d+$/.test(nik.value)) {
                        alert('NIK harus terdiri dari 16 digit angka');
                        nik.focus();
                        return false;
                    }

                    // Validasi NKK
                    if (nkk.value.length !== 16 || !/^\d+$/.test(nkk.value)) {
                        alert('NKK harus terdiri dari 16 digit angka');
                        nkk.focus();
                        return false;
                    }

                    // Validasi NIK dan NKK tidak boleh sama
                    if (nik.value === nkk.value) {
                        alert('NIK dan NKK tidak boleh sama');
                        nik.focus();
                        return false;
                    }

                    // Validasi Nama
                    if (nama.value.trim() === '') {
                        alert('Nama tidak boleh kosong');
                        nama.focus();
                        return false;
                    }

                    // Validasi Jenis Kelamin
                    if (jenisKelamin.value === '') {
                        alert('Pilih Jenis Kelamin');
                        jenisKelamin.focus();
                        return false;
                    }

                    // Validasi Tempat Lahir
                    if (tempatLahir.value.trim() === '') {
                        alert('Tempat Lahir tidak boleh kosong');
                        tempatLahir.focus();
                        return false;
                    }

                    // Validasi Tanggal Lahir
                    if (tanggalLahir.value === '') {
                        alert('Tanggal Lahir harus diisi');
                        tanggalLahir.focus();
                        return false;
                    }

                    // Validasi Agama
                    if (agama.value === '') {
                        alert('Pilih Agama');
                        agama.focus();
                        return false;
                    }

                    // Validasi Pendidikan
                    if (pendidikan.value === '') {
                        alert('Pilih Pendidikan');
                        pendidikan.focus();
                        return false;
                    }

                    // Validasi Status Perkawinan
                    if (statusPerkawinan.value === '') {
                        alert('Pilih Status Perkawinan');
                        statusPerkawinan.focus();
                        return false;
                    }

                    // Validasi Status Keluarga
                    if (statusKeluarga.value === '') {
                        alert('Pilih Status Dalam Keluarga');
                        statusKeluarga.focus();
                        return false;
                    }

                    // Validasi Pekerjaan (jika diperlukan)
                    if (pekerjaan.value === '') {
                        alert('Pilih Pekerjaan');
                        pekerjaan.focus();
                        return false;
                    }

                    return true;
                }

                // Tambahkan event listener untuk input NIK dan NKK
                document.getElementsByName('nik')[0].addEventListener('input', checkNikNkk);
                document.getElementsByName('nkk')[0].addEventListener('input', checkNikNkk);

                function checkNikNkk() {
                    var nik = document.getElementsByName('nik')[0];
                    var nkk = document.getElementsByName('nkk')[0];

                    if (nik.value === nkk.value && nik.value !== '') {
                        nik.setCustomValidity('NIK dan NKK tidak boleh sama');
                        nkk.setCustomValidity('NIK dan NKK tidak boleh sama');
                    } else {
                        nik.setCustomValidity('');
                        nkk.setCustomValidity('');
                    }
                }
            </script>
        </div>
    </div>
@endsection
