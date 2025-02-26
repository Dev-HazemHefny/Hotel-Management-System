<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    {{-- @include('admin.body')
     --}}
     <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="text-center mb-4">Booking List</h2>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Room id</th>
                        <th>User id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Room Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Arrival Date</th>
                        <th>Leaving Date</th>
                        <th>Delete</th>
                        <th>Change Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$booking->room_id}}</td>
                        <td>{{$booking->user_id}}</td>
                        <td>{{$booking->name}}</td>
                        <td>{{$booking->email}}</td>
                        <td>{{$booking->phone}}</td>
                        <td>{{$booking->room->room_title}}</td>
                        <td>${{$booking->room->price}}</td>
                        <td>
                            @if($booking->status == 'waiting')
                                <span style="font-size: 17px" class="badge badge-warning mt-4 p-2">{{ucfirst($booking->status)}}</span>
                            @elseif($booking->status == 'approved')
                                <span  style="font-size: 17px" class="badge badge-success mt-4 p-2">{{ucfirst($booking->status)}}</span>
                            @else
                                <span  style="font-size: 17px" class="badge badge-danger mt-4 p-2">{{ucfirst($booking->status)}}</span>
                            @endif
                        </td>
                        <td>{{$booking->start_date}}</td>
                        <td>{{$booking->end_date}}</td>
                        <td>
                            <a class="btn btn-danger mt-4" href="{{url('delete_booking',$booking->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success mb-3 " href="{{url('approve_booking',$booking->id)}}">Approve</a>
                            <a class="btn btn-warning px-3" href="{{url('cancel_booking',$booking->id)}}">Cancel</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          </div>
          </div>
    @include('admin.footer')
  </body>
</html>