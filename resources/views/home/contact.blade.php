<div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact Us</h2>
             </div>
             @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{Session::get('success')}}
                </div>
                @endif
       </div>
       <div class="row">
          <div class="col-md-6">
             <form id="request" action="{{url('contact')}}" method="POST" class="main_form">
                @csrf
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" value="{{Auth::user()->name ?? 'None' }}" readonly type="text" name="name" required>
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" value="{{Auth::user()->email ?? 'None' }}" readonly type="email" name="email" required>
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" value="{{Auth::user()->phone ?? '*******' }}" type="text" readonly name="phone" required>
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="textarea" name="message" required></textarea>
                   </div>
                   <div class="col-md-12">
                      <button type="submit" class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">
             <div class="map_main">
                <div class="map-responsive">
                   <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>