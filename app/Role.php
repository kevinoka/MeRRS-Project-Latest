<?php

namespace MeRRS;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany('MeRRS\User');
    }
}
