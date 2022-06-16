<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vicidial_agent_log extends Model
{
    
    protected $table = "vicidial_agent_log";
    protected $primaryKey = "agent_log_id";
    protected $connection = "ViciExterno";

}
