<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Barang extends Model
{
    use HasFactory;

    protected $table = 'jenis__barangs';

    protected $fillable = [
        'jenis_barang',
        'harga'
    ];
    
    // public function pemasukanDetail() {
    //     return $this->hasMany(Pemasukan_Detail::class, );
    // }
}
