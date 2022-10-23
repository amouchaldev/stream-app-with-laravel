<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function streams() {
        return $this->hasMany(Stream::class);
    }
    public function downloads() {
        return $this->hasMany(Download::class);
    }
    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
}
