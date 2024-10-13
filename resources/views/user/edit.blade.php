<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Kader</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="edit-modal-form" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="edit-name">Nama</label>
                        <input type="text" name="name" id="edit-name" class="form-control edit-name"
                            value="{{ $user->name }}" required minlength="3" maxlength="100" pattern="[A-Za-z\s]+"
                            title="Nama hanya boleh berisi huruf dan spasi">
                    </div>
                    <div class="form-group">
                        <label for="edit-nik">NIK</label>
                        <input type="text" name="nik" id="edit-nik" class="form-control" minlength="16"
                            maxlength="16" required value="{{ $user->nik }}" pattern="\d{16}"
                            title="NIK harus berisi 16 digit angka">
                    </div>
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" name="username" id="edit-username" class="form-control" required
                            value="{{ $user->username }}" minlength="3" maxlength="20" pattern="[a-zA-Z0-9_]+"
                            title="Username hanya boleh berisi huruf, angka, dan underscore">
                    </div>
                    <div class="form-group">
                        <label for="edit-password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="edit-password" class="form-control"
                                minlength="8" title="Password baru harus minimal 8 karakter">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="toggleEditPassword">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                    </div>
                    <input type="hidden" name="user_id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const toggleEditPassword = document.querySelector('#toggleEditPassword');
                        const editPassword = document.querySelector('#edit-password');

                        toggleEditPassword.addEventListener('click', function(e) {
                            // toggle the type attribute
                            const type = editPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                            editPassword.setAttribute('type', type);
                            // toggle the eye / eye slash icon
                            this.querySelector('i').classList.toggle('fa-eye');
                            this.querySelector('i').classList.toggle('fa-eye-slash');
                        });
                    });

                    function validateEditForm() {
                        const name = document.getElementById('edit-name');
                        const nik = document.getElementById('edit-nik');
                        const username = document.getElementById('edit-username');
                        const password = document.getElementById('edit-password');

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

                        if (password.value !== '' && password.value.length < 8) {
                            alert('Password baru harus minimal 8 karakter');
                            password.focus();
                            return false;
                        }

                        return true;
                    }
                </script>
            </div>
        </div>
    </div>
</div>
