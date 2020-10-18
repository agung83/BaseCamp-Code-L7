@extends('admin/partials/app')

@section('content')



<div class="container">
    @if ($message = Session::get('email'))
    <div class="alert alert-success">
        {{ $message}}
    </div>
    @endif
    <table class="table table-stripsed">
        <form action=" {{ route('SendEmail') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td width="190px">Kepada</td>
                <td><input type="email" class="form-control" name="to" placeholder="Masukan email penerima"></td>
            </tr>
            <tr>
                <td width="190px">Title</td>
                <td><input type="text" class="form-control" name="title" placeholder="Masukan Title Pesan"></td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td>
                    <textarea class="form-control" name="pesan" placeholder="Pesan anda"></textarea>
                </td>
            </tr>
            <tr>
                <td>File</td>
                <td>
                    <input type="file" class="form-control" name="foto">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Kirim" class="btn btn-primary"></td>
            </tr>
    </table>
    </form>
</div>


@endsection