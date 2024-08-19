@extends('layouts.app')

@section('title', $title)

@section('content')


    @can('dashboard_access')
        <div class="row mx-1 my-1">
            <div class="col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-primary">
                                <span class="counter">{{ $jumlahWarga }}</span> Orang
                            </h3>
                            <div class="bg-primary icon iq-icon-box-2 mr-2 rounded">
                                <i class="ri-team-fill"></i>
                            </div>
                        </div>
                        <h4>Total Seluruh Warga</h4>
                        <div class="mt-1">
                            <p class="mb-0">{{ date('d F Y', time()) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-success">
                                <span class="counter">{{ $jumlahCatatanKeluarga }}</span> Catatan Keluarga
                            </h3>
                            <div class="bg-success icon iq-icon-box-2 mr-2 rounded">
                                <i class="ri-home-4-fill"></i>
                            </div>
                        </div>
                        <h4>Total Catatan Keluarga</h4>
                        <div class="mt-1">
                            <p class="mb-0">{{ date('d F Y', time()) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-1 my-1">
            <div class="col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-primary">
                                <span class="counter">{{ $jumlahWargaTerverifikasi }}</span> Orang
                            </h3>
                            <div class="bg-primary icon iq-icon-box-2 mr-2 rounded">
                                <i class="ri-team-fill"></i>
                            </div>
                        </div>
                        <h4>Total Warga Terverifikasi</h4>
                        <div class="mt-1">
                            <p class="mb-0">{{ date('d F Y', time()) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between mb-3">
                            <h3 class="text-success">
                                <span class="counter">{{ $jumlahCatatanKeluargaTerverifikasi }}</span> Catatan Keluarga
                            </h3>
                            <div class="bg-success icon iq-icon-box-2 mr-2 rounded">
                                <i class="ri-home-4-fill"></i>
                            </div>
                        </div>
                        <h4>Total Catatan Keluarga Terverifikasi</h4>
                        <div class="mt-1">
                            <p class="mb-0">{{ date('d F Y', time()) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan

@endsection
