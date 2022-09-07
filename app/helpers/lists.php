<?php 


function sliderList()
{

  $list = [
    [
      'image' => getSettingValue('home_slide1img') ,
      'title' => getSettingValue('home_slide1title') ,
      'description' => getSettingValue('home_slide1des'),
      ],
      [
        'image' => getSettingValue('home_slide2img') ,
        'title' => getSettingValue('home_slide2title') ,
        'description' => getSettingValue('home_slide2des'),
        ],
    ];

    return $list ;
  
}