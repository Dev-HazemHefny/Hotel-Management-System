<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
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
            <center>
                <h1>Send Email To {{$data->email}}</h1>
                <form class="w-50" action="{{url('mail',$data->id)}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label  class="form-label">Greeting</label>
                        <input type="text" class="form-control"  name="greeting"  required>
                    </div>


                    <div class="mb-3">
                        <label  class="form-label">Mail body</label>
                        <textarea class="form-control"  name="body" required></textarea>
                    </div>

                    <div>
                        <label >Action Text</label>
                        <input type="text" class="form-control"  name="action_text" required>
                    </div>

                    <div>
                        <label> Action Url</label>
                        <input type="text" class="form-control"  name="action_url" required>
                    </div>


                    <div>
                        <label>End Line</label>
                        <input type="text" class="form-control mb-4"  name="endline" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Send Email</button>
                </form>
            </center>
          </div>
          </div>
          </div>
    @include('admin.footer')
  </body>
</html>