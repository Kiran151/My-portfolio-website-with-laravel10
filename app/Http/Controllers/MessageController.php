<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Notifications\MessageNotification;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Notification;

class MessageController extends Controller
{
    public function allMessages()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        $data = Message::orderBy('id', 'DESC')->get();
        return view('admin.messages.all_messages', compact('data'));
    }

    public function sendMessage(Request $request)
    {
        try {

            $user = User::where('role', 'admin')->get();
            Message::insert([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $notification = array(
                'message' => 'Message Sended Successfully',
                'alert-type' => 'success'
            );
            Notification::send($user, new MessageNotification($request));
        } catch (\Exception $e) {
        }
        return back()->with($notification);
    }

    public function deleteMessage($id)
    {
        Message::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}