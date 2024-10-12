@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Penerima Bansos</h1>
        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            @error('penerimaBansos')
                <div class="alert alert-danger" role="alert">
                    <div class="iq-alert-text">{{ $errors->first() }}</div>
                </div>
            @enderror
            <form action="{{ route('bansos.store') }}" method="POST">
                @csrf


                <div class="form-group">
                    <label for="nik">Nomer Induk Kependudukan</label>
                    <input type="text" minlength="16" maxlength="16" name="nik" class="form-control" required>
                </div>


                <div class="modal-footer">
                    <a href="/bansos" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
