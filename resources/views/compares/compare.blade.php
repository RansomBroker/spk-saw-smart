@extends('master')
@section('title', 'Perbandingan (Hasil Data Akhir)')
@section('content')
    <!-- Page Heading -->
    <div class="row justify-content-between mb-3 align-items-start">
        <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Perbandingan (Hasil Akhir)</h1>

        <button class="btn btn-primary px-4 py-1" id="print"><i class="fas fa-fw fa-print"></i>Print</button>
    </div>

    <div class="row justify-content-between" id="result">
        <div class="col-lg-6 col-12 col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    Hasil Akhir Perhitungan SAW
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Alternatif</th>
                            <th class="text-center">Nilai Vi</th>
                            <th class="text-center">Rank</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sawData as $result)
                            <tr>
                                <td class="text-center">{{ $result->candidate->name }}</td>
                                <td class="text-center">{{ $result->score }}</td>
                                <td class="text-center">{{ $result->rank }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 col-md-6">
            <div class="card">
                <div class="card-header text-primary">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    Hasil Akhir Perhitungan SMART
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Alternatif</th>
                                <th class="text-center">Nilai Vi</th>
                                <th class="text-center">Rank</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($smartData as $result)
                                <tr>
                                    <td class="text-center">{{ $result->candidate->name }}</td>
                                    <td class="text-center">{{ $result->score }}</td>
                                    <td class="text-center">{{ $result->rank }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-js')
    <script>
        const printJs=window["printJS"]
        document.getElementById('print').onclick=function(){
            printJs({
                printable:'result',
                type: 'html',
                honorColor:true,
                font_size:'11px',
                css:"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css",
                documentTitle:"Hasil Data"
            })
        }
    </script>
@endsection
