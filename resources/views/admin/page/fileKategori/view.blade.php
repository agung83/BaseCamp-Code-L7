@extends('admin.partials.app')

@section('content')

@include('admin/page/alert')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Data Kategori</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('tambahKategori') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($dataKategori as $no => $pecah)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $pecah->kategori_nama }}</td>
                            <td class="text-center">
                                <a href="{{ route('formUpdate', $pecah->slug)  }}"
                                    class="btn btn-warning btn-sm">Update</a>
                                <a href="{{ route('actionDelete', ['idhapus' => Crypt::encrypt($pecah->id)]) }}"
                                    class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
