<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vici_agent_log_local extends Model
{
    protected $table = "vicidial_agent_log";
    protected $primaryKey = "agent_log_id";
    protected $connection = "ViciPPJ";
}
