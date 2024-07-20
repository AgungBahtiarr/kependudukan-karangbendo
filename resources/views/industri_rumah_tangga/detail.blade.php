@extends('layouts.app')


@section('content')
    @if ($isIndustri)
        <h1 class="ml-8 mt-8 mb-8">{{ $industri->nkk }}</h1>

        <div class="grid grid-cols-1  mx-6">
            <div class="bg-white w-full rounded-lg">
                <div class="flex justify-between mx-5 my-4 items-center">
                    <h1>Industri Rumah Tangga</h1>
                    <button hx-get="/industries/edit/{{ $industri->id }}" hx-swap="innerHtml" hx-target="#detail-3"
                        hx-trigger="click" class="py-1 px-6 border-2 border-[#05bbc9] rounded-full">Edit</button>
                </div>

                <div id="detail-3" class="content mx-5 mb-4">
                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Nama Usaha</h2>
                        <span>{{ $industri->nama_usaha }}</span>
                    </div>
                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Bidang Sandang</h2>
                        <span>{{ $industri->bidang_sandang == '1' ? 'Iya' : 'Tidak' }}</span>
                    </div>

                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Bidang Pangan</h2>
                        <span>{{ $industri->bidang_pangan == '1' ? 'Iya' : 'Tidak' }}</span>
                    </div>

                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Bidang Jasa</h2>
                        <span>{{ $industri->bidang_jasa == '1' ? 'Iya' : 'Tidak' }}</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="flex justify-end mr-6 mt-5">
            <div>
                <a class="btn btn-secondary" href="/pekarangans/detail/{{ $id }}/{{ $nkk }}">Kembali</a>
                <a class="btn btn-primary" href="/cargas/">Selanjutnya</a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 mx-6 h-[85vh]">
            <div class="bg-white w-full rounded-lg">
                <div class="flex flex-col items-center justify-center h-full">
                    <h1 class="text-xl font-medium">Tidak Ada Data Industri Rumah Tangga</h1>
                    <div class="flex mt-3">
                        <div>
                            <a class="btn btn-secondary" href="/pekarangans/detail/{{ $id }}/{{ $nkk }}">Kembali</a>
                            <a class="btn btn-primary" href="/cargas/">Selanjutnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
