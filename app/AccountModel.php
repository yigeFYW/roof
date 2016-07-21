<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    //
    protected $table = 'accounts';
    protected $primaryKey = 'aid';
    public $timestamps = false;
}
