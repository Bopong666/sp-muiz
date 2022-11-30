<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opt extends Model
{
    protected $table = 'opt';
    protected $guarded = '';

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'basis_pengetahuan');
    }
}
