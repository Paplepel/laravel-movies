<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'cinima_id',
        'name',
        'seats',
    ];

    public function Cinema() {
        return $this->belongsTo(Cinema::class);
    }

    public function screening(){
        return $this->hasMany(Screening::class);
    }
}
