<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   protected $table="users";
    protected $primaryKey="id_user";
    public $timestamps=false;
    protected $fillable=['id_user','login','password','firstname','lastname','age','gender','address','phone','id_region','role','form'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function questions() 
    { 
        return $this->belongsToMany(Question::class); 
    } 
}
