@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Tambah Penerima Program Bansos</h1>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">
            <form action="{{ route('penerimaprogram.store') }}" method="POST">
                @csrf
                <div class="overflow-x-scroll md:overflow-x-hidden w-full">
                    <table id="datatable" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="select-all" class="select-all-checkbox">
                                </th>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bansoses as $bansos)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected_recipients[]" value="{{ $bansos->id }}"
                                            class="recipient-checkbox">
                                    </td>
                                    <td>{{ $bansos->warga->nama }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bansos->nik }}</td>
                                    <td>{{ $bansos->status == '1' ? 'Aktif' : 'Non-Aktif' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <input type="hidden" name="program_id" value="{{ $programId }}">
                    <button type="submit" class="btn btn-primary">Tambahkan Penerima Terpilih ke Program</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.querySelector('.select-all-checkbox');
            const recipientCheckboxes = document.querySelectorAll('.recipient-checkbox');

            // Fungsi untuk mengupdate status "Select All" checkbox
            function updateSelectAllCheckbox() {
                selectAllCheckbox.checked = Array.from(recipientCheckboxes).every(checkbox => checkbox.checked);
                selectAllCheckbox.indeterminate = Array.from(recipientCheckboxes).some(checkbox => checkbox
                    .checked) && !selectAllCheckbox.checked;
            }

            // Event listener untuk "Select All" checkbox
            selectAllCheckbox.addEventListener('change', function() {
                recipientCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Event listener untuk setiap recipient checkbox
            recipientCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectAllCheckbox);
            });

            // Inisialisasi status "Select All" checkbox
            updateSelectAllCheckbox();
        });
    </script>
@endsection
