<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $primaryKey = 'NIP';
    public $incrementing = false; // karena NIP bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'NIP',
        'Nama',
        'TempatLahir',
        'TglLahir',
        'JenisKelamin',
        'Alamat',
        'AgamaID',
        'NoHP',
        'NPWP',
        'Foto',
        'JabatanID',
        'UnitKerjaID',
        'GolID',
        'EselonID',
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'AgamaID');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'JabatanID');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'UnitKerjaID');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'GolID');
    }

    public function eselon()
    {
        return $this->belongsTo(Eselon::class, 'EselonID');
    }
}
