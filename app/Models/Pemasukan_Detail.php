<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan_Detail extends Model
{
    use HasFactory;

    protected $table = 'pemasukan__details';

    protected $fillable = [
        'pemasukan_id',
        'jenis__barang_id',
        'jenis__cuci_id',
        'harga'
    ];

    public function jenisBarang() {
        return $this->belongsTo(Jenis_Barang::class, 'jenis__barang_id', 'id');
    }

    public function jenisCuci() {
        return $this->belongsTo(Jenis_Cuci::class, 'jenis__cuci_id', 'id');
    }
}
