<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis_pesanan;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['id','nama_pemesan','tanggal','no_transaksi','total_jumlah','total_harga','creatde_at','updated_at'];

    public function jenis_pesanan()
    {
        return $this->hasMany(jenis_pesanan::class, 'id_pesanan', 'id');
    }

   
}
