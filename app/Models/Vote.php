<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';

    protected $primaryKey = 'id_vote';

    protected $fillable = [
        'id_paslon',
        'id_mahasiswa',
    ];

    // Relasi dengan model Paslon
    public function paslon()
    {
        return $this->belongsTo(Paslon::class, 'id_paslon');
    }

    // Relasi dengan model Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
