<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['name', 'description'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
