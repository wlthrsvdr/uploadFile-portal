<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Codes extends Model
{
	use SoftDeletes;
    protected $table = 'codes';


    public function uploads()
    {
        return $this->hasMany('App\Laravel\Models\Upload', 'code_id', 'id');
    }
}
