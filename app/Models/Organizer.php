<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'description'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
