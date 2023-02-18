@extends('layouts.mainLayout')

@section('content')
    
    <div class="container p-3">
        <h6>Nama Barang</h6>
        <button class="btn btn-success text-white d-flex gap-2 align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#modal-nama-barang">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
            </svg> Tambah Data
        </button>

        <table class="table mb-5">
            <thead class="bg-primary text-white fw-bold text-center">
                <tr>
                    <td>No</td>
                    <td>Nama Barang</td>
                    <td>Harga (Rp. )</td>
                    <td>Aksi</td>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?> 
                @forelse ($barang as $barangs)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $barangs->jenis_barang }}</td>
                        <td>{{ $barangs->harga }}</td>
                        <td>
                            {{-- @method('DELETE') --}}
                            {{-- <a href="{{ route('barang', $barangs->id) }}" class="btn btn-danger">HAPUS</a> --}}
                            <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('layanan.delbarang', $barangs->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Nama Barang Belum Diisi
                    </div>
                @endforelse
            </tbody>
        </table>

        <div class="modal fade" id="modal-nama-barang" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Nama Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('layanan.barang') }}" method="post">
                            @csrf
                            <label for="nama">
                                <h6>Nama Barang</h6>
                            </label>
                            <input type="text" name="jenis_barang" id="nama" class="w-100 mb-3">
                            <label for="harga">
                                <h6>Harga Barang</h6>
                            </label>
                            <input type="text" name="harga" id="harga" class="w-100 mb-3">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h6>Jenis Cuci</h6>
        <button class="btn btn-success text-white d-flex gap-2 align-items-center mb-3" data-bs-toggle="modal" data-bs-target="#modal-jenis-cuci">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
            </svg> Tambah Data
        </button>

        <table class="table">
            <thead class="bg-primary text-white fw-bold text-center">
                <tr>
                    <td>No</td>
                    <td>Jenis Cuci</td>
                    <td>Harga (Rp. )</td>
                    <td>Aksi</td>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?> 
                @forelse ($cuci as $cucis)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $cucis->jenis_cuci }}</td>
                        <td>{{ $cucis->harga }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('layanan.delcuci', $cucis->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Nama Barang Belum Diisi
                    </div>
                @endforelse
            </tbody>
        </table>

        <div class="modal fade" id="modal-jenis-cuci" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jensi Cuci</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('layanan.cuci') }}" method="post">
                            @csrf
                            <label for="nama">
                                <h6>Jensi Cuci</h6>
                            </label>
                            <input type="text" name="jenis_cuci" id="nama" class="w-100 mb-3">
                            <label for="harga">
                                <h6>Harga Cuci</h6>
                            </label>
                            <input type="text" name="harga" id="harga" class="w-100 mb-3">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection