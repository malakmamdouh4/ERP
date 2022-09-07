<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partener extends Model
{
    protected $fillable = [
        'image', 'name' 
    ];

    protected $hidden = [
        'created_at', 'updated_at' 
    ];

    public function imagePartenerLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->image != '') {
            $image = asset('uploads/parteners/'.$this->id.'/'.$this->image);
        }

        return $image;
    }

}
