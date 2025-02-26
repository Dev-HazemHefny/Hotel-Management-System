<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="container mt-5">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search..." required>
                    <br>
                    <button class="btn btn-light" type="submit">Search</button>
                </form>
                <h2 class="text-center mb-4">Room List</h2>
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Room Name</th>
                            <th>Room Type</th>
                            <th>Price</th>
                            <th>Room Status</th>
                            <th>Change Room Status</th>
                            <th>Wifi</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room->room_title }}</td>
                                <td>{{ ucfirst($room->room_type) }}</td>
                                <td>${{ number_format($room->price, 2) }}</td>
                                <td>
                                    @if($room->room_status == 'available')
                                        <span style="font-size: 17px" class="badge badge-success  mt-4 p-2">{{ ucfirst($room->room_status) }}</span>
                                    @elseif($room->room_status == 'booked')
                                        <span style="font-size: 17px" class="badge badge-warning mt-4 p-2">{{ ucfirst($room->room_status) }}</span>
                                    @else
                                        <span style="font-size: 17px" class="badge badge-danger mt-4 p-2">{{ ucfirst($room->room_status) }}</span>
                                    @endif
                                </td>
                                <td>
                                            <a class="btn btn-success" href="{{url('room_available',$room->id)}}">available</a>
                                            <a class="btn btn-warning" href="{{url('room_booked',$room->id)}}">booked</a>
                                            <a class="btn btn-danger" href="{{url('room_maintenance',$room->id)}}">maintenance</a>
                                </td>
                                <td>
                                    @if($room->wifi =='yes')
                                        <span class="badge badge-success mt-4 p-2">Yes</span>
                                    @else
                                        <span class="badge badge-danger mt-4 p-2">No</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="room/{{$room->image}}" alt="{{ $room->room_title }}" class="img-fluid" style="width: 100px;">
                                </td>
                                <td>
                                    <a class="mt-4 btn btn-danger" href="{{url('room_delete',$room->id)}}">Delete</a>
                                </td>
                                <td>
                                    <a class="mt-4 btn btn-info" href="{{url('room_update',$room->id)}}">Update</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No rooms found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $rooms->links() }}
                </div>

{{--
    @if($rooms->isEmpty())
    <p>No results found.</p>
@else
    <ul>
        @foreach($rooms as $room)
            <li>

            </li>
        @endforeach
    </ul>
@endif --}}
            </div>
          </div>
          </div>
          </div>
    @include('admin.footer')
  </body>
</html>