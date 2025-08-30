<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';

    protected $primaryKey = 'GolID';
    public $incrementing = true;

    protected $fillable = [
        'NamaGolongan',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'GolID');
    }
}
