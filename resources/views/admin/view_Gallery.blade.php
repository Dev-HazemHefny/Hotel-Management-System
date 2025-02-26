<!DOCTYPE html>
<html>
  <head>
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    {{-- @include('admin.body') --}}
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="container w-100 mt-5 row">
                <h1 class="text-center mb-4">Gallery</h1>
                <div>
                    @if(Session::has('session'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('session')}}
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('message')}}
                        </div>

                    @endif
                </div>
                @foreach ($galleries as $gallery)
                <div class="col-md-3 ">
                    <img class="mt-5 mb-2" style="height: 200px; width:280px" src="/gallery/{{$gallery->image}}" alt="">
                    <a href="{{url('delete_gallery',$gallery->id)}}" class="btn btn-danger d-flex justify-content-center">Delete Image</a>
                </div>
                @endforeach
                <form action="{{url('/upload_gallery')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control"  name="image" placeholder="Upload Image" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Upload Image</button>

          </div>
          </div>
          </div>
    @include('admin.footer')
  </body>
</html>