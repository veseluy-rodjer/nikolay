<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogModel;

class IpModel extends Model
{
    protected $table = 'ips';

    public function blogs()
    {
        return $this->belongsTo('App\Models\BlogModel');
    }    
}
