@extends('layouts.template')
@section('judulh1',' - customer')

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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Customer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('baju.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class=" card-body">
            <div class="form-group">
              <div class="mb-3">
                <label for="nama_baju" class="form-label"> nama baju</label>
                <input type="text" class="form-control" id="nama_baju" name="nama_baju">
              </div>
              <div class="mb-3">
                <label for="size" class="form-label">size</label>
                <input type="text" class="form-control" id="size" name="size">
              </div>
              <div class="mb-3">
                <label for="harga_perhari" class="form-label">harga perhari</label>
                <input type="text" class="form-control" id="harga_perhari" name="harga_perhari">
              </div>
              <div class="mb-3">
                <label for="quantity" class="form-label">quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity">
              </div>
              <div class="mb-3">
                <label for="cover" class="form-label">cover</label>
                <input type="file" class="form-control" id="cover" name="cover">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">status</label>
                <select class="form-control" name="status">
                    <option hidden>--Pilih status--</option>
                    <option value="sewa">sewa</option>
                    <option value="kembali">kembali</option>
                </select><br>
              
             
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection