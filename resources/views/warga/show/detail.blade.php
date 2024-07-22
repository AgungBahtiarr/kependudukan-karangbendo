@extends('layouts.app')

@section('content')
    <div class="mt-8 mx-16">
        <h1 class="text-xl mb-7">Detail Data Warga</h1>

        <div class="bg-white rounded-lg pl-8 py-6">
            <div class="flex items-center  gap-4">
                <h2 class="text-2xl font-medium">{{ $warga->nama }}</h2>
                <div class="py-1 px-3 text-[#EA8C00] bg-[#fbe8cc] rounded-md">Anggota Keluarga</div>
            </div>

            <ul class="mt-6 text-lg">
                <li>Jenis Kelamin: {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
                <li>Nomor Induk Kependudukan: {{ $warga->nik }}</li>
                <li>Nomor Kartu Keluarga: {{ $warga->nkk }}</li>
            </ul>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 mt-8 gap-8">
            <div class="bg-white rounded-lg font-medium">
                <h2 class="border-black border-b pl-8 py-6">Informasi Personal</h2>

                <ul class="flex flex-col gap-7 pl-8 py-8">
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Tempat Lahir</div>
                        <div>{{ $warga->tempat_lahir }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Tanggal Lahir</div>
                        <div>{{ $warga->tanggal_lahir }}</div>
                    </li>

                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Agama</div>
                        <div>{{ $warga->agama->nama_agama }}</div>
                    </li>

                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Pendidikan</div>
                        <div>{{ $warga->pendidikan->nama_pendidikan }}</div>
                    </li>

                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Status Perkawinan</div>
                        <div>{{ $warga->statusPerkawinan->nama_status_kawin }}</div>
                    </li>

                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Pekerjaan</div>
                        <div>{{ $warga->pekerjaan->nama_pekerjaan }}</div>
                    </li>

                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Jabatan</div>
                        <div>{{ $warga->jabatan }}</div>
                    </li>
                </ul>
            </div>
            <div class="bg-white rounded-lg font-medium">
                <h2 class="border-black border-b pl-8 py-6">Alamat</h2>

                <ul class="flex flex-col gap-7 pl-8 py-8">
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Provinsi</div>
                        <div>{{ $warga->alamat_prov }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Kabupaten/Kota</div>
                        <div>{{ $warga->alamat_kab }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Kecamatan</div>
                        <div>{{ $warga->alamat_kec }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Desa/Kelurahan</div>
                        <div>{{ $warga->alamat_desakel }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">RW</div>
                        <div>{{ $warga->rw }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">RT</div>
                        <div>{{ $warga->rt }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Jalan</div>
                        <div>{{ $warga->alamat_jalan }}</div>
                    </li>
                </ul>
            </div>
        </div>


        <div class="bg-white rounded-lg font-medium my-8">
            <h2 class="border-black border-b pl-8 py-6">Keikutsertaan Kegiatan Dawis</h2>
            <div class="grid grid-cols-2">
                <ul class="flex flex-col gap-7 pl-8 py-8">
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Akseptor KB</div>
                        <div>{{ $dawis->akseptor_kb == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Jenis Akseptor KB</div>
                        <div>{{ $dawis->jenis_kb }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Aktif Dalam Kegiatan Posyandu</div>
                        <div>{{ $dawis->posyandu == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Frekuensi Posyandu</div>
                        <div>{{ $dawis->frekuensi_posyandu }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Mengikuti Program Bina Keluarga Balita</div>
                        <div>{{ $dawis->bina_keluarga_balita == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Memiliki Tabungan</div>
                        <div>{{ $dawis->memiliki_tabungan == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                </ul>

                <ul class="flex flex-col gap-7 pl-8 py-8">
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Mengikuti Kelompok Belajar</div>
                        <div>{{ $dawis->kelompok_belajar == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Jenis Kelompok Belajar</div>
                        <div>{{ $dawis->jenis_kelompok_belajar['nama_kelompok_belajar'] }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Mengikuti PAUD/Sejenis</div>
                        <div>{{ $dawis->paud == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Ikut dalam Kegiatan Koperasi</div>
                        <div>{{ $dawis->koperasi == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Jenis Koperasi</div>
                        <div>{{ $dawis->jenis_koperasi }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Berkebutuhan Khusus</div>
                        <div>{{ $dawis->berkebutuhan_khusus == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="bg-white rounded-lg font-medium my-8">
            <h2 class="border-black border-b pl-8 py-6">Kegiatan Yang Diikuti</h2>
            <div class="grid grid-cols-2">
                <ul class="flex flex-col gap-7 pl-8 py-8">
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Penghayatan dan Pengamatan Pancasila</div>
                        <div>{{ $dawis->penghayatan_pengamalan_pancasila == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Gotong Royong</div>
                        <div>{{ $dawis->gotong_royong == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Pendidikan Dan Keterampilan</div>
                        <div>{{ $dawis->pendidikan_keterampilan == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Kehidupan Berkolaborasi</div>
                        <div>{{ $dawis->kehidupan_berkolaborasi == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                </ul>

                <ul class="flex flex-col gap-7 pl-8 py-8">
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Pangan</div>
                        <div>{{ $dawis->pangan == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Sandang</div>
                        <div>{{ $dawis->sandang == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Kegiatan Kesehatan</div>
                        <div>{{ $dawis->kegiatan_kesehatan == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                    <li class="flex flex-col gap-3">
                        <div class="font-medium text-[#ADADAD]">Perencanaan Kesehatan</div>
                        <div>{{ $dawis->perencanaan_kesehatan == '1' ? 'Iya' : 'Tidak' }}</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
