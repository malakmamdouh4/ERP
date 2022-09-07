<?php

namespace App\Http\Controllers\admin;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\application\CreateApplication;
use Illuminate\Support\Facades\Response;

class ApplicationsController extends Controller
{
    
     // shaw all applications
     public function index()
     {
         $applications = Application::orderBy('id','desc')->paginate(25);
         
         return view('AdminPanel.applications.index',[
             'active' => 'application',
             'title' => trans('common.applications'),
             'applications' => $applications,
             'breadcrumbs' => [
                 [
                     'url' => '',
                     'text' => trans('common.applications')
                 ]
             ]
         ]);
 
     }
 
     
     // create new application
     public function store(CreateApplication $request)
     {

         $data = $request->all();

         $application = Application::create($data);

         if ($request->image != '') {
            $application->image = upload_image_without_resize('applications/'.$application->id , $request->image ,true);
            $application->update();
        }

         if ($application) {
             return redirect()->route('admin.applications')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
     
     // update application
     public function update(Request $request, $id)
     {
 
        $application= Application::find($id) ;
         $data = $request->all();

         if ($request->image != '') {
            if ($application->image != '') {
                delete_image('applications/'.$id , $application->image);
            }
            $data['image'] = upload_image_without_resize('applications/'.$id , $request->image ,true);
        }

         $update = Application::find($id)->update($data);
         if ($update) {
             return redirect()->route('admin.applications')
                             ->with('success',trans('common.successMessageText'));
         } else {
             return redirect()->back()
                             ->with('faild',trans('common.faildMessageText'));
         }
         
     }
 
 
     // delete application
     public function delete($id)
     {
         $application = Application::find($id);
         if ($application->delete()) {
             return Response::json($id);
         }
         return Response::json("false");
     }
}
