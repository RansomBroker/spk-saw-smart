@extends('master')
@section('title', 'Data User')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-address-book" aria-hidden="true"></i> Data User</h1>

    <div class="w-100 d-flex justify-content-lg-end justify-content-center mb-3">
        <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#addUserModal"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
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
            Tabel Data User
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm" id="user-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach($userData as $user)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                @if($user->role == 1)
                                    {{ "Admin" }}
                                @else
                                    {{ "User" }}
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editData{{$user->id}}Modal"><i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                                @if($user->id != 1)
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- add user modal --}}
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.add')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama <sup class="text-warning">*</sup></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ex: Andi" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email <sup class="text-warning">*</sup></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="andi@mail.com" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role" class="form-label">Role <sup class="text-warning">*</sup></label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">--- pilih role user ---</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password <sup class="text-warning">*</sup></label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Tambah Data User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit user modal --}}
    @foreach($userData as $user)
        <div class="modal fade" id="editData{{$user->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="editData{{$user->id }}Modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Edit user {{ $user->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.edit', $user->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama <sup class="text-warning">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="ex: Andi" required value="{{ $user->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email <sup class="text-warning">*</sup></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="andi@mail.com" required value="{{ $user->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">Role <sup class="text-warning">*</sup></label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">--- pilih role user ---</option>
                                    <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                                    <option value="2" @if($user->role == 2) selected @endif>User</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah Data User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('custom-js')
@endsection
