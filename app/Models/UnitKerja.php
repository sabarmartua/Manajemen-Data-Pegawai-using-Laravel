<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';

    protected $primaryKey = 'UnitKerjaID';
    public $incrementing = true;

    protected $fillable = [
        'NamaUnitKerja',
        'TempatTugas',
        'parent_id',
    ];

    // Relasi ke parent
    public function parent()
    {
        return $this->belongsTo(UnitKerja::class, 'parent_id');
    }

    // Relasi ke children
    public function children()
    {
        return $this->hasMany(UnitKerja::class, 'parent_id');
    }

    // Relasi ke pegawai
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'UnitKerjaID');
    }
}
