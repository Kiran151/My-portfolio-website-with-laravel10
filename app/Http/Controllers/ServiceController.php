<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function allServices()
    {
        $data = Service::all();
        return view('admin.services.all_services', compact('data'));
    }

    public function addService()
    {
        return view('admin.services.add_services');
    }

    public function saveService(Request $request, $id = 0)
    {

        if ($id > 0) {
            Service::findOrFail($id)->update([
                'service' => $request->service,
                'icon' => $request->icon,
            ]);
        } else {
            Service::insert([
                'service' => $request->service,
                'icon' => $request->icon,
                'created_at' => date('Y-m-d')
            ]);
        }

        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/services/all')->with($notification);
    }

    public function editService($id)
    {
        $data = Service::findOrFail($id);
        return view('admin.services.add_services', compact('data'));
    }

    public function deleteService($id)
    {
        Service::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/services/all')->with($notification);
    }
}