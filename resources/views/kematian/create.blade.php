@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Kematian</h1>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{route("kematian.store")}}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" inputmode="numeric" minlength="16" maxlength="16" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nik_pelapor">NIK Pelapor</label>
                        <input type="text" inputmode="numeric" name="nik_pelapor" inputmode="numeric" minlength="16" maxlength="16" class="form-control" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="waktu_kematian">Waktu Kematian</label>
                        <input type="datetime-local" name="waktu_kematian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pemakaman">Tanggal Pemakaman</label>
                        <input type="date" name="tanggal_pemakaman" class="form-control" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="tempat_meninggal">Tempat Meninggal</label>
                        <input type="text" name="tempat_meninggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak_keluarga">Kontak Keluarga</label>
                        <input type="text" name="kontak_keluarga" class="form-control" required>
                    </div>
                </div>

                    <div class="form-group">
                        <label for="sebab_kematian">Sebab Kematian</label>
                        <input type="text" name="sebab_kematian" class="form-control" required>
                    </div>

                <div class="modal-footer">
                    <a href="/kematian" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
