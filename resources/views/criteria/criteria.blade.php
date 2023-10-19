@extends('master')
@section('title', 'Data Kriteria')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Kriteria</h1>

    <div class="w-100 d-flex justify-content-lg-end justify-content-center mb-3">
        <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#addCriteriaModal"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
    </div>

    @if($status = Session::get('status'))
        @if($message = Session::get('message'))
            <div class="alert alert-{{ $status }} alert-dismissible fade show mb-3" role="alert">
                {{ $message }}
            </div>
        @endif
    @endif

    <div class="card mb-5">
        <div class="card-header text-primary">
            <i class="fa fa-table" aria-hidden="true"></i>
            Tabel Data Kriteria
        </div>
        <div class="card-body table-responsive table-bordered">
            <table class="table table-sm table-striped table-hover" id="kriteria-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kode Kriteria</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Bobot</th>
                        <th class="text-center">Attribut</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach($criteriaData as $criteria)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $criteria->code }}</td>
                            <td class="text-center">{{ $criteria->name }}</td>
                            <td class="text-center">{{ $criteria->weight }}</td>
                            @if($criteria->attribute == 1)
                                <td>Benefit</td>
                            @endif
                            @if($criteria->attribute == 2)
                                <td>Cost</td>
                            @endif
                            <td>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editData{{$criteria->id}}"><i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                <form action="{{ route('criteria.delete', $criteria->id) }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- add criteria modal --}}
    <div class="modal fade" id="addCriteriaModal" tabindex="-1" role="dialog" aria-labelledby="addCriteriaModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Kriteria Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('criteria.add')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="code" class="form-label">Kode Kriteria <sup class="text-warning">*</sup></label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="ex: K1" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Kriteria <sup class="text-warning">*</sup></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ex: Kriteria 1" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="weight" class="form-label">Bobot Kriteria <sup class="text-warning">*</sup></label>
                            <input type="number" name="weight" id="weight" class="form-control" placeholder="ex: 55" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="attribute" class="form-label">Atribut Kriteria <sup class="text-warning">*</sup></label>
                            <select name="attribute" id="attribute" class="form-control" required>
                                <option value="">--- pilih atribut kriteria ---</option>
                                <option value="1">Benefit</option>
                                <option value="2">Cost</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Tambah Data Kriteria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- generate modal edit--}}
    @foreach($criteriaData  as $criteria)
        <div class="modal fade" id="editData{{$criteria->id}}" tabindex="-1" role="dialog" aria-labelledby="addCriteriaModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit Data Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('criteria.edit', $criteria->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="code" class="form-label">Kode Kriteria <sup class="text-warning">*</sup></label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="ex: K1" required value="{{ $criteria->code }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama Kriteria <sup class="text-warning">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ex: Kriteria 1" required value="{{ $criteria->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="weight" class="form-label">Bobot Kriteria <sup class="text-warning">*</sup></label>
                                <input type="number" name="weight" id="weight" class="form-control" placeholder="ex: 55" required value="{{ $criteria->weight }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="attribute" class="form-label">Atribut Kriteria <sup class="text-warning">*</sup></label>
                                <select name="attribute" id="attribute" class="form-control" required>
                                    <option value="">--- pilih atribut kriteria ---</option>
                                    <option value="1" @if($criteria->attribute == 1)selected @endif>Benefit</option>
                                    <option value="2" @if($criteria->attribute == 2)selected @endif>Cost</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Edit Data Kriteria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#kriteria-table').DataTable();
        })
    </script>
@endsection
