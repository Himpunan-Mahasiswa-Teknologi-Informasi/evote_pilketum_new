<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';

    protected $primaryKey = 'id_pengalaman';

    protected $fillable = [
        'judul',
        'deskripsi',
        'jenis',
        'id_cake',
    ];

    // Relasi dengan model Cake
    public function cake()
    {
        return $this->belongsTo(Cake::class, 'id_cake');
    }
}
