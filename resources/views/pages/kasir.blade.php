@extends('layouts.mainLayout')

@section('content')

    <div class="container p-3">
        <div class="w-50 position-absolute">
            @if (session('success'))
                <p class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
            @endif
            @if (session('error'))
                <p class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $err }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </p>
            @endif
        </div>

        <form action="{{ route('kasir.pesanan') }}" method="POST" class="form-group">
            @csrf
            @method('POST')
            <div class="row d-flex justify-content-between">
                <div class="col-3 pe-2">
                    <label for="nama_barang">
                        <h6>Nama Barang</h6>
                    </label>
                    <select class="form-select" aria-label="Default select example" name="jenis_barang">
                        <option selected></option>
                        
                        @forelse ($barang as $barangs)
                            <option value="{{ $barangs->id }}">{{ $barangs->jenis_barang  }}</option>
                        @empty
                        <option selected>Belum Ada Data Nama Barang</option>   
                        @endforelse
                    </select>
                </div>
                <div class="col-3">
                    <label for="jenis_cuci">
                        <h6>Jenis Cuci</h6>
                    </label>
                    <select class="form-select" aria-label="Default select example" name="jenis_cuci">
                        <option selected></option>
                        
                        @forelse ($cuci as $cucis)
                            <option value="{{ $cucis->id }}">{{ $cucis->jenis_cuci  }}</option>
                            @empty
                            <option selected>Belum Ada Data Jenis Cuci</option>   
                            @endforelse
                        </select>
                    </div>
                    <div class="col-3 ps-2">
                        <label for="berat">
                            <h6>Berat Barang (Kg) / Qty</h6>
                    </label>
                    <input type="number" name="berat" id="berat" class="form-control" value="0">
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <button class="btn btn-primary shadow">Tambah Data Pencucian</button>
                </div>
            </div>
        </form>
        
        <form action="{{ route('kasir.nota') }}" method="POST" class="form-group mt-3">
            @csrf
            @method('POST')
            <label for="nama">
                <h6>Nama Pemilik</h6>
            </label>
            <input type="text" name="nama_pelanggan" id="nama" class="form-control mb-3">
                
            <table class="table mt-5">
            <thead class="bg-primary text-white fw-bold text-center">
                <tr>
                    <td>No</td>
                    <td>Nama Barang</td>
                    <td>Jenis Cuci</td>
                    <td>Harga</td>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?> 
                @forelse ($details as $detail)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $detail->jenisBarang->jenis_barang }}</td> 
                    <td>{{ $detail->jenisCuci->jenis_cuci }}</td>
                    <td>{{ $detail->harga }}</td>
                </tr>
                @empty
                @endforelse
                <tr class="text-center">
                    <td></td>
                    <td></td>
                    <td><b>Total Harga</b></td>
                    <td>
                        <input type="number" value="{{ $data['total'] }}" class="form-control bg-white" name="total" readonly>
                    </td>
                </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success shadow">Cetak Pesanan</button>
        </form>
    </div>
    
@endsection