<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mir_text extends Model
{
    //
    protected $table = 'mir_texts';
    protected $primaryKey = 'mid';
    public $timestamps = false;
}
