<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Pengeluaran;
use Illuminate\Http\Request;

class JenisPengeluaranTableController extends Controller
{
    
    public function store(Request $request) {

        $request->validate([
            'jenis_pengeluaran_id',
        ]);

        Jenis_Pengeluaran::create($request->all());

    }

    public function update(Request $request, Jenis_Pengeluaran $jenis) {

        $request->validate([
            'jenis_pengeluaran_id',
            'harga'
        ]);

        $jenis->update($request->all());

    }

    public function destroy(Jenis_Pengeluaran $jenis) {

        $jenis->delete();

    }

}
