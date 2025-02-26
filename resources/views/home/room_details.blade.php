<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
        @include('home.header')
      </header>

      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Room</h2>
                    {{-- <p>Lorem Ipsum available, but the majority have suffered </p> --}}
                 </div>
              </div>
           </div>
           <div class="row ">
                          <div class="mx-auto col-md-8 col-sm-8">
                   <div id="serv_hover"  class="room">
                       <div class="room_img">
                           <figure><img  src="/room/{{$room->image}}" alt="#"/></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{$room->room_title}}</h3>
                            <h4 style="font-size: 20px">{{$room->room_type}}</h4>
                            <p>{{$room->description}}</p>
                            <h2 style="font-size: 18px">Free wifi : {{$room->wifi}}</h2>
                            <h2 style="color: aliceblue; font-size:20px" class=" p-1 bg-danger">${{$room->price}}</h2>
                        </div>
                    </div>
                </div>
                <div class="mx-auto col-md-4 col-sm-4">

                    {{-- @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    @endif --}}
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                    <form action="{{url('/add_booking',$room->id)}}" method="post">
                        @csrf
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                        <label for="">Phone</label>
                        <input type="number" name="phone" id="phone" class="form-control" value="{{Auth::user()->phone}}">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                        <label for="">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                        <input type="submit" value="Book Now" class="btn btn-primary mt-3">
                    </form>
                </div>
                </div>
        </div>
     </div>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      {{-- @include('home.slider') --}}
      <!-- end banner -->
      <!-- about -->
      {{-- @include('home.about') --}}
      <!-- end about -->
      <!-- our_room -->
      {{-- @include('home.room') --}}
      <!-- end our_room -->
      <!-- gallery -->
      {{-- @include('home.gallery') --}}
      <!-- end gallery -->
      <!-- blog -->
      {{-- @include('home.blog') --}}
      <!-- end blog -->
      <!--  contact -->
     {{-- @include('home.contact') --}}
      <!-- end contact -->
      <!--  footer -->
   @include('home.footer')
      <!-- end footer -->
     <script type="text/javascript">
    $(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#start_date').attr('min', maxDate);
    $('#end_date').attr('min', maxDate);
    });
    </script>
   </body>
</html>