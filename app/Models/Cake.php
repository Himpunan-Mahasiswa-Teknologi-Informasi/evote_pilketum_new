<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $table = 'cakes';

    protected $primaryKey = 'id_cake';

    protected $fillable = [
        'nama',
        'foto',
        'deskripsi',
        'prodi',
        'kelas',
        'id_paslon',
    ];

    // Relasi dengan model Paslon
    public function paslon()
    {
        return $this->belongsTo(Paslon::class, 'id_paslon');
    }

    // Relasi dengan model Pengalaman
    public function pengalamans()
    {
        return $this->hasMany(Pengalaman::class, 'id_cake');
    }
}
