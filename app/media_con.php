<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class media_con extends Model
{
    /**
     * 站内素材表
     */
    protected $table = 'media_cons';
    protected $primaryKey = 'mid';
    public $timestamps = false;
}
