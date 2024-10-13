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
                        <input type="text" minlength="16" maxlength="16" name="nik" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['nik'] : $warga->nik }}>
                    </div>
                    <div class="form-group">
                        <label for="nkk">NKK</label>
                        <input type="text" minlength="16" maxlength="16" name="nkk" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['nkk'] : $warga->nkk }}>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['nama'] : $warga->nama }}>
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
                            value={{ $wargaSession ? $wargaSession['tempat_lahir'] : $warga->tempat_lahir }}>
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
                                <option value="" selected>Pilih Pendidikan</option>
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
                                <option value="" selected>Pilih Status Perkawinan</option>
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
                        <select class="form-control" aria-label="Default select example" name="id_pekerjaan">
                            @if ($wargaSession)
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value={{ $pekerjaan->id }}
                                        {{ $wargaSession['status_keluarga'] == $pekerjaan->id ? 'selected' : '' }}>
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
                                <option selected>Pilih Pekerjaan</option>
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value={{ $pekerjaan->id }}>{{ $pekerjaan->nama_pekerjaan }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control"
                            value={{ $wargaSession ? $wargaSession['jabatan'] : $warga->jabatan }}>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
