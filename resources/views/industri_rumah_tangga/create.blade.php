@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Industri Rumah Tangga</h1>


        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('industries.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_carga" value={{$carga->id}}>

                <div class="form-group">
                    <label for="nkk">No Kartu Keluarga</label>
                    <input type="text" name="nkk" value={{$carga->nkk}} @readonly(true) class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" name="nama_usaha" class="form-control" required>
                </div>

                <div class="grid grid-cols-3 gap-4">

                    <div class="form-group">
                        <label for="bidang_sandang">Bidang Sandang</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bidang_sandang_ya" name="bidang_sandang" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="bidang_sandang_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bidang_sandang_tidak" name="bidang_sandang" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="bidang_sandang_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bidang_pangan">Bidang Pangan</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bidang_pangan_ya" name="bidang_pangan" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="bidang_pangan_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bidang_pangan_tidak" name="bidang_pangan" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="bidang_pangan_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="bidang_jasa">Bidang Jasa</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bidang_jasa_ya" name="bidang_jasa" value="1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="bidang_jasa_ya"> Ya </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bidang_jasa_tidak" name="bidang_jasa" value="0"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="bidang_jasa_tidak"> Tidak </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="/warga" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
