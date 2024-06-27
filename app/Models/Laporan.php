<?php

namespace App\Models;

use App\Models\User;

use App\Models\Dokumen;
use App\Models\BuktiDokumen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class);
    }

    public function buktidokumen()
    {
        return $this->hasMany(BuktiDokumen::class);
    }
}
