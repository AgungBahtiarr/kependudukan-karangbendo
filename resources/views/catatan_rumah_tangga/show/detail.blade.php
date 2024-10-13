@extends('layouts.app')


@section('content')
    <h1 class="ml-8 mt-8 mb-8">{{ $carga->nkk }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-6">
        <div class="bg-white w-full rounded-lg">
            <div class="flex justify-between mx-5 my-4 items-center">
                <h1>Informasi Umum</h1>
                <button hx-get={{ route('cargas.edit1', $carga->id) }} hx-swap="innerHtml" hx-target="#detail-1"
                    hx-trigger="click" class="py-1 px-6 border-2 border-[#05bbc9] rounded-full">Edit</button>
            </div>

            <div id="detail-1" class="content mx-5 mb-4">
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Nomor KK</h2>
                    <span>{{ $carga->nkk }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Kriteria Rumah</h2>
                    <span>{{ $carga->kriteria_rumah == '1' ? 'Layak' : 'Tidak Layak' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jumlah Jamban Di Keluarga</h2>
                    <span>{{ $carga->jumlah_jamban_keluarga }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Sumber Air</h2>
                    <span>{{ $carga->sumber_air->nama_sumber_air }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Ketersediaan Tempat Sampah</h2>
                    <span>{{ $carga->ada_tempat_sampah == '1' ? 'Ada' : 'Tidak Ada' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Ketersediaan Saluran Pembuangan Limbah</h2>
                    <span>{{ $carga->ada_saluran_pembuangan_limbah == '1' ? 'Ada' : 'Tidak Ada' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Satu Rumah Satu KK</h2>
                    <span>{{ $carga->satu_rumah_satu_kk == '1' ? 'Iya' : 'Tidak' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Nomor KK Inang</h2>
                    <span>{{ $carga->nkk_inang }}</span>
                </div>
            </div>

        </div>
        <div class="bg-white w-full">
            <div class="flex justify-between mx-5 my-4 items-center">
                <h1>Informasi Lainnya</h1>
                <button hx-get={{ route('cargas.edit2', $carga->id) }} hx-swap="innerHtml" hx-target="#detail-2"
                    hx-trigger="click" class="py-1 px-6 border-2 border-[#05bbc9] rounded-full">Edit</button>
            </div>

            <div id="detail-2" class="content mx-5 mb-4">
                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Makanan Pokok</h2>
                    <span>{{ $carga->makanan_pokok->nama_makanan_pokok }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Stiker P4K</h2>
                    <span>{{ $carga->menempel_stiker_p4k == '1' ? 'Ada' : 'Tidak Ada' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Aktivitas UP2K</h2>
                    <span>{{ $carga->aktivitas_up2k == '1' ? 'Iya' : 'Tidak' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Jenis UP2K</h2>
                    <span>{{ $carga->jenis_up2k }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Usaha Kesehatan Lingkungan</h2>
                    <span>{{ $carga->usaha_kesehatan_lingkungan == '1' ? 'Ada' : 'Tidak Ada' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Pemanfaatan Pekarangan</h2>
                    <span>{{ $carga->pemanfaatan_pekarangan == '1' ? 'Iya' : 'Tidak' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Industri Rumah Tangga</h2>
                    <span>{{ $carga->industri_rumah_tangga == '1' ? 'Iya' : 'Tidak' }}</span>
                </div>

                <div class="content-item mb-3">
                    <h2 class="text-[#ADADAD]">Kerja Bakti</h2>
                    <span>{{ $carga->kerja_bakti == '1' ? 'Iya' : 'Tidak' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end mr-6 mt-5 mb-8">
        <div>
            <a href="/cargas" class="btn btn-secondary">Kembali</a>
            <a class="btn btn-primary" href="/cargas/show2/{{ $carga->id }}">Selanjutnya</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleNKKInang() {
                var satuKKTidak = document.getElementById('satu_kk_tidak');
                var nkkInangInput = document.querySelector('input[name="nkk_inang"]');
                var nkkInangContainer = nkkInangInput ? nkkInangInput.closest('.content-item') : null;

                if (satuKKTidak && nkkInangContainer) {
                    if (satuKKTidak.checked) {
                        nkkInangContainer.style.display = 'block';
                        nkkInangInput.required = true;
                    } else {
                        nkkInangContainer.style.display = 'none';
                        nkkInangInput.required = false;
                        nkkInangInput.value = '';
                    }
                }
            }

            // Fungsi untuk menambahkan event listeners
            function addEventListeners() {
                var satuKKYa = document.getElementById('satu_kk_ya');
                var satuKKTidak = document.getElementById('satu_kk_tidak');

                if (satuKKYa) satuKKYa.addEventListener('change', toggleNKKInang);
                if (satuKKTidak) satuKKTidak.addEventListener('change', toggleNKKInang);
            }

            // Inisialisasi
            addEventListeners();
            toggleNKKInang();

            // Jika menggunakan HTMX, tambahkan ini:
            document.body.addEventListener('htmx:afterSwap', function() {
                addEventListeners();
                toggleNKKInang();
            });
        });
    </script>
@endsection
