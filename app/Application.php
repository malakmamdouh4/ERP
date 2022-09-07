<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'image', 'title' ,'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at' 
    ];
    
    public function imageApplicationLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->image != '') {
            $image = asset('uploads/applications/'.$this->id.'/'.$this->image);
        }

        return $image;
    }
}
