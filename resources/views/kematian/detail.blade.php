@extends('layouts.app')


@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-6">
        <div class="bg-white w-full rounded-lg">
            <div class="flex justify-between mx-5 my-4 items-center">
                <h1>Biodata</h1>
            </div>

            <div id="detail-1" class="content mx-5 mb-4">
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">NIK</h2>
                    <span>{{ $kematian->nik }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Nama</h2>
                    <span>{{ $kematian->warga->nama }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Tanggal Lahir</h2>
                    <span>{{ $kematian->warga->tanggal_lahir }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jenis Kelamin</h2>
                    <span>{{ $kematian->warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Alamat</h2>
                    <p>{{ $kematian->warga->alamat_prov }}, {{ $kematian->warga->alamat_kab }},
                        {{ $kematian->warga->alamat_kec }}, {{ $kematian->warga->alamat_desakel }},
                    </p>
                    <p>{{ $kematian->warga->alamat_jalan }}, Rt: {{ $kematian->warga->rt }}, Rw:
                        {{ $kematian->warga->rw }}
                    </p>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Status Perkawinan</h2>
                    <span>{{ $kematian->warga->statusPerkawinan->nama_status_kawin }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white w-full rounded-lg">
            <div class="flex justify-between mx-5 my-4 items-center">
                <h1>Data Kematian</h1>
            </div>

            <div id="detail-1" class="content mx-5 mb-4">
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">NIK Pelapor</h2>
                    <span>{{ $kematian->nik_pelapor }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Waktu Kematian</h2>
                    <span>{{ $kematian->waktu_kematian }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Tempat Meninggal</h2>
                    <span>{{ $kematian->tempat_meninggal }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Tanggal Pemakaman</h2>
                    <span>{{ $kematian->tanggal_pemakaman }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Kontak Keluarga</h2>
                    <span>{{ $kematian->kontak_keluarga }}</span>
                </div>
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Sebab Kematian</h2>
                    <p>{{ $kematian->sebab_kematian }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection
