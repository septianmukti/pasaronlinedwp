@extends('master')

@section('judul', 'Daftar Semua Akun Penjual')

@section('breadcrumb')
<div class="col-md-6 col-sm-12">
    <div class="title">
        <h4>DAFTAR SEMUA AKUN PENJUAL</h4>
    </div>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semua Akun</li>
        </ol>
    </nav>
</div>
@endsection

@section('konten')
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    @if ($message = Session::get('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <table class="data-table stripe hover nowrap">
            <thead>
                <tr>
                    <th>NAMA LENGKAP</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>KONTAK</th>
                    <th>ALAMAT</th>
                    <th class="nosort text-center">MENU</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $akn)
                <tr>
                    <td>{{ strtoupper($akn->name) }}</td>
                    <td>{{ $akn->username }}</td>
                    <td>{{ $akn->email }}</td>
                    <td>{{ $akn->kontak }}</td>
                    <td>{{ $akn->alamat }}</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="/admin/akun-penjual/{{$akn->id}}/ganti-password"><i class="fa fa-lock"></i> Ganti Password</a>
                        <a class="btn btn-danger btn-sm delete-confirm" href="/admin/hapus/{{$akn->id}}"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">


<script>
    $('document').ready(function() {
        $('.data-table').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "nosort",
                orderable: false,
            }],
            "language": {
                "info": "Menampilkan Akun ke _START_ - _END_ dari _TOTAL_ Akun",
                searchPlaceholder: "Cari Akun Penjual . . ."
            },
        });
    });
</script>

<script>
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Anda yakin menghapus Akun ini?',
            text: "Akun yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            allowEscapeKey: false,
            allowOutsideClick: false,
            closeOnCancel: true
        }).then(function(result) {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    });
</script>

@endsection