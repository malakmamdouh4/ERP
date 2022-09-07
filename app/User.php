<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hisRole()
    {
        return $this->belongsTo(roles::class,'role');
    }

    public function photoLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->photo != '') {
            $image = asset('uploads/users/'.$this->id.'/'.$this->photo);
        }

        return $image;
    }
    
    public function licensePhotoLink()
    {
        $image = asset('AdminAssets/app-assets/images/portrait/small/avatar-s-11.jpg');

        if ($this->licensePhoto != '') {
            $image = asset('uploads/users/'.$this->id.'/'.$this->licensePhoto);
        }

        return $image;
    }
   
    public function apiData($lang,$details = null)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'userName' => $this->userName,
            'email' => $this->email,
            'language' => $this->language,
            'phone' => $this->phone,
            'address' => $this->address,
            'about' => $this->about,
            'photo' => $this->photoLink(),
            'country' => $this->countryData != '' ? $this->countryData->apiData($lang) : ['id'=>'','name'=>''],
            'governorate' => $this->governorateData != '' ? $this->governorateData->apiData($lang) : ['id'=>'','name'=>''],
            'city' => $this->cityData != '' ? $this->cityData->apiData($lang) : ['id'=>'','name'=>'']
        ];
        if ($details != '') {
            if ($this->publisherBooks()->count() > 0) {
                $books = $this->publisherBooks;
                $data['publisherBooks'] = [];
                foreach ($books as $key => $value) {
                    $data['publisherBooks'][] = $value->apiData($lang);
                }
            }
        }

        return $data;
    }
    

    public function checkActive()
    {
        $active = '1';
        if ($this->active == '0') {
            $active = trans('auth.yourAcountStillNotActive');
        }
        if ($this->block == '1') {
            $active = trans('auth.yourAcountIsBlocked');
        }
        return $active;
    }


}
