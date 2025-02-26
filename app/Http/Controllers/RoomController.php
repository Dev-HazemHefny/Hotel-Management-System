<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create_room()
    {
        return view('admin.create_room');
    }
    public function store_room(Request $request)
    {
        $room = new Room();
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;
        $room->room_status = $request->room_status;
        $image = $request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imageName);
            $room->image = $imageName;
        }
        $room->save();
        return redirect()->back()->with('message','Room added successfully');
    }
    public function view_room()
    {
        $rooms = Room::paginate(10);
        return view('admin.view_room',compact('rooms'));
    }
    public function room_delete($id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->back()->with('message','Room deleted successfully');
    }
    public function room_update($id)
    {
        $room = Room::find($id);
        return view('admin.room_update',compact('room'));
    }
    public function edit_room($id ,Request $request)
    {
        $room = Room::find($id);
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type =  $request->room_type;
        $room->room_status =  $request->room_status;
        $image = $request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imageName);
            $room->image = $imageName;
        }
        $room->save();
        return redirect()->back()->with('message','Room updated successfully');
    }



    // search function
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query\
        // Search the database
        $rooms = Room::where('room_title', 'like', "%{$query}%")
                     ->orWhere('room_type', 'like', "%{$query}%")
                     ->orWhere('room_status', 'like', "%{$query}%")
                     ->get();
        // Return a view with the search results
        return view('admin.view_room', compact('rooms' ));
    }


    public function room_available($id)
    {
        $room = Room::find($id);
        $room->room_status = 'available';
        $room->save();
        return redirect()->back();
    }
    public function room_booked($id)
    {
        $room = Room::find($id);
        $room->room_status = 'booked';
        $room->save();
        return redirect()->back();
    }
    public function  room_maintenance($id)
    {
        $room = Room::find($id);
        $room->room_status = 'maintenance';
        $room->save();
        return redirect()->back();
    }
}
