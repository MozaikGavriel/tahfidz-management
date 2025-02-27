<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahfidz extends Model
{
    use HasFactory;

    protected $table = 'tahfidz';

    // Atribut yang dapat diubah
    protected $fillable = [
        'tanggal',
        'waktu',
        'santri_id',
        'nama_ustadz',
        'surat',
        'ayat',
        'jumlah_juzz',
        'keterangan',
    ];

        // Relasi dengan model Santri
        public function santri()
        {
            return $this->belongsTo(Santri::class, 'santri_id');
        }
}