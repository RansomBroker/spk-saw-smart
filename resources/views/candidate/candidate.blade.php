@extends('master')
@section('title', 'Data Calon')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-users" aria-hidden="true"></i> Data Calon</h1>

    <div class="w-100 d-flex justify-content-lg-end justify-content-center mb-3">
        <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#addCandidateModal"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
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
            Tabel Data Calon
        </div>
        <div class="card-body table-responsive table-bordered">
            <table class="table table-sm table-striped table-hover" id="candidate-table">
                <thead class="bg-primary text-white">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Calon</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($candidateData as $candidate)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $candidate->name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editDataCandidate{{$candidate->id}}Modal"><i class="fa fa-edit" aria-hidden="true"></i>
                            </button>
                            <form action="{{ route('criteria.delete', $candidate->id) }}" method="POST" class="m-0 p-0">
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

    {{-- add candidate modal --}}
    <div class="modal fade" id="addCandidateModal" tabindex="-1" role="dialog" aria-labelledby="addCandidateModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Calon Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('candidate.add')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Calon <sup class="text-warning">*</sup></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ex: Andi" required>
                        </div>
                        @foreach($criteriaData as $criteria)
                            <div class="form-group mb-3">
                                <label for="sub_criteria_id" class="form-label">{{ $criteria->name }} ({{$criteria->code}})<sup class="text-warning">*</sup></label>
                                <select name="sub_criteria_id" id="sub_criteria_id" class="form-control" required>
                                    <option value="">--- pilih sub kriteria ---</option>
                                    @foreach($criteria->subCriteria as $subCriteria)
                                        <option value="{{ $subCriteria->id }}">{{ $subCriteria->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary w-100">Tambah Data Kriteria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit candidate modal --}}
    @foreach($candidateData as $candidate)
        <div class="modal fade" id="editDataCandidate{{ $candidate->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="addCandidateModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Edit Data Calon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('candidate.add')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama Calon <sup class="text-warning">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ex: Andi" required value="{{ $candidate->name }}">
                            </div>
                            @foreach($candidate->rating as $rating)
                                <div class="form-group mb-3">
                                    <label for="sub_criteria_id" class="form-label">{{ $rating->subCriteria->criteria->name }} ({{$rating->subCriteria->criteria->code}})<sup class="text-warning">*</sup></label>
                                    <select name="sub_criteria_id" id="sub_criteria_id" class="form-control" required>
                                        <option value="">--</option>
                                        @foreach($subCriteriaData as $subCriteria)
                                            @if($subCriteria->criteria_id == $rating->subCriteria->criteria_id)
                                                <option value="{{ $subCriteria->id }}" @if($subCriteria->id == $rating->sub_criteria_id) selected @endif>{{$subCriteria->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
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
            $('#candidate-table').DataTable();
        })
    </script>
@endsection
