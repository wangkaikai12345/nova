<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 与作品的多对多关联
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author 王凯
     */
    public function works()
    {
        return $this->belongsToMany(Work::class);
    }
}
