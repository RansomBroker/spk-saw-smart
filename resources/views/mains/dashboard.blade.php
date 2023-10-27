@extends('master')
@section('title', 'Dashboard')
@section('content')
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</h1>

    <div class="alert alert-success fade show mb-3">
        <p>Website Sistem Pendukung Keputusan untuk menentukan bantuan pupuk, dengan metode SAW(Simple Additive Weighting) dan SMART(Simple Multi Attribute Rating
            Technique)</p>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('dashboard.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Dashboard</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->role == 1)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('criteria.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Kriteria</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('subcrit.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Sub Kriteria</a>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-th-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('candidate.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Calon</a>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('calculate.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Perhitungan</a>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('compare.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Data Hasil Akhir (perbandingan)</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="{{ route('compare.view') }}" class="h5 mb-0 font-weight-bold text-gray-800">Data Hasil Akhir (perbandingan)</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
@section('custom-js')
@endsection
