<div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
                
             </div>
          </div>
       </div>
       <div class="row">
        @foreach ($galleries as $gallery)

        <div class="col-md-3 col-sm-6">
            <div class="gallery_img">
                <figure><img style="width: 280px; height:200px" src="/gallery/{{$gallery->image}}" alt="#"/></figure>
            </div>
        </div>
        @endforeach
    </div>
    </div>
 </div>