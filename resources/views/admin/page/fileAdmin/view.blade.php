@extends('admin.partials.app');

@section('content')
@include('admin/page/alert')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Data Admin</h1>
        </div>
        <div class="card-body">
            <a href="{{ route('adminSave') }}" class="btn btn-primary mb-2">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Admin</th>
                            <th>Username Admin</th>
                            <th>Password Admin</th>
                            <th>Password Repeat</th>
                            <th>Foto Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($dataAdmin as $no => $pecah)

                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $pecah->admin_nama }}</td>
                            <td>{{ $pecah->admin_username }}</td>
                            <td>{{ Str::substr($pecah->admin_password, 0, 5) }}</td>
                            <td>{{ Str::limit($pecah->admin_password_repeat, 5, '...') }}</td>
                            <td><img width="200"
                                    src="{{ asset('assets_admin/images/fotoadmin/' . $pecah->admin_foto ) }}" alt="">
                            </td>
                            <td>
                                <a href="{{ route('FormEdit', ['idedit'=>Crypt::encrypt( $pecah->id)]) }}">Edit</a>
                                <a href="{{ route('Delete', ['iddelete' =>Crypt::encrypt($pecah->id)]) }}">Hapus</a>
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
