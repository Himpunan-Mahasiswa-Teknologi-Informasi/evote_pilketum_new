<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nim',
        'status_vote',
    ];

    // Relasi dengan model Vote
    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_mahasiswa');
    }
}
