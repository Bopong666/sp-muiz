<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';
    protected $guarded = '';

    public function opt()
    {
        return $this->belongsToMany(Opt::class, 'basis_pengetahuan');
    }
}
