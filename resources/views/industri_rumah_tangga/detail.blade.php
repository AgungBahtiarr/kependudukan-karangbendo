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

                <div id="detail-3" class="mx-5 mb-4">

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-gray-600 font-semibold">Nama Usaha</h3>
                            <p class="mt-1">{{ $industri->nama_usaha }}</p>
                        </div>

                        @foreach (['sandang', 'pangan', 'jasa'] as $bidang)
                            <div>
                                <h3 class="text-gray-600 font-semibold">Bidang {{ ucfirst($bidang) }}</h3>
                                <p class="mt-1">
                                    {{ $industri->{"bidang_$bidang"} == '1' ? 'Ya' : 'Tidak' }}
                                </p>
                                @if ($industri->{"bidang_$bidang"} == '1')
                                    <div class="mt-2 ml-4">
                                        <h4 class="text-gray-600">Keterangan {{ ucfirst($bidang) }}:</h4>
                                        <p class="mt-1">
                                            {{ $industri->{"keterangan_$bidang"} ?: 'Tidak ada keterangan' }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mr-6 mt-5">
            <div>
                <a class="btn btn-secondary" href="/pekarangans/detail/{{ $id }}/{{ $nkk }}">Kembali</a>
                <a class="btn btn-primary" href="/cargas/">Selesai</a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 mx-6 h-[85vh]">
            <div class="bg-white w-full rounded-lg">
                <div class="flex flex-col items-center justify-center h-full">
                    <h1 class="text-xl font-medium">Tidak Ada Data Industri Rumah Tangga</h1>
                    <div class="flex mt-3">
                        <div>
                            <a class="btn btn-secondary"
                                href="/pekarangans/detail/{{ $id }}/{{ $nkk }}">Kembali</a>
                            <a class="btn btn-primary" href="/cargas/">Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // MutationObserver untuk mendeteksi perubahan DOM
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'childList') {
                        const addedNodes = mutation.addedNodes;
                        for (let i = 0; i < addedNodes.length; i++) {
                            const node = addedNodes[i];
                            if (node.nodeType === Node.ELEMENT_NODE) {
                                if (node.querySelector('#bidang_sandang_ya')) {
                                    initBidangSandang();
                                }
                                if (node.querySelector('#bidang_pangan_ya')) {
                                    initBidangPangan();
                                }
                                if (node.querySelector('#bidang_jasa_ya')) {
                                    initBidangJasa();
                                }
                            }
                        }
                    }
                });
            });

            // Mulai observasi
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });

        function initBidangSandang() {
            const bidangSandangYa = document.getElementById('bidang_sandang_ya');
            const bidangSandangTidak = document.getElementById('bidang_sandang_tidak');
            const bidangSandangKeterangan = document.getElementById('bidang_sandang_keterangan');
            const keteranganInput = document.getElementById('keterangan_bidang_sandang');

            function toggleBidangSandangKeterangan() {
                if (bidangSandangYa.checked) {
                    bidangSandangKeterangan.style.display = 'block';
                    keteranganInput.required = true;
                } else {
                    bidangSandangKeterangan.style.display = 'none';
                    keteranganInput.required = false;
                }
            }

            bidangSandangYa.addEventListener('change', toggleBidangSandangKeterangan);
            bidangSandangTidak.addEventListener('change', toggleBidangSandangKeterangan);

            toggleBidangSandangKeterangan();
        }

        function initBidangPangan() {
            const bidangPanganYa = document.getElementById('bidang_pangan_ya');
            const bidangPanganTidak = document.getElementById('bidang_pangan_tidak');
            const bidangPanganKeterangan = document.getElementById('bidang_pangan_keterangan');
            const keteranganInput = document.getElementById('keterangan_bidang_pangan');

            function toggleBidangPanganKeterangan() {
                if (bidangPanganYa.checked) {
                    bidangPanganKeterangan.style.display = 'block';
                    keteranganInput.required = true;
                } else {
                    bidangPanganKeterangan.style.display = 'none';
                    keteranganInput.required = false;
                }
            }

            bidangPanganYa.addEventListener('change', toggleBidangPanganKeterangan);
            bidangPanganTidak.addEventListener('change', toggleBidangPanganKeterangan);

            toggleBidangPanganKeterangan();
        }

        function initBidangJasa() {
            const bidangJasaYa = document.getElementById('bidang_jasa_ya');
            const bidangJasaTidak = document.getElementById('bidang_jasa_tidak');
            const bidangJasaKeterangan = document.getElementById('bidang_jasa_keterangan');
            const keteranganInput = document.getElementById('keterangan_bidang_jasa');

            function toggleBidangJasaKeterangan() {
                if (bidangJasaYa.checked) {
                    bidangJasaKeterangan.style.display = 'block';
                    keteranganInput.required = true;
                } else {
                    bidangJasaKeterangan.style.display = 'none';
                    keteranganInput.required = false;
                }
            }

            bidangJasaYa.addEventListener('change', toggleBidangJasaKeterangan);
            bidangJasaTidak.addEventListener('change', toggleBidangJasaKeterangan);

            toggleBidangJasaKeterangan();
        }
    </script>
@endsection
