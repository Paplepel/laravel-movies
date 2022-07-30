<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    public function room() {
        return $this->hasMany(Room::class);
    }

    public function screening(){
        return $this->hasMany(Screening::class);
    }
}
