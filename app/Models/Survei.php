<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;

    protected $table = 'surveis'; // Nama tabel di database
    protected $fillable = ['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']; // Kolom yang bisa diisi

    // Relasi: Satu survei memiliki banyak pertanyaan (One-to-Many)
    public function pertanyaan()
    {
        return $this->hasMany(PertanyaanSurvei::class, 'survei_id');
    }
}
