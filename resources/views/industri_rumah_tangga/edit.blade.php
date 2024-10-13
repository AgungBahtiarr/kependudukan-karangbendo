@fragment('edit')
    <form action={{ route('industries.update') }} method="POST">
        @csrf
        @method('patch')

        <input type="hidden" name="id" value={{ $industri->id }}>
        <div class="content-item mb-3">
            <div class="form-group">
                <label for="nama_usaha">Nama Usaha</label>
                <input type="text" name="nama_usaha" class="form-control" required value={{ $industri->nama_usaha }}>
            </div>
        </div>
        <div class="content-item mb-3">

            <div class="form-group">
                <label for="bidang_sandang">Bidang Sandang</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_sandang_ya" name="bidang_sandang" value="1"
                            class="custom-control-input" required {{ $industri->bidang_sandang == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_sandang_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_sandang_tidak" name="bidang_sandang" value="0"
                            class="custom-control-input" required {{ $industri->bidang_sandang == '0' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_sandang_tidak"> Tidak </label>
                    </div>
                </div>
            </div>

            <div id="bidang_sandang_keterangan" style="display: none;">
                <div class="form-group">
                    <label for="keterangan_bidang_sandang">Keterangan Bidang Sandang</label>
                    <input type="text" id="keterangan_bidang_sandang" name="keterangan_sandang" class="form-control"
                        value="{{ old('keterangan_bidang_sandang', $industri->keterangan_sandang) }}">
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
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

                    // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                    toggleBidangSandangKeterangan();
                });
            </script>
        </div>
        <div class="content-item mb-3">
            <div class="form-group">
                <label for="bidang_pangan">Bidang Pangan</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_pangan_ya" name="bidang_pangan" value="1"
                            class="custom-control-input" required {{ $industri->bidang_pangan == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_pangan_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_pangan_tidak" name="bidang_pangan" value="0"
                            class="custom-control-input" required {{ $industri->bidang_pangan == '0' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_pangan_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div id="bidang_pangan_keterangan" style="display: none;">
            <div class="form-group">
                <label for="keterangan_bidang_pangan">Keterangan Bidang Pangan</label>
                <input type="text" id="keterangan_bidang_pangan" name="keterangan_pangan" class="form-control"
                    value="{{ old('keterangan_bidang_pangan', $industri->keterangan_pangan) }}">
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
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

                // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                toggleBidangPanganKeterangan();
            });
        </script>

        <div class="content-item mb-3">
            <div class="form-group">
                <label for="bidang_jasa">Bidang Jasa</label>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_jasa_ya" name="bidang_jasa" value="1"
                            class="custom-control-input" required {{ $industri->bidang_jasa == '1' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_jasa_ya"> Ya </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="bidang_jasa_tidak" name="bidang_jasa" value="0"
                            class="custom-control-input" required {{ $industri->bidang_jasa == '0' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="bidang_jasa_tidak"> Tidak </label>
                    </div>
                </div>
            </div>
        </div>

        <div id="bidang_jasa_keterangan" style="display: none;">
            <div class="form-group">
                <label for="keterangan_bidang_jasa">Keterangan Bidang Jasa</label>
                <input type="text" id="keterangan_bidang_jasa" name="keterangan_jasa" class="form-control"
                    value="{{ old('keterangan_bidang_jasa', $industri->keterangan_jasa) }}">
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
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

                // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
                toggleBidangJasaKeterangan();
            });
        </script>


        <div class="modal-footer">
            <a href="/industries/detail/{{ $industri->id }}/{{ $industri->nkk }}" type="button" class="btn btn-secondary"
                data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </form>
@endfragment
