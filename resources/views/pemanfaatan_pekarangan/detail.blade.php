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

                <div id="detail" class="mx-5 mb-4 space-y-6">
                    @foreach (['tanaman_keras', 'toga', 'lumbung_hidup', 'warung_hidup', 'perikanan', 'peternakan'] as $category)
                        <div class="border-b border-gray-200 pb-4 last:border-b-0">
                            <div class="text-lg font-semibold text-gray-600 mb-2">
                                {{ ucwords(str_replace('_', ' ', $category)) }}
                            </div>
                            <div class="flex items-start">
                                <span class="w-16 text-gray-500">{{ $pekarangan->$category == '1' ? 'Ya' : 'Tidak' }}</span>
                                @if ($pekarangan->$category == '1')
                                    <div class="ml-4">
                                        <p class="text-sm text-gray-700">
                                            <span class="font-medium">Jenis:</span>
                                            {{ $pekarangan->{"jenis_$category"} }}
                                        </p>
                                        <p class="text-sm text-gray-700 mt-1">
                                            <span class="font-medium">Volume:</span>
                                            {{ $pekarangan->{"volume_$category"} }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // MutationObserver untuk mendeteksi perubahan DOM
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'childList') {
                        const addedNodes = mutation.addedNodes;
                        for (let i = 0; i < addedNodes.length; i++) {
                            const node = addedNodes[i];
                            if (node.nodeType === Node.ELEMENT_NODE && node.querySelector(
                                    '#tanaman_keras_ya')) {
                                // Jika elemen tanaman keras ditemukan, inisialisasi
                                if (typeof initTanamanKeras === 'function') {
                                    initTanamanKeras();
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
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // MutationObserver untuk mendeteksi perubahan DOM
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'childList') {
                        const addedNodes = mutation.addedNodes;
                        for (let i = 0; i < addedNodes.length; i++) {
                            const node = addedNodes[i];
                            if (node.nodeType === Node.ELEMENT_NODE && node.querySelector(
                                    '#toga_ya')) {
                                // Jika elemen toga ditemukan, inisialisasi
                                if (typeof initToga === 'function') {
                                    initToga();
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
    </script>

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
                                if (node.querySelector('#lumbung_hidup_ya')) {
                                    // Jika elemen lumbung hidup ditemukan, inisialisasi
                                    if (typeof initLumbungHidup === 'function') {
                                        initLumbungHidup();
                                    }
                                }
                                // Tambahkan pengecekan untuk elemen lain jika diperlukan
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
    </script>

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
                                if (node.querySelector('#warung_hidup_ya')) {
                                    // Jika elemen warung hidup ditemukan, inisialisasi
                                    if (typeof initWarungHidup === 'function') {
                                        initWarungHidup();
                                    }
                                }
                                // Tambahkan pengecekan untuk elemen lain jika diperlukan
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
    </script>

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
                                if (node.querySelector('#perikanan_ya')) {
                                    // Jika elemen perikanan ditemukan, inisialisasi
                                    if (typeof initPerikanan === 'function') {
                                        initPerikanan();
                                    }
                                }
                                // Tambahkan pengecekan untuk elemen lain jika diperlukan
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
    </script>

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
                                if (node.querySelector('#peternakan_ya')) {
                                    // Jika elemen peternakan ditemukan, inisialisasi
                                    if (typeof initPeternakan === 'function') {
                                        initPeternakan();
                                    }
                                }
                                // Tambahkan pengecekan untuk elemen lain jika diperlukan
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
    </script>
@endsection
