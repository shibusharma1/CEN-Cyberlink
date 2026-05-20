@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <!-- start -->
     @if($data->banner)
    <section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
        uk-parallax="bgy: -100; easing: -2;  "data-src="{{asset('uploads/original/'.$data->banner)}}" uk-height-viewport="expand: true; min-height: 300;"
        uk-img>
        @else
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle  " uk-height-viewport="expand: true; min-height: 150;">
        @endif
  
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container text-white" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1;  delay: 100; repeat: false;">
                <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_type}}</h1>
            </div>
    </section>
    <!-- end -->
    <!-- section -->
    <section class="">
        <div class="uk-container  ">
            <div uk-grid class="uk-grid uk-grid-divider uk-flex-middle">
               
                <div class="uk-width-expand@m">
                    <div class="uk-padding  uk-padding-remove-left uk-padding-remove-right">
                        <div>
                          {!! $data->content !!}
                            {!! $setting->google_map2 !!}
                        </div>
                    </div>
                </div>
                 <div class="uk-width-1-3@m">
                     <div class="uk-padding"></div>
                    <!--  -->
                    <div class=" uk-padding-small uk-padding-remove-left uk-padding-remove-right">
                        <ul class="uk-list ">
                            <li class=" uk-flex">
                                <i class="fa fa-map-marker uk-margin-small-right uk-text-large"></i>
                                {{$setting->location1}}
                            </li>
                            <li class=" uk-flex">
                                <i class="fa fa-phone uk-margin-small-right uk-text-large"></i>
                                {{$setting->phone}}
                            </li>
                            <li class=" uk-flex">
                                <i class="fa fa-envelope uk-margin-small-right uk-text-large"></i>
                                {{$setting->website2}}
                            </li>
                        </ul>
                        <hr>
                        <div id="social" class="uk-margin-small-top">
                            <a class="facebookBtn smGlobalBtn" href="{{$setting->facebook_link}}" target="_blank"></a>
                            <a class="twitterBtn smGlobalBtn" href="{{$setting->twitter_link}}" target="_blank"></a>
                            <a class="youtubeBtn smGlobalBtn" href="{{$setting->google_plus}}" target="_blank"></a>
                            <a class="instagramBtn smGlobalBtn" href="{{$setting->instagram_link}}" target="_blank"></a>
                            <a class="linkedinBtn smGlobalBtn" href="{{$setting->linkedin_link}}" target="_blank"></a>
                        </div>
                        <hr>
                        <!-- facebook -->
                        <div class="uk-margin">
                            <div id="fb-root"></div>
              <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=493274650870933";
                      fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>

      <div class="fb-page" data-href="{{$setting->facebook_link}}/?ref=br_rs" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{$setting->facebook_link}}/?ref=br_rs" class="fb-xfbml-parse-ignore">
          <a href="{{$setting->facebook_link}}/?ref=br_rs">Clean Energy Nepal</a></blockquote></div>
                        </div>
                        
                         <div class="uk-twitter">
         <a class="twitter-timeline" data-height="300" href="{{$setting->twitter_link}}?lang=en">Tweets by Clean Energy Nepal</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
                        <!-- end -->
                    </div>
                    <!--  -->
                </div>
           
            </div>
        </div>
    </section>
    <!-- section end -->
@endsection
