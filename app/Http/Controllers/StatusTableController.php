<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusTableController extends Controller
{
    
    public function store(Request $request) {

        $request->validate([
            'status_pegawai' => 'required',
            'ket' => 'required'
        ]);

        Status::create($request->all());

    }

    public function update(Request $request, Status $status) {

        $request->validate([
            'status_pegawai' => 'required',
            'ket' => 'required'
        ]);

        $status->update($request->all());

    }

    public function destroy(Status $status) {

        $status->delete();

    }

}
