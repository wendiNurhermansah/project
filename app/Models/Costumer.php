<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kabupaten;
use App\Models\Provinsi;


class Costumer extends Model
{
    protected $table = 'costumers';
    protected $fillable = ['id','nama','alamat','provinsi','kabupaten','kecamatan','kelurahan','no_telepon','no_pic','created_at','updated_at'];

    public function kec(){
        return $this->belongsTo(kecamatan::class, 'kecamatan');
    }
    public function kel(){
        return $this->belongsTo(kelurahan::class, 'kelurahan');
    }
    public function kab(){
        return $this->belongsTo(kabupaten::class, 'kabupaten');
    }
    public function prov(){
        return $this->belongsTo(provinsi::class, 'provinsi');
    }       
}
