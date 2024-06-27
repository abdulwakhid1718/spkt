<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiDokumen extends Model
{
    use HasFactory;
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
