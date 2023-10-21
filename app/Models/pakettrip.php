<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pakettrip extends Model
{
    protected $table = "pakettrip";
    protected $primaryKey = "id";
    protected $fillable = ['id','id_wisata','id_event','id_kuliner','deskripsi','harga'];

    public function wisata_desa(){
        return $this->belongsTo('App\Models\wisatadesa', 'id_wisata');
    }
    public function event_desa(){
        return $this->belongsTo('App\Models\eventdesa', 'id_event');
    }
    public function kuliner_desa(){
        return $this->belongsTo('App\Models\kulinerdesa', 'id_kuliner');
    }

    public function pesanan()
    {
        return $this->hasMany('App\Models\pesanan', 'id_paket');
    }
}
