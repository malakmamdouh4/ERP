<?php

namespace App\Http\Controllers\admin;

use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\users\CreateUser;
use App\Client;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Response ;

class ClientUsersController extends Controller
{
    
    public function index()
    {
        $clients = Client::orderBy('id','desc')->paginate(25);
        return view('AdminPanel.clients.index',[
            'active' => 'clientUsers',
            'title' => trans('common.Clients'),
            'clients' => $clients,
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.Clients')
                ]
            ]
        ]);
    }


    public function blockAction($id,$action)
    {
        $update = User::find(auth()->user()->id)->update(['block'=>$action]);
        if ($update) {
            return redirect()->back()
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
    }
    

    public function create()
    {
        $works = Activity::get()->pluck('name','id');

        return view('AdminPanel.clients.create',[
            'active' => 'clientUsers',
            'title' => trans('common.Clients'),
            'works' => $works ,
            'breadcrumbs' => [
                                [
                                    'url' => route('admin.clientUsers'),
                                    'text' => trans('common.Clients')
                                ],
                                [
                                    'url' => '',
                                    'text' => trans('common.CreateNew')
                                ]
                            ]
        ]);
    }


    public function store(CreateUser $request)
    {
        $data = $request->all();
    
        $client = Client::create($data);
        if ($client) {
            return redirect()->route('admin.clientUsers')
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
        
    }
    

    public function edit($id)
    {
        $client = Client::find($id);
        $works = Activity::get()->pluck('name','id');

        return view('AdminPanel.clients.edit',[
            'active' => 'clientUsers',
            'title' => trans('common.Clients'),
            'client' => $client,
            'works' => $works ,
            'breadcrumbs' => [
                                [
                                    'url' => route('admin.clientUsers'),
                                    'text' => trans('common.Clients')
                                ],
                                [
                                    'url' => '',
                                    'text' => trans('common.Edit').': '.$client->name
                                ]
                            ]
        ]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $update = Client::find($id)->update($data);
        if ($update) {
            return redirect()->route('admin.clientUsers')
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
        
    }

    
    public function delete($id)
    {
        $client = Client::find($id);
        if ($client->delete()) {
            return Response::json($id);
        }
        return Response::json("false");
    }


    public function filterClients()
    {
        $clients = Client::orderBy('id','desc');


        if (isset($_GET['work'])) {
            if ($_GET['work'] != '') {
                $clients = $clients->where('activity',$_GET['work']);
            }
        }

        if (isset($_GET['status'])) {
            if ($_GET['status'] != '') {
                $clients = $clients->where('status',$_GET['status']);
            }
        }
        if (isset($_GET['from_date'])) {
            if ($_GET['from_date'] != '') {
                $clients = $clients->where('created_at_str','>=',strtotime($_GET['from_date']));
            }
        }
        if (isset($_GET['to_date'])) {
            if ($_GET['to_date'] != '') {
                $clients = $clients->where('created_at_str','<=',strtotime($_GET['to_date']));
            }
        }
        $clients = $clients->paginate(20);
        return view('AdminPanel.clients.index', [
            'title' => trans('common.clients'),
            'active' => 'clients',
            'clients' => $clients,
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.clients')
                ]
            ]
        ]);
    }
}
