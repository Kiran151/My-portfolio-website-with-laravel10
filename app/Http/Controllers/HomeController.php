<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home()
   {
      $data = Home::first();
      return view('admin.home.home', compact('data'));
   }

   public function Updatehome(Request $request)
   {
      $id = $request->id;
      $home=Home::findOrFail($id);
      $home->title=$request->title;
      $home->subtitle=$request->subtitle;
      $image=$request->file('image');
      if($image){
         $fileName=date('YmdHis').'.'.$image->getClientOriginalExtension();
         $image->move(public_path('uploads/home'),$fileName);
         $home->background_image=$fileName;
      }
      $home->save();

      $notification = array(
         'message' => 'Home Updated successfully',
         'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
   }
}