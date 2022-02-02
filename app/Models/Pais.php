<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $primaryKey = 'pais_id';

    public function Provincias()
    {
        return $this->hasMany(Province::class, 'pais_id', 'pais_id');
    }
}
