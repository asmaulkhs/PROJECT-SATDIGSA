<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tujuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function surat(){
        return $this->hasMany(surat::class);
    }
}
