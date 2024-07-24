@extends('layouts.app')


@section('title')
    {{$title}}
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
                    <input type="text" minlength="16" maxlength="16" name="nik" class="form-control" value={{$bansos->nik}} required>
                </div>


                <div class="form-group">
                    <label for="jenis_bantuan">Jenis Bantuan</label>
                    <input type="text" name="jenis_bantuan" class="form-control" value={{$bansos->jenis_bantuan}} required>
                </div>


                <div class="form-group">
                    <label for="periode_bulan">Periode Bulan</label>
                    <select class="form-control" name="periode_bulan">
                        @foreach ($months as $month)
                            <option {{$month == $bansos->periode_bulan ? 'selected' : ''}} value={{ $month }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="periode_tahun">Periode Tahun</label>
                    <input type="text" name="periode_tahun" class="form-control" value={{$bansos->periode_tahun}} required>
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" name="nominal" class="form-control" value="{{$bansos->nominal}}" required>
                </div>


                <div class="modal-footer">
                    <a href="/bansos" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
@endsection
