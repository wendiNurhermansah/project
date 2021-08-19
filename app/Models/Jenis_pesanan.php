<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_pesanan extends Model
{
    protected $table = 'jenis_pesanan';
    protected $fillable =['id','id_pesanan','jenis_pesanan','harga','jumlah','total','keterangan','created_at','updated_at'];

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    public function barang(){
        return $this->belongsTo(JenisBarang::class, 'jenis_pesanan');
    }
}
