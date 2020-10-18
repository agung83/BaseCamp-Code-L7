@extends('admin.partials.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Data</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('actionSaveAdmin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Admin Nama</label>
                    <input type="text" name="nama" value="{{ old('nama')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Admin username</label>
                    <input type="text" name="admin_username" value="{{ old('admin_username')}}" class="form-control">
                </div>

                @error('admin_username')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="password" name="pass" value="{{ old('pass')}}" class="form-control">
                </div>

                @error('pass')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="">Admin Password Repeat</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                @error('foto')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="">Admin Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
