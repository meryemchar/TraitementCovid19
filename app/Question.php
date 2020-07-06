<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table="questions";
    public $timestamps=false;
    protected $fillable = [
        'id', 'text_qst',
    ];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function users() 
    { 
        return $this->belongsToMany(User::class); 
    }  
      public function Answer()
    {
        return $this->hasMany(Answer::class);
    } 
}
