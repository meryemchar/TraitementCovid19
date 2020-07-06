<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Docteur extends Authenticatable
{
      protected $table="docteurs";
    protected $primaryKey="id_docteur";
    public $timestamps=false;
    protected $fillable=['id_docteur','login','password','firstname','lastname','connecte'];}
