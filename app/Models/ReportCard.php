<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCard extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'sekolah', 'ttd_pengasuh', 'santri_id'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
