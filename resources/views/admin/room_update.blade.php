<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="container w-50 mt-5">
                <h1 class="text-center mb-4">Update Room</h1>
                <form action="{{url('/edit_room',$room->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Room Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Room Name</label>
                        <input type="text" class="form-control" id="room_title" value="{{$room->room_title}}" name="room_title" placeholder="Enter room name" required>
                    </div>

                    <!-- Room Type -->
                    <div class="mb-3">
                        <label for="room_type" class="form-label">Room Type</label>
                        <select class="form-select" id="room_type" name="room_type" required>
                            <option>{{$room->room_type}}</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price (per night)</label>
                        <input type="number" class="form-control" id="price" value="{{$room->price}}" name="price" placeholder="Enter price in $" min="1" required>
                    </div>

                    {{-- Wifi --}}
                    <div class="mb-3">
                        <label for="wifi" class="form-label">Wifi</label>
                        <select class="form-select" id="wifi" name="wifi" required>
                            <option>{{$room->wifi}}</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <!-- Availability -->
                    <div class="mb-3">
                        <label for="room_status" class="form-label">Room Status</label>
                        <select class="form-select" id="room_status" name="room_status" required>
                            <option>{{$room->room_status}}</option>
                            <option value="available">available</option>
                            <option value="booked">booked</option>
                            <option value="maintenance">maintenance</option>
                        </select>
                    </div>
                              {{-- Room Description --}}
                              <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter room description" required>{{$room->description}}</textarea>
                    </div>
                             {{--Current Room Image --}}
                             <div class="mb-3">
                                <label for="image" class="form-label">Current Room Image</label>
                                <img width="100px" src="/room/{{$room->image}}" alt="">
                            </div>
                         {{--New Room Image --}}
                         <div class="mb-3">
                            <label for="image" class="form-label">New Room Image</label>
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100">Add Room</button>
                </form>
            </div>

            <!-- Bootstrap JS -->
            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
          </div>
          </div>
          </div>

    @include('admin.footer')
  </body>
</html>