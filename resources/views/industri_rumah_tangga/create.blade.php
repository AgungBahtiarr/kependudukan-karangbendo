@extends('layouts.app')

@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Industri Rumah Tangga</h1>

        <div class="my-4">
            <ol
                class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Catatan <span class="hidden sm:inline-flex sm:ms-2">Keluarga</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Jumlah <span class="hidden sm:inline-flex sm:ms-2">Anggota</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                    <span
                        class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Tanah <span class="hidden sm:inline-flex sm:ms-2">Pekarangan</span>
                    </span>
                </li>
                <li class="flex text-blue-600 dark:text-blue-500 items-center">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    Industri <span class="hidden sm:inline-flex sm:ms-2">Keluarga</span>
                </li>
            </ol>
        </div>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('industries.store') }}" method="POST" id="industriesForm">
                @csrf
                <input type="hidden" name="id_carga" value="{{ $carga->id }}">

                <div class="form-group">
                    <label for="nkk">No Kartu Keluarga</label>
                    <input type="text" name="nkk" value="{{ $carga->nkk }}" readonly class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" name="nama_usaha" class="form-control" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach (['sandang', 'pangan', 'jasa'] as $bidang)
                        <div class="flex flex-col">
                            <div class="form-group">
                                <label for="bidang_{{ $bidang }}">Bidang {{ ucfirst($bidang) }}</label>
                                <div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="bidang_{{ $bidang }}_ya"
                                            name="bidang_{{ $bidang }}" value="1" class="custom-control-input"
                                            required>
                                        <label class="custom-control-label" for="bidang_{{ $bidang }}_ya"> Ya </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="bidang_{{ $bidang }}_tidak"
                                            name="bidang_{{ $bidang }}" value="0" class="custom-control-input"
                                            required>
                                        <label class="custom-control-label" for="bidang_{{ $bidang }}_tidak"> Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="bidang_{{ $bidang }}_keterangan" style="display: none;">
                                <div class="form-group">
                                    <label for="keterangan_bidang_{{ $bidang }}">Keterangan Bidang
                                        {{ ucfirst($bidang) }}</label>
                                    <input type="text" id="keterangan_bidang_{{ $bidang }}"
                                        name="keterangan_{{ $bidang }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="modal-footer">
                    <a href="/cargas" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const bidangs = ['sandang', 'pangan', 'jasa'];

                    function setupBidangToggle(bidangName) {
                        const yaRadio = document.getElementById(`bidang_${bidangName}_ya`);
                        const tidakRadio = document.getElementById(`bidang_${bidangName}_tidak`);
                        const keteranganDiv = document.getElementById(`bidang_${bidangName}_keterangan`);
                        const keteranganInput = document.getElementById(`keterangan_bidang_${bidangName}`);

                        function toggleKeterangan() {
                            if (yaRadio.checked) {
                                keteranganDiv.style.display = 'block';
                                keteranganInput.required = true;
                            } else {
                                keteranganDiv.style.display = 'none';
                                keteranganInput.required = false;
                                keteranganInput.value = '';
                            }
                        }

                        yaRadio.addEventListener('change', toggleKeterangan);
                        tidakRadio.addEventListener('change', toggleKeterangan);

                        toggleKeterangan();
                    }

                    bidangs.forEach(setupBidangToggle);

                    document.getElementById('industriesForm').addEventListener('submit', function(e) {
                        let isValid = true;

                        bidangs.forEach(bidang => {
                            const yaRadio = document.getElementById(`bidang_${bidang}_ya`);
                            const keteranganInput = document.getElementById(`keterangan_bidang_${bidang}`);

                            if (yaRadio.checked && keteranganInput.value.trim() === '') {
                                alert(
                                    `Mohon isi keterangan untuk Bidang ${bidang.charAt(0).toUpperCase() + bidang.slice(1)}`);
                                isValid = false;
                            }
                        });

                        if (!isValid) {
                            e.preventDefault(); // Mencegah form disubmit jika tidak valid
                        }
                    });
                });
            </script>
        </div>
    </div>
@endsection
