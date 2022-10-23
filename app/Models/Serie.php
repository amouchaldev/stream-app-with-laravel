<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use HasFactory, SoftDeletes;
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function seasons() {
        return $this->hasMany(Season::class);
    }
    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
}
