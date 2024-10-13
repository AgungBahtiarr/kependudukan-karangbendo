<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Akun Kader</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" id="kader-form"
                    onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" required minlength="3"
                            maxlength="100" pattern="[A-Za-z\s]+" title="Nama hanya boleh berisi huruf dan spasi"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik"
                            class="form-control @error('nik') is-invalid @enderror" required minlength="16"
                            maxlength="16" pattern="\d{16}" title="NIK harus berisi 16 digit angka"
                            value="{{ old('nik') }}">
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror" required minlength="3"
                            maxlength="20" pattern="[a-zA-Z0-9_]+"
                            title="Username hanya boleh berisi huruf, angka, dan underscore"
                            value="{{ old('username') }}">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required minlength="8"
                                title="Password harus minimal 8 karakter">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>

                <script>
                    function validateForm() {
                        var name = document.getElementById('name');
                        var nik = document.getElementById('nik');
                        var username = document.getElementById('username');
                        var password = document.getElementById('password');

                        if (name.value.trim() === '') {
                            alert('Nama tidak boleh kosong');
                            name.focus();
                            return false;
                        }

                        if (nik.value.length !== 16) {
                            alert('NIK harus 16 digit');
                            nik.focus();
                            return false;
                        }

                        if (username.value.trim() === '') {
                            alert('Username tidak boleh kosong');
                            username.focus();
                            return false;
                        }

                        if (password.value.length < 8) {
                            alert('Password harus minimal 8 karakter');
                            password.focus();
                            return false;
                        }

                        return true;
                    }



                    $('#createUserModal').on('shown.bs.modal', function() {
                        document.addEventListener('DOMContentLoaded', function() {
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#password');

                            togglePassword.addEventListener('click', function(e) {
                                // toggle the type attribute
                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                password.setAttribute('type', type);
                                // toggle the eye / eye slash icon
                                this.querySelector('i').classList.toggle('fa-eye');
                                this.querySelector('i').classList.toggle('fa-eye-slash');
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
