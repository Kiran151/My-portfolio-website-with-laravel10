<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
   public function adminDashboard()
   {

      return view('admin.index');
   }

   public function adminLogout(Request $request)
   {
      Auth::guard('web')->logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();
      $notification = array(
         'message' => 'Logout successfully',
         'alert-type' => 'info'
      );
      return redirect()->route('admin.logout.page')->with($notification);
   }

   public function adminLogin()
   {

      return view('admin.admin_login');
   }

   public function adminLogoutPage()
   {

      return view('admin.admin_logout');
   }

   public function adminProfile()
   {
      $id = Auth::user()->id;
      $adminData = User::find($id);

      return view('admin.admin_profile', compact('adminData'));
   }

   public function adminProfileUpdate(Request $request)
   {
      $id = Auth::user()->id;
      $data = User::find($id);
      $data->name = $request->name;
      $data->username = $request->username;
      $data->email = $request->email;
      $data->phone = $request->phone;

      $image = $request->file('image');
      if ($image) {
         @unlink(public_path('uploads/admin/img/' . $data->image));
         $fileName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('uploads/admin/img'), $fileName);
         $data['image'] = $fileName;
      }

      $notification = array(
         'message' => 'Admin Profile Updated successfully',
         'alert-type' => 'success'
      );
      $data->save();
      return redirect()->back()->with($notification);

   }

   public function adminChangePassword()
   {
      return view('admin.admin_change_password');
   }

   public function adminUpdatePassword(Request $request)
   {
      $request->validate([
         'old_password' => 'required',
         'confirm_password' => 'required|same:new_password',
      ]);

      if (!Hash::check($request->old_password, Auth::user()->password)) {
         return back()->with('error', 'Invalid Old Password');
      }

      User::whereId(Auth::user()->id)->update([
         'password' => Hash::make($request->new_password)
      ]);

      return back()->with('status', 'Password Updated Successfully');
   }


   public function admins()
   {
      $data = User::where('role', 'admin')->get();
      return view('admin.admins', compact('data'));
   }

   public function addAdmin($id = 0)
   {
      if ($id > 0) {
         $data = User::findOrFail($id);
         $role = Role::all();
         return view('admin.add_admin', compact('data', 'role'));
      }
      $role = Role::all();
      return view('admin.add_admin', compact('role'));
   }
   public function saveAdmin(Request $request, $id = 0)
   {

      if ($id > 0) {
         $user = User::findOrFail($id);
         $user->name = $request->name;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->save();
         $user->roles()->detach();
         if ($request->roles) {
            $user->assignRole($request->roles);
         }

      } else {
         $user = new User();
         $user->name = $request->name;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->password = Hash::make($request->password);
         $user->role = 'admin';
         $user->status = 'inactive';
         $user->created_at = date('Y-m-d');
         $user->save();
         if ($request->roles) {
            $user->assignRole($request->roles);
         }

      }


      $notification = array(
         'message' => 'Admin Updated successfully',
         'alert-type' => 'success'
      );
      return redirect('/admins/all')->with($notification);
   }

   public function deleteAdmin($id)
   {
      $user = User::findOrFail($id);
      if ($user->image) {
         unlink('uploads/admin/img/' . $user->image);
      }
      $user->delete();

      $notification = array(
         'message' => 'Admin Deleted successfully',
         'alert-type' => 'success'
      );
      return redirect('/admins/all')->with($notification);
   }

   public function activeInactiveAdmin(Request $request)
   {
      $id = $request->get('id');
      $action = $request->get('action');
      $user = User::findOrFail($id);
      if ($action == 'active') {
         $user->status = 'inactive';
      } else {
         $user->status = 'active';
      }
      $user->save();
      $data['status'] = $user->status;
      $data['id'] = $user->id;

      return $data;

   }

}