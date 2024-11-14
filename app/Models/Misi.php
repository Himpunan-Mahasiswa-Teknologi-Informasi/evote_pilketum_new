<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;

    protected $table = 'misis';

    protected $primaryKey = 'id_misi';

    protected $fillable = [
        'id_paslon',
        'misi'
    ];

    public function paslon()
    {
        return $this->belongsTo(Paslon::class, 'id_paslon');
    }
}
