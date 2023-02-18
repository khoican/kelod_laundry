<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Cuci extends Model
{
    use HasFactory;

    protected $table = 'jenis__cucis';

    protected $fillable = [
        'jenis_cuci',
        'harga'
    ];

    // public function pemasukanDetail() {
    //     return $this->hasMany(Pemasukan_Detail::class);
    // }
}
