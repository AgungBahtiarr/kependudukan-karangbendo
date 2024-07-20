@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Catatan Rumah Tangga</h1>


        {{-- <div class="my-4   w-72 flex justify-around items-center">
            <a href="" class="bg-[#cfdfe3] py-3 px-2 rounded-sm">Informasi Umum</a>
            <a href="">Alamat</a>
        </div> --}}



        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('cargas.store3') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="jumlah_balita">Jumlah Balita</label>
                        <input type="number" name="jumlah_balita" class="form-control" required
                            value={{ $cargasSession ? $cargasSession['jumlah_balita'] : '' }}>
                    </div>


                    <div class="form-group">
                        <label for="jumlah_pus">Jumlah Pria Usaha Sosial</label>
                        <input type="number" name="jumlah_pus" class="form-control"  required value={{ $cargasSession ? $cargasSession['jumlah_pus'] : '' }} >
                    </div>

                    <div class="form-group">
                        <label for="jumlah_wus">Jumlah Wanita Usaha Sosial</label>
                        <input type="number" name="jumlah_wus" class="form-control" required value={{ $cargasSession ? $cargasSession['jumlah_wus'] : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_ibu_hamil">Jumlah Ibu Hamil</label>
                        <input type="number" name="jumlah_ibu_hamil" class="form-control" required value={{ $cargasSession ? $cargasSession['jumlah_ibu_hamil'] : '' }}>
                    </div>


                    <div class="form-group">
                        <label for="jumlah_ibuta">Jumlah Ibu Rumah Tangga</label>
                        <input type="number" name="jumlah_ibuta" class="form-control" required value={{ $cargasSession ? $cargasSession['jumlah_ibuta'] : '' }}>
                    </div>


                    <div class="form-group">
                        <label for="jumlah_ibu_menyusui">Jumlah Ibu Menyusui</label>
                        <input type="number" name="jumlah_ibu_menyusui" class="form-control" required value={{ $cargasSession ? $cargasSession['jumlah_ibu_menyusui'] : '' }}>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah_lansia">Jumlah Lansia</label>
                    <input type="number" name="jumlah_lansia" class="form-control" required value={{ $cargasSession ? $cargasSession['jumlah_lansia'] : '' }}>
                </div>

                <div class="modal-footer">
                    <a hx-post={{ route('cargas.back2') }} hx-trigger="click" type="button"
                        class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Selanjutnya</a>
                </div>
            </form>
        </div>
    </div>
@endsection
