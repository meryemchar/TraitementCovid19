<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table="regions";
    public $timestamps=false;
    protected $fillable = [
        'id', 'text_region','nbr_positive',
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
