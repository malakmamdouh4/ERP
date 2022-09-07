<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\service\CreateService;
use App\Service;
use Illuminate\Support\Facades\Response;

class ServicesController extends Controller
{
    

     // shaw all services
     public function index()
     {
         $services = Service::orderBy('id','desc')->paginate(25);
         
         return view('AdminPanel.services.index',[
             'active' => 'services',
             'title' => trans('common.services'),
             'services' => $services,
             'breadcrumbs' => [
                 [
                     'url' => '',
                     'text' => trans('common.services')
                 ]
             ]
         ]);
 
     }
 
     
     // create new service
     public function store(CreateService $request)
     {

         $data = $request->all();

         $service = Service::create($data);

         if ($request->image != '') {
            $service->image = upload_image_without_resize('services/'.$service->id , $request->image ,true);
            $service->update();
        }

         if ($service) {
             return redirect()->route('admin.services')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
     
     // update service
     public function update(Request $request, $id)
     {
 
        $service= Service::find($id) ;
         $data = $request->all();

         if ($request->image != '') {
            if ($service->image != '') {
                delete_image('services/'.$id , $service->image);
            }
            $data['image'] = upload_image_without_resize('services/'.$id , $request->image ,true);
        }

         $update = Service::find($id)->update($data);
         if ($update) {
             return redirect()->route('admin.services')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
 
     // delete service
     public function delete($id)
     {
         $service = Service::find($id);
         if ($service->delete()) {
             return Response::json($id);
         }
         return Response::json("false");
     }
 
}
