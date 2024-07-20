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
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="alamat_prov" class="form-control" @readonly(true) required
                        value={{ $warga->alamat_prov }}>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="alamat_kab" class="form-control" @readonly(true) required
                        value={{ $warga->alamat_kab }}>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kecamatan</label>
                    <input type="text" name="alamat_kec" class="form-control" @readonly(true) required
                        value={{ $warga->alamat_kec }}>
                </div>
                <div class="form-group">
                    <label for="desa kel">Desa/Kelurahan</label>
                    <input type="text" name="alamat_desakel" class="form-control" @readonly(true) required
                        value={{ $warga->alamat_desakel }}>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt" class="form-control" @readonly(true) required
                            value={{ $warga->rt }}>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" name="rw" class="form-control" @readonly(true) required
                            value={{ $warga->rw }}>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_jalan">Alamat Jalan</label>
                    <input type="text" name="alamat_jalan" class="form-control" @readonly(true) required
                        value={{ $warga->alamat_jalan }}>
                </div>

                <div class="modal-footer">
                    <a href="/warga/{{ $warga->id }}" type="button"
                        class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
