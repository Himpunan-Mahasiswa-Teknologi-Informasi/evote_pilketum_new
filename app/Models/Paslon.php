<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Paslon extends Model
{
    use HasFactory;

    protected $table = 'paslons';

    protected $primaryKey = 'id_paslon';

    protected $fillable = [
        'no_urut',
        'nama',
        'prodi',
        'kelas',
        'linkedin',
        'visi',
        'foto'
    ];

    // Relasi dengan model Vote
    public function votes()
    {
        return $this->hasMany(Vote::class, 'id_paslon');
    }

    public function misis()
    {
        return $this->hasMany(Misi::class, 'id_paslon');
    }

    public static function booted()
    {
        static::saved(function ($model) {
            // Cek apakah file 'foto' diupload dan belum disimpan
            if ($model->foto instanceof UploadedFile) {
                // Simpan foto ke disk 'public' dalam folder 'photos'
                $path = $model->foto->storeAs('photos', $model->foto->getClientOriginalName(), 'public');

                // Update model dengan path file yang disimpan
                $model->update(['foto' => $path]);
            }
        });
    }
}
