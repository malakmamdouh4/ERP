<?php

namespace App\Http\Controllers\admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\feature\CreateFeature;
use Illuminate\Support\Facades\Response;

class FeaturesController extends Controller
{
    
     // shaw all services
     public function index()
     {
         $features = Feature::orderBy('id','desc')->paginate(25);
         
         return view('AdminPanel.features.index',[
             'active' => 'features',
             'title' => trans('common.features'),
             'features' => $features,
             'breadcrumbs' => [
                 [
                     'url' => '',
                     'text' => trans('common.features')
                 ]
             ]
         ]);
 
     }
 
     
     // create new service
     public function store(CreateFeature $request)
     {

        $arr = [];
        if (count($request->featuresIcon) > 0) {
            for ($i=0; $i<count($request->featuresIcon);$i++) {
                if ($request['featuresIcon'][$i] != '' && $request['featuresTitle'][$i] != '') {
                    $arr[] = [
                        'icon' => $request['featuresIcon'][$i],
                        'title' => $request['featuresTitle'][$i]
                    ];
                }
            }
        }
        
        $data = $request->except(['_token','featuresIcon','featuresTitle']);
        $data['feature'] = count($arr) > 0 ? base64_encode(serialize($arr)) : '';

        $features = Feature::create($data);

        if ($request->image != '') {
            $features->image = upload_image_without_resize('features/'.$features->id , $request->image ,true);
            $features->update();
        }

         if ($features) {
             return redirect()->route('admin.features')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
     
     // update service
     public function update(Request $request, $id)
     {
        
        $arr = [];
        if (count($request->featuresIcon) > 0) {
            for ($i=0; $i<count($request->featuresIcon);$i++) {
                if ($request['featuresIcon'][$i] != '' && $request['featuresTitle'][$i] != '') {
                    $arr[] = [
                        'icon' => $request['featuresIcon'][$i],
                        'title' => $request['featuresTitle'][$i]
                    ];
                }
            }
        }
        $features= Feature::find($id) ;
         $data = $request->all();

         if ($request->image != '') {
            if ($features->image != '') {
                delete_image('features/'.$id , $features->image);
            }
            $data['image'] = upload_image_without_resize('features/'.$id , $request->image ,true);
        }
        $data['feature'] = count($arr) > 0 ? base64_encode(serialize($arr)) : '';

         $update = Feature::find($id)->update($data);
         if ($update) {
             return redirect()->route('admin.features')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
        // return $features['feature'][0]['name'];
     }
 
 
     // delete service
     public function delete($id)
     {
         $feature = Feature::find($id);
         if ($feature->delete()) {
             return Response::json($id);
         }
         return Response::json("false");
     }


}
