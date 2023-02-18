<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Cuci;
use Illuminate\Http\Request;

class JenisCuciTableController extends Controller
{

    public function index() {
        $jenis = Jenis_Cuci::get();

        return view('pages.layanan', compact('jenis'));
    }

    public function store(Request $request) {

        $request->validate([
            'janis_cuci' => 'required',
            'harga' => 'required'
        ]);

        Jenis_Cuci::create($request->all());

    }

    public function update(Request $request, Jenis_Cuci $jenis) {

        $request->validate([
            'janis_cuci' => 'required',
            'harga' => 'required'
        ]);

        $jenis->update($request->all());

    }

    public function destroy(Jenis_Cuci $jenis) {

        $jenis->delete();

    }
}
