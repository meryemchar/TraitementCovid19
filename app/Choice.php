<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
   protected $table="choices";
    public $timestamps=false;
    protected $fillable = [
        'id', 'text_choice','id_qst',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
