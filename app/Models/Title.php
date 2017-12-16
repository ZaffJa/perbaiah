<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Title extends Model 
{

    protected $table = 'titles';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}