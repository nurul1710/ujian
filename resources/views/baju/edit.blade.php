@extends('layouts.template')
@section('judulh1','Admin - baju')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Baju</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('baju.update', $baju->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class=" card-body">
            <div class="form-group">
              <div class="mb-3">
                <label for="baju" class="form-label">Nama Baju</label>
                <input type="text" class="form-control" id="baju" name="baju"  value="{{$baju->baju}}">
              </div>
              <div class="mb-3">
                <label for="size" class="form-label">size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{$baju->size}}">
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">harga perhari</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{$baju->harga}}">
              </div>

              <div class="mb-3">
                <label for="jumlah" class="form-label">quantity</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{$baju->jumlah}}">
              </div>
            
              <div class="mb-3">
                <label for="cover" class="form-label">cover</label>
                <input type="file" class="form-control" id="cover" name="cover" value="{{$baju->cover}}">
              </div>
          
              
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection