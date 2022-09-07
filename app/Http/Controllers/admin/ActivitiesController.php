<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\activity\CreateActivity;
use Illuminate\Support\Facades\Response;

class ActivitiesController extends Controller
{
    

    // shaw all activities
    public function index()
    {
        $activities = Activity::orderBy('id','desc')->paginate(25);
        return view('AdminPanel.activities.index',[
            'active' => 'activities',
            'title' => trans('common.Activities'),
            'activities' => $activities,
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.Activities')
                ]
            ]
        ]);

    }

    
    // create new activity
    public function store(CreateActivity $request)
    {
        $data = $request->all();
    
        $activity = Activity::create($data);
        if ($activity) {
            return redirect()->route('admin.activities')
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
        
    }

    
    // update activity
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $update = Activity::find($id)->update($data);
        if ($update) {
            return redirect()->route('admin.activities')
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
        
    }


    // delete activity
    public function delete($id)
    {
        $activity = Activity::find($id);
        if ($activity->delete()) {
            return Response::json($id);
        }
        return Response::json("false");
    }


}
