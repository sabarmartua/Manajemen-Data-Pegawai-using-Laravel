<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eselon extends Model
{
    use HasFactory;

    protected $table = 'eselon';

    protected $primaryKey = 'EselonID';
    public $incrementing = true;

    protected $fillable = [
        'NamaEselon',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'EselonID');
    }
}
