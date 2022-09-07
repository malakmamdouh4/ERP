<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Setting ;
use App\User ;
use Illuminate\Http\Request;
use Response;

class SettingsController extends Controller
{
    public function generalSettings()
    {
        $settings = Setting::get()->keyBy('key')->where('type','demo')->all();
        $clients = Setting::where('key','clients')->first();
        return view('AdminPanel.settings.index',
            [
                'title' => trans('common.setting'),
                'active' => 'setting',
                'settings' => $settings,
                'clients' => $clients,

            ]);
    } 
    

    public function editSettings($id)
    {

        $setting = Setting::find($id);
       
        return view('AdminPanel.settings.edit',
        [
            'title' => 'Edit Demo',
            'setting' => $setting ,
        ]);
    }
 

    public function updateSettings(Request $request)
    {
        $this->validate($request, [   
            'facebook'=> 'nullable',
            'mail'=> 'nullable',
            'twitter'=> 'nullable',
            'marketer'=> 'nullable',
            'companies'=> 'nullable',
            'training'=> 'nullable',
            'demoLink1'=> 'nullable',
            'demoLink2'=> 'nullable',
            'demoLink3'=> 'nullable',
            'demoUserName1'=> 'nullable',
            'demoUserName2'=> 'nullable',
            'demoUserName3'=> 'nullable',
        ]);


        //foreach inputs which is text ant textarea
        foreach ($_POST as $key => $value) {
            $setting = Setting::where('key', $key)->first();

            if (!in_array($key,['_token','clients','clientsPhotos'])) {
                $setting = Setting::where('key', $key)->first();
                if ($setting == '') {
                    $setting = New Setting;
                    $setting->key = $key;
                    $setting->value = $value;
                    $setting->save();
                }
                $setting->value = $value;
                $setting->update();
            }

        }
        

        if (!isset($request['closeSite'])) {
            $setting = Setting::where('key', 'closeSite')->first();
            if ($setting == '') {
                $setting = New Setting;
                $setting->key = 'closeSite';
                $setting->save();
            }
            $setting->value = '0';
            $setting->update();
        }



        //foreach inputs which is file
        foreach ($_FILES as $key => $value) {
            //if thier was a file uploaded with in the post
            if ($key != 'clientsPhotos') {
                if ($request->hasFile($key)) {
                    $FileExt = $request->$key->extension();

                    //check if thier was an old file
                    $countvalue = Setting::where('key', $key)->count();
                    if ($countvalue > 0) {

                        $EditOldFile = Setting::where('key', $key)->first();
                        //delete old file and upload the new file

                        delete_image('settings' , $EditOldFile->value);
                        $file = upload_image_without_resize('settings' , $request->$key );

                        $EditOldFile->value = $file;
                        $EditOldFile->save();

                    } else {
                        $file = upload_image_without_resize('settings' , $request->$key );
                        $NewFile = New Setting;
                        $NewFile->key = $key;
                        $NewFile->value = $file;
                        $NewFile->save();
                    }
                }
            }
        }
 

        return redirect()->back()
                                ->with('success',trans('common.successMessageText'));

    }

    public function deleteSettingPhoto($key)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting != '') {
            delete_image('uploads/settings' , $setting->value);
            $setting->value = '';
            $setting->update();
        }

        session()->flash('success', trans('common.successMessageText'));
        return back();
    }

}
