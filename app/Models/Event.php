<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'duration',
        'sport_id',
        'organizer_id',
        'description',
        'image_path'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'duration' => 'integer'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
}
