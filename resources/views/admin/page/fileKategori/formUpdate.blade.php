@extends('admin/partials/app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Update Data Kategori</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('actionUpdateKategori') }}" method="POST">
                @csrf

                @error('kat')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="idkategori" value="{{ $dataKategori->id }}">
                    <input type="text" value="{{ $dataKategori->kategori_nama }}" name="kat" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
