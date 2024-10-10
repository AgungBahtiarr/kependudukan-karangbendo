@fragment('filterAlamat')
    <form action="">
        <div class="form-group">
            <label for="alamat_dusun">Alamat Dusun</label>
            <select name="alamat_dusun" id="alamat_dusun" class="form-control" required>
                <option value="">Pilih Dusun</option>
                @foreach ($dusun_data as $dusun => $data)
                    <option value="{{ $dusun }}">
                        {{ $dusun }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="form-group">
                <label for="rw">RW</label>
                <select name="rw" id="rw" class="form-control" required>
                    <option value="">Pilih RW</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rt">RT</label>
                <select name="rt" id="rt" class="form-control" required>
                    <option value="">Pilih RT</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end mt-2">
            <button class="btn btn-primary">Cari</button>
        </div>
    </form>


    <script>
        var dusunData = @json($dusun_data);
        var selectedDusun = "{{ $wargaSession['alamat_dusun'] ?? '' }}";
        var selectedRW = "{{ $wargaSession['rw'] ?? '' }}";
        var selectedRT = "{{ $wargaSession['rt'] ?? '' }}";

        function updateRWOptions() {
            var dusun = document.getElementById('alamat_dusun').value;
            var rwSelect = document.getElementById('rw');
            rwSelect.innerHTML = '<option value="">Pilih RW</option>';
            if (dusun && dusunData[dusun]) {
                Object.keys(dusunData[dusun].rw_rt).forEach(function(rw) {
                    var option = document.createElement('option');
                    option.value = rw;
                    option.textContent = rw;
                    option.selected = (rw === selectedRW);
                    rwSelect.appendChild(option);
                });
            }
            updateRTOptions();
        }

        function updateRTOptions() {
            var dusun = document.getElementById('alamat_dusun').value;
            var rw = document.getElementById('rw').value;
            var rtSelect = document.getElementById('rt');
            rtSelect.innerHTML = '<option value="">Pilih RT</option>';
            if (dusun && rw && dusunData[dusun] && dusunData[dusun].rw_rt[rw]) {
                dusunData[dusun].rw_rt[rw].forEach(function(rt) {
                    var option = document.createElement('option');
                    option.value = rt;
                    option.textContent = rt;
                    option.selected = (rt === selectedRT);
                    rtSelect.appendChild(option);
                });
            }
        }

        document.getElementById('alamat_dusun').addEventListener('change', function() {
            selectedRW = '';
            selectedRT = '';
            updateRWOptions();
        });

        document.getElementById('rw').addEventListener('change', function() {
            selectedRT = '';
            updateRTOptions();
        });

        // Initialize options on page load
        if (selectedDusun) {
            document.getElementById('alamat_dusun').value = selectedDusun;
            updateRWOptions();
            if (selectedRW) {
                document.getElementById('rw').value = selectedRW;
                updateRTOptions();
            }
        }

        // Call updateRWOptions on page load to populate RW dropdown
        updateRWOptions();
    </script>
@endfragment
