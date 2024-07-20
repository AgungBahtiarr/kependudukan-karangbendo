@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Edit Data Warga</h1>


        <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="">Informasi Umum</a>
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Alamat</a>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('wargas.update')}}" method="POST">
                @method('patch')

                @csrf
                <input type="hidden" name="id" value={{$warga->id}}>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="alamat_prov" class="form-control" required value={{ $wargaSession ? $wargaSession['alamat_prov'] : $warga->alamat_prov }} >
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="alamat_kab" class="form-control"  required value={{ $wargaSession ? $wargaSession['alamat_kab'] : $warga->alamat_kab}}  >
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kecamatan</label>
                    <input type="text" name="alamat_kec" class="form-control" required value={{ $wargaSession ? $wargaSession['alamat_kec'] : $warga->alamat_kec}}   >
                </div>
                <div class="form-group">
                    <label for="desa kel">Desa/Kelurahan</label>
                    <input type="text" name="alamat_desakel" class="form-control" required value={{ $wargaSession ? $wargaSession['alamat_desakel'] : $warga->alamat_desakel}}  >
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" class="form-control" required value={{ $wargaSession ? $wargaSession['rt'] : $warga->rt}} >
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" class="form-control" required value={{ $wargaSession ? $wargaSession['rw'] : $warga->rw}} >
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_jalan">Alamat Jalan</label>
                    <input type="text" name="alamat_jalan" class="form-control" required value={{ $wargaSession ? $wargaSession['alamat_jalan'] : $warga->alamat_jalan}} >
                </div>

                <div class="modal-footer">
                    <a hx-patch={{ route('wargas-edit.back') }} hx-trigger="click" type="button"
                        class="btn btn-secondary text-white">Kembali</a>
                    {{-- <a href="/warga/create/1">back</a> --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

