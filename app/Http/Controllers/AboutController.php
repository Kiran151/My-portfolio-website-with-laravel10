<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $data = About::first();
        return view('admin.about.about',compact('data'));
    }

    public function updateAbout(Request $request)
    {
      $id=$request->id;
      $about=About::findOrFail($id);
      $image=$request->file('image');
      if($image){
        $fileName=date('YmdHis').'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/about'),$fileName);
        $about->image=$fileName;
      }
      $about->name=$request->name;
      $about->profile=$request->profile;
      $about->phone=$request->phone;
      $about->email=$request->email;
      $about->description=$request->description;

      $about->save();

      $notification = array(
        'message' => 'About Updated successfully',
        'alert-type' => 'success'
     );
      return back()->with($notification);
    }
}