<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanSurvei extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan_surveis'; // Nama tabel di database
    protected $fillable = ['survei_id', 'teks_pertanyaan', 'tipe_pertanyaan']; // Kolom yang bisa diisi

    // Relasi: Satu pertanyaan milik satu survei (Many-to-One)
    public function survei()
    {
        return $this->belongsTo(Survei::class, 'survei_id');
    }
}

