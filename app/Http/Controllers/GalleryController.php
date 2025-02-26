<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function view_Gallery()
    {
        $galleries = Gallery::all();
        return view('admin.view_Gallery',compact('galleries'));
    }
    public function upload_gallery(Request $request)
    {
        $gallery = new Gallery();
        $image = $request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallery',$imageName);
            $gallery->image = $imageName;
        }
        $gallery->save();
        return redirect()->back()->with('session','Image uploaded successfully');
    }
    public function delete_gallery($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->back()->with('message','Image deleted successfully');
    }
}
