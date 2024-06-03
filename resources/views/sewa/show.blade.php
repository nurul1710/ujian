@extends('layouts.template')
@section('judulh1','data - book')

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

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data sewa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method=" POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="user->name">user</label>
                    <input type="text" class="form-control" id="user->name" name="user->name" placeholder=""
                        value="{{ $sewa->user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $sewa->name }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="baju->nama_baju">nama baju</label>
                    <input type="text" class="form-control" id="baju->nama_baju" name="baju->nama_baju" value="{{ $sewa->baju->nama_baju }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $sewa->phone }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="tanggal_peminjaman">tanggal peminjaman</label>
                    <input type="text" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ $sewa->tanggal_peminjaman }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengembalian">tanggal pengembalian</label>
                    <input type="text" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ $sewa->tanggal_pengembalian }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="baju->harga_perhari">harga sewa</label>
                    <input type="text" class="form-control" id="baju->harga_perhari" name="baju->harga_perhari" value="{{ $sewa->baju->harga_perhari }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $sewa->status }}"
                        disabled>
                </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>
        </form>
    </div>
</div>
@endsection