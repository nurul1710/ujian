@extends('layouts.template')
@section('judulh1','Admin - Customer')

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
            <h3 class="card-title">Tambah Data Sewa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="name">nama penyewa</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <label for="tanggal_peminjaman">tanggal peminjaman</label>
                    <input type="text" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman">
                </div>
                
                <div class="form-group">
                    <label for="tanggal_pengembalian">tanggal pengembalian</label>
                    <input type="text" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
                </div>

                <div class="form-group">
                    <label for="totalharga_sewa"> harga sewa</label>
                    <input type="text" class="form-control" id="totalharga_sewa" name="totalharga_sewa">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

