<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $table = 'jenis_barang';
    protected $fillable = ['id','nama_barang','harga_beli','harga_jual','status','created_at','updated_at'];
}
