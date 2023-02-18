<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Barang;
use Illuminate\Http\Request;

class JenisBarangTableController extends Controller
{

    public function index() {
        $jenis_barang = Jenis_Barang::get();

        return view('pages.layanan', compact('jenis_barang'));
    }

    public function store(Request $request) {
        
        $request->validate([
            'jenis_barang' => 'required',
            'harga' => 'required'
        ]);

        Jenis_Barang::create([
            'jenis_barang' => $request->jenis_barang,
            'harga' => $request->harga
        ]);
        
        return redirect()->route('layanan.index')->with(['success' => 'Berhasil Menambahkan Data']);

    }

    public function update(Request $request, Jenis_Barang $jenis) {

        $request->validate([
            'jenis_barang' => 'required',
            'harga' => 'required'
        ]);

        $jenis->update($request->all());

    }

    public function destroy($id) {

        $jenis = Jenis_Barang::findOrFail($id);
        $jenis->delete();

        if($jenis) {
            return redirect()->route('layanan.index')->with(['success' => 'Berhasil Menghapus Layanan']);
        } else {
            return redirect()->route('layanan.index')->with(['error' => 'Gagal Menghapus Layanan']);
        }

    }

}
