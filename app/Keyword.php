<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    //
    protected $table = 'keywords';
    protected $primaryKey = 'kid';
    public $timestamps = false;
}
