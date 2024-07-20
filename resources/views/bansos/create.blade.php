@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Bansos1</h1>


        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('bansos.store') }}" method="POST">
                @csrf


                <div class="form-group">
                    <label for="nik">Nomer Induk Kependudukan</label>
                    <input type="text" name="nik" class="form-control" required>
                </div>


                <div class="form-group">
                    <label for="jenis_bantuan">Jenis Bantuan</label>
                    <input type="text" name="jenis_bantuan" class="form-control" required>
                </div>


                <div class="form-group">
                    <label for="periode_bulan">Periode Bulan</label>
                    <select class="form-control" name="periode_bulan">
                        <option selected>Pilih Periode Bulan </option>
                        @foreach ($months as $month)
                            <option value={{ $month }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="periode_tahun">Periode Tahun</label>
                    <input type="text" name="periode_tahun" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" name="nominal" class="form-control" required>
                </div>


                <div class="modal-footer">
                    <a href="/bansos" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
