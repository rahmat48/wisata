<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventdesa extends Model
{
    use HasFactory;
    protected $table = "eventdesa";
    protected $primaryKey = "id";
    protected $fillable = ['id','judul','isi','gambar','tglevent','tempat'];

    public function pakettrip()
    {
        return $this->hasMany('App\Models\pakettrip', 'id_event');
    }
}
