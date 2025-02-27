<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Santri;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santris';
    protected $fillable = [
        'nis',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'asal',
        'kategori',
        'sekolah',
        'kelas',
        'alamat',
        'no_hp',
        'email',
        'foto',
        'wali_nama', 
        'wali_no_hp', 
        'wali_alamat',
    ];

//     public function wali()
// {
//     return $this->hasMany(Tahfidz::class, 'santri_id');
// }

public function whatsapps()
{
    return $this->hasMany(Whatsapp::class, 'santri_id');
}

public function parent()
{
    return $this->belongsTo(Parent::class);
}

public function tahfidz()
{
    return $this->hasMany(Tahfidz::class);
}
}
