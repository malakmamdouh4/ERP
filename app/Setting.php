<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    

    protected $fillable = [
        'key',
        'value',
    ];

    // protected $casts = [
    //     'values' => 'array'
    // ];

    public function client()
    {
        return $this->hasMany('App\Client','setting_id');
    }

    public function valueArray()
    {
        $arr = [];
        if ($this->value != '') {
            $arr = unserialize(base64_decode($this->value));
        }
        $final = [];
        foreach ($arr as $key => $value) {
            $final[] = [
                'name' => $value['name'],
                'photo' => $value['photo'] != '' ? asset('uploads/settings/'.$value['photo']) : ''
            ];
        }
        return $arr;
    }

}
