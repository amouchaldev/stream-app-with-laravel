<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use HasFactory, SoftDeletes;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function season() {
        $this->belongsTo(Season::class);
    }
    public function streams() {
        return $this->hasMany(Stream::class);
    }
    public function downloads() {
        return $this->hasMany(Download::class);
    }
}
