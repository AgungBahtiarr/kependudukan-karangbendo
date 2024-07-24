@extends('layouts.app')

@section('content')
<div class="my-10 mx-12">
    <h1 class="text-2xl font-semibold">Tambah Data Warga</h1>


    <div class="my-4 w-96 flex justify-around items-center">
        <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
        <a href="">Alamat</a>
    </div>

    <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
        <form action="{{ route('wargas.store1') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="no_registrasi">No Registrasi</label>
                <input type="number" name="no_registrasi" class="form-control" required value={{ $wargaSession ? $wargaSession['no_registrasi'] : '' }}>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" minlength="16" maxlength="16" name="nik" class="form-control" required value={{ $wargaSession ? $wargaSession['nik'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="nkk">NKK</label>
                    <input type="text" minlength="16" maxlength="16" name="nkk" class="form-control" required value={{ $wargaSession ? $wargaSession['nkk'] : '' }}>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="nama" class="form-control" required value={{ $wargaSession ? $wargaSession['nama'] : '' }}>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        @if ($wargaSession)
                        {{-- <option value={{$wargaSession['jenis_kelamin']}}></option> --}}
                        <option value="L" {{ $wargaSession['jenis_kelamin'] == 'L' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="P" {{ $wargaSession['jenis_kelamin'] == 'P' ? 'selected' : '' }}>
                            Perempuan</option>
                        @else
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" required value={{ $wargaSession ? $wargaSession['tempat_lahir'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" placeholder="dd-mm-yyyy" name="tanggal_lahir" class="form-control" required value={{ $wargaSession ? $wargaSession['tanggal_lahir'] : '' }}>
                </div>
            </div>


            <div class="grid grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" aria-label="Default select example" name="id_agama">
                        @if ($wargaSession)
                        @foreach ($agamas as $agama)
                        <option value={{ $agama->id }} {{ $wargaSession['id_agama'] == $agama->id ? 'selected' : '' }}>
                            {{ $agama->nama_agama }}
                        </option>
                        @endforeach
                        @else
                        <option selected>Pilih Agama</option>
                        @foreach ($agamas as $agama)
                        <option value={{ $agama->id }}>{{ $agama->nama_agama }}</option>
                        @endforeach
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <select class="form-control" name="id_pendidikan">
                        @if ($wargaSession)
                        @foreach ($pendidikans as $pendidikan)
                        <option value={{ $pendidikan->id }} {{ $wargaSession['id_pendidikan'] == $pendidikan->id ? 'selected' : '' }}>
                            {{ $pendidikan->nama_pendidikan }}
                        </option>
                        @endforeach
                        @else
                        <option selected>Pilih Pendidikan</option>
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
                    <select class="form-control" aria-label="Default select example" name="id_status_perkawinan" required>
                        @if ($wargaSession)
                        @foreach ($perkawinan as $kawin)
                        <option value={{ $kawin->id }} {{ $wargaSession['id_status_perkawinan'] == $kawin->id ? 'selected' : '' }}>
                            {{ $kawin->nama_status_kawin }}
                        </option>
                        @endforeach
                        @else
                        <option selected>Pilih Status Perkawinan</option>
                        @foreach ($perkawinan as $kawin)
                        <option value={{ $kawin->id }}>{{ $kawin->nama_status_kawin }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_keluarga">Status Dalam Keluarga</label>
                    <select class="form-control" aria-label="Default select example" name="status_keluarga">
                        @if ($wargaSession)
                        <option value="0" {{ $wargaSession['status_keluarga'] == '0' ? 'selected' : '' }}>
                            Anggota Keluarga</option>
                        <option value="1" {{ $wargaSession['status_keluarga'] == '1' ? 'selected' : '' }}>
                            Kepala Keluarga</option>
                        @else
                        <option selected>Pilih Status Dalam Keluarga</option>
                        <option value="0">Anggota Keluarga</option>
                        <option value="1">Kepala Keluarga</option>
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
                        <option value={{ $pekerjaan->id }} {{ $wargaSession['status_keluarga'] == $pekerjaan->id ? 'selected' : '' }}>
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
                    <input type="text" name="jabatan" class="form-control" value={{ $wargaSession ? $wargaSession['jabatan'] : '' }}>
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
