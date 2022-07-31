<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = [
        'cinima_id',
        'movie_id',
        'room_id',
        'seats',
    ];
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function slot() {
        return $this->belongsTo(Slot::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

}
