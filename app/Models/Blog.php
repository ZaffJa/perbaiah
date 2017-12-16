<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model 
{

    protected $table = 'blogs';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'content', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}