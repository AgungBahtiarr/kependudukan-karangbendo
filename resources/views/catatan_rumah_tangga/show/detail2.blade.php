@extends('layouts.app')


@section('content')
    <h1 class="ml-8 mt-8 mb-8">{{ $carga->nkk }}</h1>

    <div class="grid grid-cols-1  mx-6">
        <div class="bg-white w-full rounded-lg">
            <div class="flex justify-between mx-5 my-4 items-center">
                <h1>Jumlah Anggota Keluarga</h1>
                <button hx-get={{ route('cargas.edit3', $carga->id) }} hx-swap="innerHtml" hx-target="#detail-3"
                    hx-trigger="click" class="py-1 px-6 border-2 border-[#05bbc9] rounded-full">Edit</button>
            </div>

            <div id="detail-3" class="content mx-5 mb-4">
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Balita</h2>
                    <span>{{ $carga->jumlah_balita }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Pria Usaha Sosial</h2>
                    <span>{{ $carga->jumlah_pus }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Wanita Usaha Sosial</h2>
                    <span>{{ $carga->jumlah_wus }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Ibu Hamil</h2>
                    <span>{{ $carga->jumlah_ibu_hamil }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Ibu Menyusui</h2>
                    <span>{{ $carga->jumlah_ibu_menyusui }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Lansia</h2>
                    <span>{{ $carga->jumlah_lansia }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jumlah Buta Baca</h2>
                    <span>{{ $carga->jumlah_buta_baca }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jumlah Buta Tulis</h2>
                    <span>{{ $carga->jumlah_buta_tulis }}</span>
                </div>


                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jumlah Buta Hitung</h2>
                    <span>{{ $carga->jumlah_buta_hitung }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jumlah Berkebutuhan Khusus</h2>
                    <span>{{ $carga->jumlah_berkebutuhan_khusus }}</span>
                </div>

            </div>
        </div>
    </div>

    <div class="flex justify-end mr-6 mt-5 mb-8">
        <div>
            <a class="btn btn-secondary" href="/cargas/show/{{ $carga->id }}">Kembali</a>
            <a class="btn btn-primary" href="/pekarangans/detail/{{ $carga->id }}/{{ $carga->nkk }}">Selanjutnya</a>
        </div>
    </div>
@endsection
