<!-- video -->
@if($banner)
<section class="position-relative">
   @if($banner->link)
   <video width="100%"  muted autoplay loop>
      <source type="video/mp4" src="{{$banner->link}}"></source>
      <!-- <source type="video/ogg" src="Muktinathwebsitevideo.ogg"></source> -->
      Your browser does not support the video tag.
   </video>
   @else
    <!-- Swiper -->
  <div class="swiper-container homepage-banner">
    <div class="swiper-wrapper">
      @if($banners->count()>0)
      @foreach($banners as $row)
      <div class="swiper-slide">
         @if($row->link)
      <a href="{{$row->link}}" target="_blank" >
         <img src="{{url(env('PUBLIC_PATH').'uploads/banners/' . $row->picture )}}" alt="{{$row->title}}">
      </a>
      @else
        <img src="{{url(env('PUBLIC_PATH').'uploads/banners/' . $row->picture )}}" alt="{{$row->title}}">
        @endif
      </div>
      @endforeach
      @else
           <div class="swiper-slide">
      <a href="">
         <img src="{{asset('themes-assets')}}/images/hero/banner-02.jpg" alt="">
         </a>
      </div>
     @endif

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next  swiper-button-white mr-5"></div>
    <div class="swiper-button-prev swiper-button-white ml-5"></div>
  </div>

@endif
  
</section>
@endif
<!-- end video -->