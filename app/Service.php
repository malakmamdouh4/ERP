<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'image', 'title' ,'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at' 
    ];

    
    public function imageLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->image != '') {
            $image = asset('uploads/services/'.$this->id.'/'.$this->image);
        }

        return $image;
    }
}
