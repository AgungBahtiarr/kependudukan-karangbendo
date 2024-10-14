@extends('layouts.app')


@section('content')
    <div class="my-10 mx-12">
        <h1 class="text-2xl font-semibold">Detail Penerima Program Bansos</h1>

        <div class="w-full bg-white my-6 py-4 px-4 rounded-lg">

            <div class="overflow-x-scroll md:overflow-x-hidden w-full">
                <table id="datatable" class="table data-table table-striped table-bordered">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Status</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerimas as $penerima)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penerima->penerimaBansos->nik }}</td>
                                <td>{{ $penerima->penerimaBansos->warga->nama }}</td>
                                <td>{{ $penerima->penerimaBansos->status == '1' ? 'Aktif' : 'Non-Aktif' }}</td>
                                {{-- <th> @can('edit_bansos')
                                        <div hx-get={{ route('bansos.isLog', [$penerima->penerimaBansos->id, $penerima->id]) }}
                                            hx-trigger="load" hx-target="this" hx-swap="innerHtml">
                                        </div>
                                    @endcan
                                </th> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

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
