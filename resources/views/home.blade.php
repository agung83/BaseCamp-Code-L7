@extends('layouts.app')

@section('content')
<div class="jumbotron-fluid">
    <img class="img-fluid" src="{{ asset('assets_admin/images/ujicoba4.svg') }}" alt="">
</div>
<div class="container mt-5">
    @auth
    <div class="tutorial text-center">
        <h1 class="display-4">Selamat Datang</h1>
        <p class="font-italic">Lihat
            Kedepan
            Dan Raih Lah</p>
    </div>
    @endauth

    <div class="tutorial">
        <p style="font-size: 26px;"> Learn Tutorial </p>
        <hr class="my-4">
    </div>



    <div class="row">
        @foreach ($data as $no => $pecah)
        <div class="col-md-4">

            <div class="card mb-4 shadow-sm">
                <img style="height: 230px; object-fit: cover; object-position: center;"
                    src="{{ asset('assets_admin/images/foto_berita/'. $pecah->berita_foto) }}" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($pecah->berita_judul, 50, '...') }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">View</button>
                            <button type="button" class="btn btn-sm btn-outline-success">Edit</button>
                        </div>
                        <small class="text-muted">{{ $pecah->berita_tgl }}</small>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <div class="">
        {{ $data->links() }}
    </div>
</div>


<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio minima nihil similique at esse odio
                expedita, libero illo quos id explicabo optio assumenda ullam consequatur dolores autem fugiat
                reprehenderit voluptatum!
                <hr class="my-4">
                <p>Lets Join Us
                </p>
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-md-6">
                <img style="height: 300px;width: 600px;" class="img-fluid rounded"
                    src="{{ asset('assets_admin/images/undraw_social_girl_562b.svg') }}" alt="">
            </div>
        </div>
    </div>
</div>




@endsection
<script>
    $(document).ready(function (){
        alert('hello')
    })
</script>
