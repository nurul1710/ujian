<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    @yield('tambahanCSS')
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
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
    
        <div class="card bg-secondary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data pinjam</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('sewa.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Penyewa</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="baju" class="form-label">Baju</label>
                    <select class="form-control" name="baju_id">
                        <option hidden>--Pilih baju--</option>
                        @foreach($data as $dt)
                        <option value="{{ $dt->id }}">{{ $dt->nama_baju }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input type="number" class="form-control" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman">
                </div>
                
                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
                </div>

            </div>
          
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
