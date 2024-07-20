@extends('layouts.app')

@section('content')
    @if ($isPekarangan)
        <h1 class="ml-8 mt-8 mb-8">{{ $pekarangan->nkk }}</h1>

        <div class="grid grid-cols-1  mx-6">

            <div class="bg-white w-full rounded-lg">


                <div class="flex justify-between mx-5 my-4 items-center">
                    <h1>Pemanfaatan Tanah Pekarangan</h1>
                    <button hx-get={{ route('pekarangans.edit', $pekarangan->id) }} hx-swap="innerHtml" hx-target="#detail"
                        hx-trigger="click" class="py-1 px-6 border-2 border-[#05bbc9] rounded-full">Edit</button>
                </div>

                <div id="detail" class="content mx-5 mb-4">
                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Tanaman Keras</h2>
                        <span>{{ $pekarangan->tanaman_keras == '1' ? 'Ya' : 'Tidak' }}</span>
                    </div>

                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Toga</h2>
                        <span>{{ $pekarangan->toga == '1' ? 'Ya' : 'Tidak' }}</span>
                    </div>

                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Lumbung Hidup</h2>
                        <span>{{ $pekarangan->lumbung_hidup == '1' ? 'Ya' : 'Tidak' }}</span>
                    </div>

                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Warung Hidup</h2>
                        <span>{{ $pekarangan->warung_hidup == '1' ? 'Ya' : 'Tidak' }}</span>
                    </div>


                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Perikanan</h2>
                        <span>{{ $pekarangan->perikanan == '1' ? 'Ya' : 'Tidak' }}</span>
                    </div>


                    <div class="content-item mb-3">
                        <h2 class="text-[#ADADAD]">Peternakan</h2>
                        <span>{{ $pekarangan->peternakan == '1' ? 'Ya' : 'Tidak' }}</span>
                    </div>
                </div>


            </div>
        </div>

        <div class="flex justify-end mr-6 mt-5">
            <div>
                <a class="btn btn-secondary" href={{ route('cargas.show2', $id) }}>Kembali</a>
                <a class="btn btn-primary"
                    href="/industries/detail/{{ $id }}/{{ $pekarangan->nkk }}">Selanjutnya</a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 mx-6 h-[85vh]">
            <div class="bg-white w-full rounded-lg">
                <div class="flex flex-col items-center justify-center h-full">
                    <h1 class="text-xl font-medium">Tidak Ada Data Pekarangan</h1>
                    <div class="flex mt-3">
                        <div>
                            <a class="btn btn-secondary" href={{ route('cargas.show2', $id) }}>Kembali</a>
                            <a class="btn btn-primary"
                                href="/industries/detail/{{ $id }}/{{ $nkk }}">Selanjutnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
