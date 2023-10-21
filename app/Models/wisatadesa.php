<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisatadesa extends Model
{
    use HasFactory;

    protected $table = "wisatadesa";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama'];

    public function pakettrip()
    {
        return $this->hasMany('App\Models\pakettrip', 'id_wisata');
    }
}
