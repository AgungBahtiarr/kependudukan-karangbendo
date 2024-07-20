@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Detail Data Warga</h1>


        <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
            <a href="">Alamat</a>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="no_registrasi">No Registrasi</label>
                    <input type="text" name="no_registrasi" class="form-control" required @readonly(true)
                        value={{ $warga->no_registrasi }}>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control" @readonly(true) required
                            value="{{ $warga->nik }}">
                    </div>
                    <div class="form-group">
                        <label for="nkk">NKK</label>
                        <input type="text" name="nkk" class="form-control" @readonly(true) required
                            value="{{ $warga->nkk }}">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" @readonly(true) required
                            value="{{ $warga->nama }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" @readonly(true) name="jenis_kelamin">
                            <option selected>{{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value={{ $warga->tempat_lahir }} @readonly(true)
                            class="form-control" required value="">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required
                            value={{ $warga->tanggal_lahir }} @readonly(true)>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" aria-label="Default select example" @readonly(true) name="id_agama">
                            <option selected>{{ $warga->agama->nama_agama }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select class="form-control" name="id_pendidikan" @readonly(true)>
                            <option selected>{{ $warga->pendidikan->nama_pendidikan }}</option>
                        </select>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="id_status_perkawinan">Status Perkawinan</label>
                        <select class="form-control" aria-label="Default select example" @readonly(true) name="id_status_perkawinan">
                            <option selected>{{ $warga->statusPerkawinan->nama_status_kawin }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_keluarga">Status Dalam Keluarga</label>
                        <select class="form-control" aria-label="Default select example" name="status_keluarga"
                            @readonly(true)>
                            <option selected>{{ $warga->status_keluarga == '1' ? 'Kepala Keluarga' : 'Anggota Keluarga' }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <select class="form-control" aria-label="Default select example" name="id_pekerjaan"
                            @readonly(true)>
                            <option selected>{{ $warga->pekerjaan->nama_pekerjaan }}</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" required value={{ $warga->jabatan }}
                            @readonly(true)>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <a href="/warga/2/{{$warga->id}}" type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
