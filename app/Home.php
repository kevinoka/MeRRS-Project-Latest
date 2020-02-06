<?php

namespace MeRRS;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = "request";

    protected $fillable = ['title', 'start', 'end'];

}

