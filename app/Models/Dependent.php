<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependent extends Model 
{

    protected $table = 'dependents';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'nama', 'tarikh_lahir', 'no_kp', 'hubungan'];

}