<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    protected $fillable = [
        'image', 'title' ,'description' ,'feature','type'
    ];


    protected $casts = [
        'feature' => 'array'
    ];

    protected $hidden = [
        'created_at', 'updated_at' 
    ];
    
    public function imageFeatureLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->image != '') {
            $image = asset('uploads/features/'.$this->id.'/'.$this->image);
        }
        return $image;
    }

    public function featureArr()
    {
        $arr = [];
        if ($this->feature != '') {
            $arr = unserialize(base64_decode($this->feature));
        }
        return $arr;
    }
}
