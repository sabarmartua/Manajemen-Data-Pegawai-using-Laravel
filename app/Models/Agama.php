<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'agama';

    protected $primaryKey = 'AgamaID';
    public $incrementing = true;

    protected $fillable = [
        'NamaAgama',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'AgamaID');
    }
}
