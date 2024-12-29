@extends('master')

@section('judul', 'Daftar Semua Produk')

@section('breadcrumb')
<div class="col-md-6 col-sm-12">
    <div class="title">
        <h4>DAFTAR SEMUA PRODUK</h4>
    </div>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Semua Produk</li>
        </ol>
    </nav>
</div>
@endsection

@section('konten')
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <table class="data-table stripe hover nowrap">
            <thead>
                <tr>
                    <th width="40%">Nama Produk</th>
                    <th width="20%">Tag</th>
                    <th width="30%">Kategori</th>
                    <th width="10%">Harga</th>
                    <th width="20%">Username</th>
                    <th width="5%" class="nosort text-center">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $pdk)
                <tr>
                    <td class="table-plus">{{ $pdk->nama_produk }}</td>
                    <td>{{ $pdk->tag }}</td>
                    <td>{{ $pdk->kategori }}</td>
                    <td>Rp. {{ number_format($pdk->harga, 0,",",".") }}</td>
                    <td>{{ $pdk->username }}</td>
                    <td class="text-center">
                        <a type="button" class="btn btn-primary btn-sm" href="{{ url('produk', [$pdk->id, Str::slug($pdk->nama_produk)]) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                        <a class="btn btn-danger btn-sm delete-confirm" href="/admin/hapus-produk/{{$pdk->id}}"><i class="fa fa-trash"></i> Hapus</a>
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
                "info": "Menampilkan Produk ke _START_ - _END_ dari _TOTAL_ Produk",
                searchPlaceholder: "Cari Produk . . ."
            },
        });
    });
</script>

<script>
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Anda yakin menghapus Produk ini?',
            text: "Data Produk yang dihapus tidak dapat dikembalikan!",
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