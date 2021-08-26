<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['id','nama_pemesan','tanggal','no_transaksi','total_jumlah','total_harga','creatde_at','updated_at'];

   
}
