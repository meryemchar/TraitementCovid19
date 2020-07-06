<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table="answers";
    public $timestamps=false;
    protected $fillable = [
        'id_user', 'id_qst','answer',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
