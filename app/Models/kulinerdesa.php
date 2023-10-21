<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kulinerdesa extends Model
{
    use HasFactory;
    protected $table = "kulinerdesas";
    protected $primaryKey = "id";
    protected $fillable = ['id','namatempat','lokasi','jambuka','jamtutup','gambar'];

    public function pakettrip()
    {
        return $this->hasMany('App\Models\pakettrip', 'id_kuliner');
    }
}
