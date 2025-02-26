<div  class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>

       <div class="row">
           @foreach ($rooms as $room)
           <div class="col-md-4 col-sm-6">
               <div id="serv_hover"  class="room">
                   <div class="room_img">
                       <figure><img style="height: 200px" src="/room/{{$room->image}}" alt="#"/></figure>
                    </div>
                    <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <h5>${{$room->price}}</h5>
                        <p>{!! Str::limit($room->description,70) !!}</p>
                        <a class="btn btn-info mt-2" href="{{url('room_details',$room->id)}}">More..</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Render Pagination Links -->
<div>
    {{ $rooms->links() }}
</div>
          </div>
    </div>
 </div>