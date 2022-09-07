<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\parteners\CreateParteners;
use App\Partener;
use Illuminate\Support\Facades\Response;

class PartenerController extends Controller
{
      // shaw all parteners
      public function index()
      {
          $parteners = Partener::orderBy('id','desc')->paginate(25);
          
          return view('AdminPanel.parteners.index',[
              'active' => 'parteners',
              'title' => trans('common.parteners'),
              'parteners' => $parteners,
              'breadcrumbs' => [
                  [
                      'url' => '',
                      'text' => trans('common.parteners')
                  ]
              ]
          ]);
  
      }
  
      
      // create new partener
      public function store(CreateParteners $request)
      {
 
          $data = $request->all();
 
          $partener = Partener::create($data);
 
          if ($request->image != '') {
             $partener->image = upload_image_without_resize('parteners/'.$partener->id , $request->image ,true);
             $partener->update();
         }
 
          if ($partener) {
              return redirect()->route('admin.parteners')
                              ->with('success',trans('common.successMessageText'));
          } else {
              return redirect()->back()
                              ->with('faild',trans('common.faildMessageText'));
          }
          
      }
  
      
      // update partener
      public function update(Request $request, $id)
      {
  
         $partener= Partener::find($id) ;
          $data = $request->all();
 
          if ($request->image != '') {
             if ($partener->image != '') {
                 delete_image('parteners/'.$id , $partener->image);
             }
             $data['image'] = upload_image_without_resize('parteners/'.$id , $request->image ,true);
         }
 
          $update = Partener::find($id)->update($data);
          if ($update) {
              return redirect()->route('admin.parteners')
                              ->with('success',trans('common.successMessageText'));
          } else {
              return redirect()->back()
                              ->with('faild',trans('common.faildMessageText'));
          }
          
      }
  
  
      // delete partener
      public function delete($id)
      {
          $partener = Partener::find($id);
          if ($partener->delete()) {
              return Response::json($id);
          }
          return Response::json("false");
      }
}
