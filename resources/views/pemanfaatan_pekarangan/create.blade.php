@extends('layouts.app')

@section('content')
<div class="my-10 mx-12">
    <h1 class="text-2xl font-semibold">Tambah Data Pemanfaatan Pekarangan</h1>


    {{-- <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
            <a href="">Alamat</a>
        </div> --}}


    <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
        <form action="{{ route('pekarangans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_carga" value={{$carga->id}}>

            <div class="form-group">
                <label for="nkk">No Kartu Keluarga</label>
                <input type="number" min="16" max="16" name="nkk" value={{$carga->nkk}} @readonly(true) class="form-control" required>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div class="form-group">
                    <label for="tanaman_keras">Tanaman Keras</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="tanaman_keras_ya" name="tanaman_keras" value="1" class="custom-control-input" required>
                            <label class="custom-control-label" for="tanaman_keras_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="tanaman_keras_tidak" name="tanaman_keras" value="0" class="custom-control-input" required>
                            <label class="custom-control-label" for="tanaman_keras_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="toga">Toga</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="toga_ya" name="toga" value="1" class="custom-control-input" required>
                            <label class="custom-control-label" for="toga_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="toga_tidak" name="toga" value="0" class="custom-control-input" required>
                            <label class="custom-control-label" for="toga_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="lumbung_hidup">Lumbung Hidup</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="lumbung_hidup_ya" name="lumbung_hidup" value="1" class="custom-control-input" required>
                            <label class="custom-control-label" for="lumbung_hidup_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="lumbung_hidup_tidak" name="lumbung_hidup" value="0" class="custom-control-input" required>
                            <label class="custom-control-label" for="lumbung_hidup_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="warung_hidup">Warung Hidup</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="warung_hidup_ya" name="warung_hidup" value="1" class="custom-control-input" required>
                            <label class="custom-control-label" for="warung_hidup_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="warung_hidup_tidak" name="warung_hidup" value="0" class="custom-control-input" required>
                            <label class="custom-control-label" for="warung_hidup_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="perikanan">Perikanan</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="perikanan_ya" name="perikanan" value="1" class="custom-control-input" required>
                            <label class="custom-control-label" for="perikanan_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="perikanan_tidak" name="perikanan" value="0" class="custom-control-input" required>
                            <label class="custom-control-label" for="perikanan_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="peternakanan">Peternakanan</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="peternakanan_ya" name="peternakanan" value="1" class="custom-control-input" required>
                            <label class="custom-control-label" for="peternakanan_ya"> Ya </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="peternakanan_tidak" name="peternakanan" value="0" class="custom-control-input" required>
                            <label class="custom-control-label" for="peternakanan_tidak"> Tidak </label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <a href="/cargas" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-primary">Selanjutnya</a>
            </div>
        </form>
    </div>
</div>
@endsection