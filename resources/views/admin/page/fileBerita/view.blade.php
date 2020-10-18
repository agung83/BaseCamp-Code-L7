@extends('admin.partials.app')

@section('content')

@include('admin/page/alert')

<div class="card">
    <div class="card-header">
        <h1>Data Berita</h1>
    </div>
    <div class="card-body">
        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahData">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="databerita">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Kategori Berita</th>
                        <th>Judul Berita</th>
                        <th>Tanggal Berita</th>
                        <th>Berita Isi</th>
                        <th>Berita Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($databerita as $no => $pecah)
                    <tr>
                        <td>{{ ++$no }}</td>
                    <td>{{ $pecah->kategori_nama }}</td>
                    <td>{{ $pecah->berita_judul }}</td>
                    <td>{{ $pecah->berita_tgl }}</td>
                    <td>{{ $pecah->berita_isi }}</td>
                    <td><img width="200" src="{{ asset('assets_admin/images/foto_berita/' . $pecah->berita_foto ) }}"
                            alt="kosong">
                    </td>
                    <td>
                        <button onclick="showUpdateberita('{{$pecah->id }}  ')" class="btn btn-warning"><i
                                class="fa fa-edit"></i></button>
                        <button onclick="showDeleteberita('{{ $pecah->id }}')" class="btn btn-danger"><i
                                class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal form simpan -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actionSave') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="">Pilih Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($datakategori as $pecah)
                                <option value="{{ $pecah->id }}">{{ $pecah->kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="judul">Berita Tanggal</label>
                            <input type="date" name="tgl" class="form-control">
                        </div>
                    </div>
                    <div class="col form-group">
                        <label for="judul">Berita Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    @error('judul')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <textarea name="isi" class="form-control" cols="30" rows="10">
                    </textarea>

                    <div class="form-group">
                        <label for="">Upload Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actionUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="idupdate" name="id">
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="">Pilih Kategori</label>
                            <select name="kategori" id="kat" class="form-control">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($datakategori as $pecah)
                                <option value="{{ $pecah->id }}">{{ $pecah->kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="judul">Berita Tanggal</label>
                            <input type="date" id="tgl" name="tgl" class="form-control">
                        </div>
                    </div>
                    <div class="col form-group">
                        <label for="judul">Berita Judul</label>
                        <input type="text" id="judul" name="judul" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="isi">Berita Isi</label>
                        <textarea name="isi" id="isi" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <img width="200" src="" id="image" alt="ksong">
                        <input type="hidden" id="fotolama" name="fotolama">
                    </div>
                    <div class="form-group">
                        <label for="">Upload Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- alert modal hapus -->
<div class="modal" id="hapusData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-center">Yakin Ingin Menghapus Data..?</h4>
                <form action="{{ route('aksiDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" id="idhapus" name="idhapus">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                <button type="reset" data-dismiss="modal" class="btn btn-danger btn-sm">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
