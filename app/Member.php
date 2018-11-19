<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
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
