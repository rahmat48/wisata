<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informasidesa extends Model
{
    use HasFactory;
    protected $table = "informasidesa";
    protected $primaryKey = "id";
    protected $fillable = ['id','gambar','deskripsi','sejarah'];
}
