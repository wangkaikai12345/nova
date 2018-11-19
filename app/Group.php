<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $casts = [
        'end_time' => 'datetime'
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
