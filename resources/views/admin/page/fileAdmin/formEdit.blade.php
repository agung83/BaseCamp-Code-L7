@extends('admin.partials.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Data</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('actionUpdateAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $dataEdit->id }}">
                <label for="">Admin Nama</label>
                <input type="text" name="nama" value="{{ $dataEdit->admin_nama}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Admin username</label>
                <input type="text" name="admin_username" value="{{ $dataEdit->admin_username}}" class="form-control">
            </div>
            @error('admin_username')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror


            <div class="form-group">
                <label for="">Admin Password</label>
                <input type="password" name="pass" value="{{ $dataEdit->admin_password  }}" class="form-control">
            </div>



            <div class="form-group">
                <label for="">Admin Password Repeat</label>
                <input type="password" name="password_confirmation" value="{{ $dataEdit->admin_password  }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <img width="200" src="{{ asset('assets_admin/images/fotoadmin/' .$dataEdit->admin_foto ) }}" alt="">
                <input type="hidden" name="fotolama" value="{{ $dataEdit->admin_foto  }}">
            </div>

            <div class="form-group">
                <label for="">Admin Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>
@endsection
