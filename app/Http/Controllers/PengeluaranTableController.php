<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranTableController extends Controller
{
    
    public function store(Request $request) {

        $request->validate([
            'jenis_pengeluaran_id' => 'required',
            'pengeluaran' => 'required',
            'total_pengeluaran' => 'required',
            'ket' => 'required'
        ]);

        Pengeluaran::create($request->all());

    }

    public function update(Request $request, Pengeluaran $pengeluaran) {

        $request->validate([
            'jenis_pengeluaran_id' => 'required',
            'pengeluaran' => 'required',
            'total_pengeluaran' => 'required',
            'ket' => 'required'
        ]);

        $pengeluaran->update($request->all());

    }

    public function destroy(Pengeluaran $pengeluaran) {

        $pengeluaran->delete();

    }

}
