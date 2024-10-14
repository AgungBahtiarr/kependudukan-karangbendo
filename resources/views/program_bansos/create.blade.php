@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Program Bansos</h1>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('programbansos.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div class="form-group">
                        <label for="nama_program">Nama Program</label>
                        <input type="text" name="nama_program" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sumber_dana">Sumber Dana</label>
                        <input type="text" name="sumber_dana" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_bantuan">Jenis Bantuan</label>
                        <select class="form-control" name="jenis_bantuan" id="jenis_bantuan" required>
                            <option value="" selected disabled>Pilih Jenis Bantuan</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Non-Tunai">Non Tunai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail_bantuan">Detail Bantuan</label>
                        <input type="text" name="detail_bantuan" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="/program-bansos" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
