<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use SoftDeletes;

    protected $table = 'users';
    protected $dates = ['deleted_at', 'tarikh_daftar', 'tarikh_daftar_diterima'];
    public $timestamps = true;
    protected $fillable = [
        'no_ahli', 'nama', 'emel', 'no_kp', 'alamat', 'poskod', 'no_tel', 'no_tel_rumah', 'title_id', 'job_id', 'state_id',
        'tarikh_daftar', 'tarikh_daftar_diterima', 'keputusan', 'kata_laluan', 'gambar_ahli', 'serahan_sijil', 'kad_ahli',
        'yuran_kad_ahli', 'yuran_masuk', 'yuran_tabung_khairat', 'serahan_kad_ahli'
    ];
    
    protected $hidden = [
        'kata_laluan', 'remember_token',
    ];

    const ADMIN = 1;
    const USER = 2;

    public function dependents()
    {
        return $this->hasMany('App\Models\Dependent');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function is($role)
    {
        $roleId = $role == 'admin' ? self::ADMIN : self::USER;

        if($this->role == $roleId) return true;

        return false;
    }

    public function chats()
    {
        return $this->hasMany('App\Models\Chat', 'sender_id');
    }

    static function getNoAhli () {
        $latestId = User::latest()->first()->no_ahli;
        
        $justId = substr($latestId, 6);
        $currentYear = (int)date('y');
        $newId = sprintf("%05s", (int)$justId + 1);
        $newNoAhli = "PM $currentYear-$newId";

        return $latestId;
    }

}