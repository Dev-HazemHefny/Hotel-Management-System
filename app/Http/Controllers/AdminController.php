<?php
namespace App\Http\Controllers;

use App\Mail\CustomEmail;
use App\Mail\UserEmail;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $usertype = Auth::user()->usertype;
            if($usertype == 'user'){
                $rooms = DB::table('rooms')->paginate(9);
                $galleries = DB::table('galleries')->get();
                return view('home.index',compact('rooms','galleries'));
        }
       else if($usertype == 'admin'){
        $room_count = DB::table('rooms')->count();
        $available_rooms = DB::table('rooms')->where('room_status','available')->count();
        $Bookings_count = DB::table('bookings')->count();
        $messages_count = DB::table('contacts')->count();
        return view('admin.index',compact('room_count','available_rooms','Bookings_count','messages_count'));
    }
    else{
        return redirect()->back();
    }
    }
    }
    public function home()
    {
    //     $rooms = Room::all();
    //     $galleries = Gallery::all();

            $rooms = DB::table('rooms')->paginate(9);
            $galleries = DB::table('galleries')->get();
        return view('home.index',compact('rooms','galleries'));
    }
    // public function create_room()
    // {
    //     return view('admin.create_room');
    // }
    // public function store_room(Request $request)
    // {
    //     $room = new Room();
    //     $room->room_title = $request->room_title;
    //     $room->description = $request->description;
    //     $room->price = $request->price;
    //     $room->wifi = $request->wifi;
    //     $room->room_type = $request->room_type;
    //     $room->room_status = $request->room_status;
    //     $image = $request->image;
    //     if($image)
    //     {
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $request->image->move('room',$imageName);
    //         $room->image = $imageName;
    //     }
    //     $room->save();
    //     return redirect()->back()->with('message','Room added successfully');
    // }
    // public function view_room()
    // {
    //     $rooms = Room::all();
    //     // $rooms = Room::paginate(10);

    //     return view('admin.view_room',compact('rooms'));
    // }
    // public function room_delete($id)
    // {
    //     $room = Room::find($id);
    //     $room->delete();
    //     return redirect()->back()->with('message','Room deleted successfully');
    // }
    // public function room_update($id)
    // {
    //     $room = Room::find($id);
    //     return view('admin.room_update',compact('room'));
    // }
    // public function edit_room($id ,Request $request)
    // {
    //     $room = Room::find($id);
    //     $room->room_title = $request->title;
    //     $room->description = $request->description;
    //     $room->price = $request->price;
    //     $room->wifi = $request->wifi;
    //     $room->room_type =  $request->room_type;
    //     $room->room_status =  $request->room_status;
    //     $image = $request->image;
    //     if($image)
    //     {
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $request->image->move('room',$imageName);
    //         $room->image = $imageName;
    //     }
    //     $room->save();
    //     return redirect()->back()->with('message','Room updated successfully');
    // }



    // // search function
    // public function search(Request $request)
    // {
    //     $query = $request->input('query'); // Get the search query\
    //     // Search the database
    //     $rooms = Room::where('room_title', 'like', "%{$query}%")
    //                  ->orWhere('room_type', 'like', "%{$query}%")
    //                  ->orWhere('room_status', 'like', "%{$query}%")
    //                  ->get();
    //     // Return a view with the search results
    //     return view('admin.view_room', compact('rooms' ));
    // }
    // public function bookings()
    // {
    //     $bookings = Booking::all();
    //     return view('admin.booking',compact('bookings'));
    // }
    // public function delete_booking($id)
    // {
    //     $booking = Booking::find($id);
    //     $booking->delete();
    //     return redirect()->back()->with('message','Booking deleted successfully');
    // }
    // public function approve_booking($id)
    // {
    //     $booking = Booking::find($id);
    //     $booking->status = 'approved';
    //     $booking->save();
    //     return redirect()->back()->with('message','Booking approved successfully');
    // }
    // public function cancel_booking($id)
    // {
    //     $booking = Booking::find($id);
    //     $booking->status = 'cancelled';
    //     $booking->save();
    //     return redirect()->back()->with('message','Booking cancelled successfully');
    // }
    // public function room_available($id)
    // {
    //     $room = Room::find($id);
    //     $room->room_status = 'available';
    //     $room->save();
    //     return redirect()->back();
    // }
    // public function room_booked($id)
    // {
    //     $room = Room::find($id);
    //     $room->room_status = 'booked';
    //     $room->save();
    //     return redirect()->back();
    // }
    // public function  room_maintenance($id)
    // {
    //     $room = Room::find($id);
    //     $room->room_status = 'maintenance';
    //     $room->save();
    //     return redirect()->back();
    // }
    // public function view_Gallery()
    // {
    //     $galleries = Gallery::all();
    //     return view('admin.view_Gallery',compact('galleries'));
    // }
    // public function upload_gallery(Request $request)
    // {
    //     $gallery = new Gallery();
    //     $image = $request->image;
    //     if($image)
    //     {
    //         $imageName = time().'.'.$image->getClientOriginalExtension();
    //         $request->image->move('gallery',$imageName);
    //         $gallery->image = $imageName;
    //     }
    //     $gallery->save();
    //     return redirect()->back()->with('session','Image uploaded successfully');
    // }
    // public function delete_gallery($id)
    // {
    //     $gallery = Gallery::find($id);
    //     $gallery->delete();
    //     return redirect()->back()->with('message','Image deleted successfully');
    // }
    public function all_messages()
    {
        $messages = DB::table('contacts')->get();
        return view('admin.all_messages',compact('messages'));
    }
    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail',compact('data'));
    }
    public function mail(Request $request,$id)
    {
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline'=>$request->endline,
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back();
    }
}