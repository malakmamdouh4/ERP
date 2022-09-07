<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'status',
        'nemployees',
        'activity',
        'created_at_str'
    ];

    public function setting()
    {
        return $this->belongsTo('App\Setting','setting_id');
    }

}
