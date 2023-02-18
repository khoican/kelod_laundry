<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Barang;
use App\Models\Jenis_Cuci;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index() {
        $barang = Jenis_Barang::get();
        $cuci = Jenis_Cuci::get();

        return view('pages.layanan', compact(['barang', 'cuci']));
    }

    public function storebarang(Request $request) {
        $request->validate([
            'jenis_barang' => 'required',
            'harga' => 'required'
        ]);

        Jenis_Barang::create([
            'jenis_barang' => $request->jenis_barang,
            'harga' => $request->harga
        ]);

        return redirect()->route('layanan');
    }

    public function storecuci(Request $request) {
        $request->validate([
            'jenis_cuci' => 'required',
            'harga' => 'required'
        ]);
        Jenis_Cuci::create([
            'jenis_cuci' => $request->jenis_cuci,
            'harga' => $request->harga
        ]);

        return redirect()->route('layanan');
    }

    public function destroybarang($id) {
        $jenis = Jenis_Barang::findOrFail($id);
        $jenis->delete();

        return redirect()->route('layanan');
    }

    public function destroycuci($id) {
        $jenis = Jenis_Cuci::findOrFail($id);
        $jenis->delete();

        return redirect()->route('layanan');
    }
}
