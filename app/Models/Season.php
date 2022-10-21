<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use HasFactory, SoftDeletes;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function serie() {
        return $this->belongsTo(Serie::class);
    }
    public function episodes() {
        return $this->hasMany(Episode::class);
    }
}
