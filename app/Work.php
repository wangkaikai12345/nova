<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $casts = [
        'end_time' => 'datetime'
    ];

    /**
     * 组关联
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author 王凯
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * 成员关联
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author 王凯
     */
    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
