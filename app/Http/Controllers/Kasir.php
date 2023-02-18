<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Barang;
use App\Models\Jenis_Cuci;
use App\Models\Pemasukan;
use App\Models\Pemasukan_Detail;
use Illuminate\Http\Request;

class Kasir extends Controller
{
    
    public function index() {
        $id = Pemasukan::latest()->select('id')->first()->id;

        $barang = Jenis_Barang::get();
        $cuci = Jenis_Cuci::get();
        $details = Pemasukan_Detail::where('pemasukan_id', $id)->get();

        $data = [];
        $data['total'] = Pemasukan_Detail::where('pemasukan_id', $id)->sum('harga');

        return view('pages.kasir', compact(['details', 'barang', 'cuci', 'data']));

    }

    public function store_pemasukan_detail(Request $request) {

        $request->validate([
            'jenis_barang' => 'required',
            'jenis_cuci' => 'required',
            'berat' => 'required'
        ]);

        $hargaBarang = Jenis_Barang::select('harga')->find($request->jenis_barang)->harga;
        $hargaCuci = Jenis_Cuci::select('harga')->find($request->jenis_cuci)->harga;

        $harga = ($hargaBarang + $hargaCuci) * $request->berat;

        $pemasukan = Pemasukan::select('status')->latest('id')->first()->status;
        $pemasukanId = Pemasukan::select('id')->latest('id')->first()->id;

        if($pemasukan == 0) {

            Pemasukan_Detail::create([
                'pemasukan_id' => $pemasukanId,
                'jenis__barang_id' => $request->jenis_barang,
                'jenis__cuci_id' => $request->jenis_cuci,
                'harga' => $harga
            ]);

            return redirect()->route('home');
            
        } else if ($pemasukan == 0 || $pemasukan == null) {

            Pemasukan::create([
                'nama_pelanggan' => 'Admin',
                'total_harga' => 1.0,
                'status' => false
            ]);

            Pemasukan_Detail::create([
                'pemasukkan_id' => Pemasukan::latest()->id,
                'jenis__barang_id' => $request->jenis_barang,
                'jenis__cuci_id' => $request->jenis_cuci,
                'harga' => $harga
            ]);
            
            return redirect()->route('home');
        }
        
    }

    public function update (Request $request) {

        $request->validate([
            'nama_pelanggan' => 'required',
            'total' => 'required'
        ]);

        $request->validate([
            'nama_pelanggan' => 'required',
            'total' => 'required'
        ]);

        $id = Pemasukan::latest()->select('id')->first()->id;

        Pemasukan::where('id', $id)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_harga' => $request->total,
            'status' => true
        ]);

        Pemasukan::create([
            'nama_pelanggan' => 'Admin',
            'total_harga' => 1.0,
            'status' => false
        ]);

        return redirect()->route('home')->with(['success' => 'Pesanan Berhasil Dibuat']);
    }
    
}
