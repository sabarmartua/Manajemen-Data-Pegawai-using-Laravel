<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $primaryKey = 'JabatanID';
    public $incrementing = true;

    protected $fillable = [
        'NamaJabatan',
    ];

    // Relasi ke pegawai
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'JabatanID');
    }
}
