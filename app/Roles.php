<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table ='roles';
    protected $primaryKey = "id";
    public $timestamps = false;
}
