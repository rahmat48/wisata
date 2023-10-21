<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    protected $table = "pesanan";
    protected $primaryKey = "id";
    protected $fillable = ['id','id_paket','id_user','nama','notelp','tanggal','jumlah','total'];

    public function user(){
        return $this->belongsTo('App\Models\user', 'id_user');
    }
    public function pakettrip(){
        return $this->belongsTo('App\Models\pakettrip', 'id_paket');
    }
    
}
