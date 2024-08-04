@extends('layouts.app')


@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Edit Data Bantuan Sosial</h1>


        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('bansos.update', $bansos->id) }}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group">
                    <label for="nik">Nomer Induk Kependudukan</label>
                    <input type="text" minlength="16" maxlength="16" name="nik" class="form-control"
                        value={{ $bansos->nik }} required>
                </div>

                <div class="form-group">
                    <label for="id_program_bansos">Program Bansos</label>
                    <select class="form-control" name="id_program_bansos" required>
                        {{-- <option selected>Pilih Program Bansos </option> --}}
                        @foreach ($programs as $program)
                            <option value={{ $program->id }} {{$bansos->program->id == $program->id ? "selected" : ""}}>{{ $program->nama_program }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                    <a href="/bansos" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
