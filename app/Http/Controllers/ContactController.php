<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact()
    {
        $data = Contact::find(1);
        return view('admin.contact.add_contact', compact('data'));
    }

    public function updateContact(Request $request, $id)
    {
        Contact::findOrFail($id)->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link
        ]);

        $notification = array(
            'message' => 'Contact Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}