<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{
    public function bookings()
    {
        $bookings = Booking::with('room','user')->get();
           // Solve N+1 problem
        // $bookings->load('room');
        // $bookings->load('user');

        return view('admin.booking',compact('bookings'));
    }
    public function delete_booking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->back()->with('message','Booking deleted successfully');
    }
    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approved';
        $booking->save();
        return redirect()->back()->with('message','Booking approved successfully');
    }
    public function cancel_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('message','Booking cancelled successfully');
    }

    public function add_booking(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        $booking = new Booking();
        $booking->room_id = $id;
        $booking->user_id = Auth::user()->id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
            //check room booking date
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $is_booked = Booking::where('room_id',$id)
        ->where('start_date','<=',$end_date)
        ->where('end_date','>=',$start_date)->exists();
        if($is_booked)
        {
            return redirect()->back()->with('error','Room is already booked for this date');
        }
        else
        {
            $booking->start_date = $request->start_date;
            $booking->end_date = $request->end_date;
            $booking->save();
            return redirect()->back()->with('message','Room Booked Successfully');
        }
    }

}
