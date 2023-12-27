<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['status','tamu','penolakan','tujuan'];

    public function scopeSearch($query, array $searches){
        $query->when($searches['search'] ?? false, function($query, $search){
            return $query->where('instansi', 'like', '%'.$search.'%')
                    ->orWhere('pengirim', 'like', '%'.$search.'%');
        });
    }

    public function status(){
        return $this->belongsTo(status::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function tamu(){
        return $this->hasOne(tamu::class);
    }
    public function penolakan(){
        return $this->hasOne(penolakan::class);
    }
    public function tujuan(){
        return $this->belongsTo(tujuan::class);
    }
}
