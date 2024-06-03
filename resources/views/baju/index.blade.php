@extends('layouts.template')
@section('judulh1', 'koleksi Baju')
@section('konten')
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-3">
                <a href="{{ route('baju.create') }}" class="btn btn-md btn-success">Tambah Data Baju</a>
            </div>
            <div class="col-lg-9">
                <form action="{{ route('caribaju') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." name="cari"
                            value="{{ request('cari') }}">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- atas --}}
        <div class="row mt-5" >
        @foreach ($data as $baju)
            <div class="col-lg-6" >
                <div class="card mb-3" style="max-width: 500px;" >
                    <div class="row g-0" >
                        <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $baju->cover) }}" class="img-fluid rounded-start ml-3" style="height: 250px; object-fit: foto;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                
                                <p class="card-text">Nama baju: {{ $baju->nama_baju}}</p>
                                <p class="card-text">size: {{ $baju->size}}</p>
                                <p class="card-text">harga perhari: {{ $baju->harga_perhari }}</p>
                                <p class="card-text">status: {{ $baju->status }}</p>
                                
                                <a href="{{ route('baju.edit', $baju->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('baju.destroy', $baju->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus baju ini?');">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
        {{ $data->links() }}
    </div>
@endsection