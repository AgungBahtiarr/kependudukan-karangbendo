@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Data Kematian</h1>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('kematian.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" inputmode="numeric" pattern="\d{16}"
                            title="NIK harus 16 digit angka" class="form-control" required value="{{ old('nik') }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" inputmode="numeric" pattern="\d{16}"
                            title="NIK harus 16 digit angka" class="form-control" required value="{{ old('nik') }}"
                            list="nikList" autocomplete="off">
                        <datalist id="nikList"></datalist>
                    </div>
                    <div class="form-group">
                        <label for="nik_pelapor">NIK Pelapor</label>
                        <input type="text" inputmode="numeric" name="nik_pelapor" id="nik_pelapor" inputmode="numeric"
                            minlength="16" maxlength="16" class="form-control" required value="{{ old('nik_pelapor') }}">
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const nikInput = document.getElementById('nik');
                            const nikPelaporInput = document.getElementById('nik_pelapor');
                            const nikList = document.getElementById('nikList');
                            const wargas = @json($wargas->pluck('nik', 'nama'));

                            nikInput.addEventListener('input', function() {
                                const value = this.value;
                                nikList.innerHTML = '';

                                if (value.length >= 3) {
                                    Object.entries(wargas).forEach(([nama, nik]) => {
                                        if (nik.startsWith(value)) {
                                            const option = document.createElement('option');
                                            option.value = nik;
                                            option.textContent = `${nik} - ${nama}`;
                                            nikList.appendChild(option);
                                        }
                                    });
                                }
                            });

                            nikInput.addEventListener('change', function() {
                                const selectedNik = this.value;
                                const selectedNama = Object.entries(wargas).find(([nama, nik]) => nik === selectedNik)?.[0];
                                if (selectedNama) {
                                    // Opsional: Isi field nama jika ada
                                    // document.getElementById('nama').value = selectedNama;
                                }
                            });

                            // Fungsi validasi form
                            window.validateForm = function() {
                                const nik = nikInput.value;
                                const nikPelapor = nikPelaporInput.value;

                                if (nik === nikPelapor) {
                                    alert('NIK yang meninggal tidak boleh sama dengan NIK pelapor.');
                                    return false;
                                }

                                return true;
                            };

                            // Tambahkan event listener untuk validasi real-time
                            nikInput.addEventListener('input', checkNikMatch);
                            nikPelaporInput.addEventListener('input', checkNikMatch);

                            function checkNikMatch() {
                                if (nikInput.value === nikPelaporInput.value && nikInput.value !== '') {
                                    nikPelaporInput.setCustomValidity('NIK pelapor tidak boleh sama dengan NIK yang meninggal');
                                } else {
                                    nikPelaporInput.setCustomValidity('');
                                }
                            }
                        });
                    </script>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="waktu_kematian">Waktu Kematian</label>
                        <input type="datetime-local" name="waktu_kematian" id="waktu_kematian" class="form-control" required
                            max="{{ now()->format('Y-m-d\TH:i') }}" value="{{ old('waktu_kematian') }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pemakaman">Tanggal Pemakaman</label>
                        <input type="date" name="tanggal_pemakaman" id="tanggal_pemakaman" class="form-control" required
                            min="{{ now()->format('Y-m-d') }}" value="{{ old('tanggal_pemakaman') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="tempat_meninggal">Tempat Meninggal</label>
                        <input type="text" name="tempat_meninggal" id="tempat_meninggal" class="form-control" required
                            minlength="3" maxlength="100" value="{{ old('tempat_meninggal') }}">
                    </div>
                    <div class="form-group">
                        <label for="kontak_keluarga">Kontak Keluarga</label>
                        <input type="tel" name="kontak_keluarga" id="kontak_keluarga" class="form-control" required
                            pattern="[0-9]{10,13}" title="Nomor telepon harus 10-13 digit angka"
                            value="{{ old('kontak_keluarga') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sebab_kematian">Sebab Kematian</label>
                    <input type="text" name="sebab_kematian" id="sebab_kematian" class="form-control" required
                        minlength="3" maxlength="100" value="{{ old('sebab_kematian') }}">
                </div>

                <div class="modal-footer">
                    <a href="{{ route('kematian.index') }}" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
