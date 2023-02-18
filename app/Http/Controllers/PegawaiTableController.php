<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiTableController extends Controller
{

    public function store(Request $request) {

        $request->validate([
            'status_id' => 'required',
            'nama_pegawai' => 'required',
            'ttl' => 'required',
            'nik' => 'required',
            'alamat' => 'required'
        ]);

        Pegawai::create($request->all());

    }

    public function update(Request $request, Pegawai $pegawai) {

        $request->validate([
            'status_id' => 'required',
            'nama_pegawai' => 'required',
            'ttl' => 'required',
            'nik' => 'required',
            'alamat' => 'required'
        ]);

        $pegawai->update($request->all());

    }

    public function destroy(Pegawai $pegawai) {

        $pegawai->delete();

    }

}
