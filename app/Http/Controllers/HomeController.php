<?php

namespace App\Http\Controllers;

use App\Mail\UserEmail;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Room;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function room_details($id)
    {
        // $room = Room::findOrFail($id);
        $room = DB::table('rooms')->where('id',$id)->first();
        return view('home.room_details',compact('room'));
    }
    // public function add_booking(Request $request,$id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after:start_date',
    //     ]);
    //     $booking = new Booking();
    //     $booking->room_id = $id;
    //     $booking->user_id = Auth::user()->id;
    //     $booking->name = $request->name;
    //     $booking->email = $request->email;
    //     $booking->phone = $request->phone;
    //         //check room booking date
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;
    //     $is_booked = Booking::where('room_id',$id)
    //     ->where('start_date','<=',$end_date)
    //     ->where('end_date','>=',$start_date)->exists();
    //     if($is_booked)
    //     {
    //         return redirect()->back()->with('error','Room is already booked for this date');
    //     }
    //     else
    //     {
    //         $booking->start_date = $request->start_date;
    //         $booking->end_date = $request->end_date;
    //         $booking->save();
    //         return redirect()->back()->with('message','Room Booked Successfully');
    //     }
    // }
    // public function contact(Request $request)
    // {
    //     // $request->validate([
    //     //     'name' => 'required',
    //     //     'email' => 'required|email',
    //     //     'phone' => 'required|numeric',
    //     //     'message' => 'required|min:3',
    //     // ]);
    //     // dd($request->all());
    //     $contact = new Contact();
    //     $contact->name = $request->name;
    //     $contact->email = $request->email;
    //     $contact->phone = $request->phone;
    //     $contact->message = $request->message;
    //     $contact->save();
    //     return redirect()->back()->with('session','Message Sent Successfully');
    // }

}
