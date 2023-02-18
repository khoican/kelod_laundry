<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanTableController extends Controller
{

    
    public function store(Request $request) {

        $request->validate([
            'jenis_barang_id' => 'required',
            'jenis_cuci_id' => 'required',
            'nama_pelanggan' => 'required',
            'harga' => 'required'
        ]);

        Pemasukan::create($request->all());

    }

    public function update(Request $request, Pemasukan $pemasukan) {

        $request->validate([
            'jenis_barang_id' => 'required',
            'jenis_cuci_id' => 'required',
            'nama_pelanggan' => 'required',
            'harga' => 'required'
        ]);

        $pemasukan->update($request->all());

    }

    public function destroy(Pemasukan $pemasukan) {
        $pemasukan->delete();
    }

}
