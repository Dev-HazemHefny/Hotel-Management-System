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
            <h2 class="text-center mb-4">All Messages</h2>
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Send Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ ($message->email) }}</td>
                            <td>{{($message->phone)}}</td>
                            <td>{{($message->message)}}</td>
                            <td>
                                <a class ="btn btn-success" href="{{url('send_mail',$message->id)}}">Send Mail</a>
                            </td>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
          </div>
          </div>
    @include('admin.footer')
  </body>
</html>