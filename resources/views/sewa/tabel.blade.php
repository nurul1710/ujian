@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection
@section('judulh1','Admin - Sewa')
@section('konten')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h2 class="card-title">Data sewa</h2>
            <a type="button" class="btn btn-success float-right" href="{{ route('sewa.create') }}">
                <i class=" fas fa-plus"></i>Tambah sewa
            </a>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>user</th>
                        <th>penyewa</th>
                        <th>baju</th>
                        <th>tanggal_peminjaman</th>
                        <th>tanggal_pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->user->name }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->baju->nama_baju }}</td>
                        <td>{{ $dt->tanggal_peminjaman }}</td>
                        <td>{{ $dt->tanggal_pengembalian }}</td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-warning" href="{{ route('sewa.edit',$dt->id) }}">
                                    <i class=" fas fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-success" href="{{ route('sewa.show',$dt->id) }}">
                                    <i class=" fas fa-eye"></i>
                                </a>
                            </div>


                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>


    </div>
</div>
@endsection

@section('tambahanJS')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection

@section('tambahScript')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

@if($message = Session::get('success'))
toastr.success("{{ $message}}");
@endif
@if($message = Session::get('updated'))
toastr.warning("{{ $message}}");
@endif
</script>
@endsection
