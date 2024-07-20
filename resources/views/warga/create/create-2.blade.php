@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Warga</h1>



        <div class="my-4 w-96 flex justify-around items-center">
            <a href="">Informasi Umum</a>
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Alamat</a>
            <a href="">Catatan Dawis</a>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('wargas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="alamat_prov" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_prov'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="alamat_kab" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_kab'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="kabupaten">Kecamatan</label>
                    <input type="text" name="alamat_kec" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_kec'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="desa kel">Desa/Kelurahan</label>
                    <input type="text" name="alamat_desakel" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_desakel'] : '' }}>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="number" name="rt" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['rt'] : '' }}>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="number" name="rw" class="form-control" required
                            value={{ $wargaSession ? $wargaSession['rw'] : '' }}>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_jalan">Alamat Jalan</label>
                    <input type="text" name="alamat_jalan" class="form-control" required
                        value={{ $wargaSession ? $wargaSession['alamat_jalan'] : '' }}>
                </div>

                <div class="modal-footer">
                    <a hx-post={{ route('wargas.back') }} hx-trigger="click" type="button"
                        class="btn btn-secondary">Kembali</a>
                    {{-- <a href="/warga/create/1">back</a> --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
