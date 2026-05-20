<!DOCTYPE html>
<html>
<head>
    <title>{{$setting->site_name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content=""/>
    <meta name="description" content="@yield('meta_description')"/>
    <meta name="keywords" content="@yield('meta_keyword')"/>
    <!-- favicon -->
    <link href="{{asset('images/favicon.png')}}" rel="icon"/>
    <meta name="theme-color" content="#354f8e">
    <!-- end favicon -->
    <!-- required css  -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:site_name" content="{{$setting->site_name}}"/>
    <meta property="og:description" content="@yield('brief')"/>

    @if (trim($__env->yieldContent('thumbnail')))
      <meta property="og:image"content="{{ asset( env('PUBLIC_PATH') . 'uploads/original/' ) }}/@yield('thumbnail')"/>
    @else
        <meta property="og:image" content="{{asset('images/favicon.png')}}"/>
    @endif
    <meta property="og:image:width" content="1000"/>
    <meta property="og:image:height" content="600"/>

    <meta name="twitter:image" content="{{ asset( env('PUBLIC_PATH') . 'uploads/original/' ) }}/@yield('thumbnail')"/>
    <meta name="twitter:url" content="{{url()->current()}}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('brief')">
    <meta name="twitter:card" content="summary_large_image"/>
    <!-- end -->
</head>
<body>
<header id="header" class="bg-white">
    <!-- start offcanvas menu -->
    <div id="offcanvas-reveal" uk-offcanvas="flip: true;  overlay: true;">
        <div
            class="uk-offcanvas-bar uk-dark uk-offcanvas-bar-white uk-padding-remove  uk-box-shadow-medium uk-flex uk-flex-between uk-flex-column">
            <div class="uk-margin-remove uk-position-relative uk-border-bottom bg-white uk-padding-small">
                <button class="uk-offcanvas-close uk-close-large" type="button" uk-close></button>
            </div>
            <div>
                 <nav>
                     <ul class="uk-navsidebar    uk-nav-parent-icon uk-nav-left uk-margin-auto-vertical" uk-nav="multiple: false">
                        <li class="uk-active"><a href="{{url('/')}}">Home</a></li>
                          @if ($navigations->count())
                            @foreach ($navigations as $row)
                            
                                @if($row->id==35 || $row->id==37 )
                                <li><a href="{{ url('page/' . posttype_url($row->uri)) }}">{{ $row->post_type }}</a></li>
                                @elseif($row->id == 34) 
                                
                             <li class="uk-parent uk-active">
                               <a href="#">{{$row->post_type}}</a>
                              
                               <ul class="uk-nav-parent-icon uk-nav" uk-nav="multiple: false" aria-hidden="true" hidden="">
                                     @if (has_posts($row->id))
                                    @foreach (has_posts($row->id) as $Arow)
                                     @if (check_child_post($Arow->id) > 0)
                                  <li class="uk-parent"> <a href="#">{{$Arow->post_title}}  </a>
                                   @if(has_child_post($Arow->id))
                                <ul class="uk-nav-parent-icon uk-nav" uk-nav="multiple: false" aria-hidden="true" hidden="">
                                       @foreach (has_child_post($Arow->id) as $Brow)
                                   
                                  <!-- region -->
                                   @if(has_child_post($Brow->id))
                                    @foreach (has_child_post($Brow->id) as $Crow)
                                        <li> <a href="{{url(geturl($Crow['uri'], $Crow['page_key']))}}">{{$Crow->post_title}}</a>
                                          <!--@if(has_child_post($Crow->id))-->
                                          <!--  <ul class="uknavsub" aria-hidden="true" hidden="">-->
                                          <!--         @foreach (has_child_post($Crow->id) as $Drow)-->
                                          <!--       <li><a href="sector-single.php">4{{$Drow->post_title}}</a></li>-->
                                          <!--       @endforeach-->
                                          <!--      </ul>-->
                                          <!--      @endif-->
                                            </li>
                                            @endforeach
                                            @else
                                            <li><a href="{{url(geturl($Brow['uri'], $Brow['page_key']))}}">{{$Brow->post_title}}</a></li>
                                            @endif
                                            <!-- region end -->
                                            @endforeach
                                       </ul>
                                       @endif
                                      </li>
                                        @else
                              <li><a href="{{url(geturl($Arow['uri'], $Arow['page_key']))}}">{{$Arow->post_title}}</a></li>
                              @endif
                                     @endforeach
                                   
                               @endif
                               </ul>
                              
                            </li>
                        @elseif (getposts($row->id)->count() > 0)
                             
                        <li class="uk-parent">
                           <a href="">{{$row->post_type}}</a>
                           <ul class="uknavsub">
                            @foreach (getposts($row->id) as $_row)
                              <li><a href="{{url(geturl($_row['uri'], $_row['page_key']))}}">{{$_row->post_title}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        @else
                         <li><a href="{{ url('page/' . posttype_url($row->uri)) }}">{{ $row->post_type }}</a></li>
                    @endif
                    @endforeach
                    @endif
                    
                            
                       
                     </ul>
                  </nav>
            </div>
            <!-- social icon -->
            <div class="uk-position-relative">
                <div>
                    <div class="uk-padding-small bg-primary-light">
                        <ul class="uk-grid-small  uk-flex-center" uk-grid>
                            <li><a class="facebookBtn smGlobalBtn" href="{{$setting->facebook_link}}" target="_blank"></a></li>
                            <li><a class="instagramBtn smGlobalBtn" href="{{$setting->instagram_link}}" target="_blank"></a></li>
                            <li><a class="twitterBtn smGlobalBtn" href="{{$setting->twitter_link}}" target="_blank"></a></li>
                            <li><a class="youtubeBtn smGlobalBtn" href="{{$setting->experience}}" target="_blank"></a></li>
                            <li><a class="linkedinBtn smGlobalBtn" href="{{$setting->linkedin_link}}" target="_blank"></a></li>
                        </ul>
                    </div>
                    <div class="uk-padding-small  bg-primary">
                        <div class="f-12 uk-margin-remove uk-text-left@s uk-text-center">Contact at</div>
                        <div class="f-16 uk-margin-remove uk-text-left@s uk-text-center"><a href="tel:{{$setting->phone}}">
                                {{$setting->phone}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end social icon -->
        </div>
    </div>
    <!-- end offcanvas menu -->
    <!-- mobile top menu -->
    <div class="uk-header-mobile uk-border-bottom uk-hidden@m uk-box-shadow-small bg-white">
        <div class="" uk-sticky="" show-on-up="" animation="uk-animation-slide-top" cls-active="uk-navbar-sticky"
             sel-target=".uk-navbar-container" class="uk-sticky">
            <div class="uk-navbar-container bg-white">
                <nav uk-navbar="" class="uk-navbar">
                    <div class="uk-navbar-left">
                        <a href="{{url('/')}}" class="uk-navbar-item uk-logo  uk-text-bold uk-h1 uk-margin-remove">
                            <!-- <img alt="" src="images/logo.svg" width=" "> -->
                            NDC
                        </a>
                    </div>
                    <div class="uk-navbar-center">
                    </div>
                    <div class="uk-navbar-right">
                        <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-reveal">
                            <div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon"></div>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- end mobile top menu -->
    <!-- small header -->
    <div class="uk-top-header uk-visible@m">
        <div class="uk-container">
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <div>
                    <ul class="uk-flex">
                        <!-- <li> Follow Us on Social Media </li> -->
                        <li><a href="{{$setting->facebook_link}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$setting->instagram_link}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{$setting->twitter_link}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$setting->experience}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{$setting->linkedin_link}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div>
                    <ul class="uk-flex">
                        <li><a href="">{{$setting->email_primary}}</a></li>
                        <li>
                            <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
                        </li>
                        <!--   <li>
                           <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-reveal " style="min-height: 15px !important;">
                              <div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon "></div>
                           </a>
                           </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end  -->
    <!-- start main menu -->
    <div class="uk-h-sticky uk-visible@m uk-border-top"
         uk-sticky="top: 200; animation:uk-animation-fade uk-animation-slow uk-transform-origin-bottom-center">
        <div class="uk-middle-header bg-white uk-flex-middle">
            <div class="uk-container">
                <nav class="uk-navbar">
                    <div class="uk-navbar-left">
                        <a class="uk-logo text-primary uk-text-bold uk-h1 uk-margin-remove" href="{{url('/')}}">
                            <!--  <img src="images/logo.svg" width="100" alt="Logo"  > -->
                            NDC
                        </a>
                    </div>
                    <div class="uk-navbar-right">
                    <div class="uk-navigation ">
                    <!-- menu -->
                    <nav class="" uk-navbar>
                    <ul class="uk-navbar-nav  uk-visible@m  uk-position-relative">
                    <li><a href="{{url('/')}}">Home</a></li>
                    @if ($navigations->count())
                    @foreach ($navigations as $row)
                    @if($row->id==35 || $row->id==37 )
                    <li>
                    <a href="{{ url('page/' . posttype_url($row->uri)) }}">{{ $row->post_type }}</a>
                    </li>
                     @elseif($row->id == 34)
                    <li><a href="#">{{$row->post_type}}<span class="" uk-icon="icon: chevron-down; ratio: 1;"></span></a>
                    <div class="uk-navbar-dropdown">
                    @if (getposts($row->id)->count() > 0)
                    @foreach (getposts($row->id) as $_row)
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                    @if(has_child_post($_row->id))
                    <li>
                    <a href="">{{$_row->post_title}} <span class="uk-margin-remove uk-align-right " uk-icon="icon: chevron-right; ratio: 1;"></span></a>
                    <div uk-dropdown="pos: right-top; offset: 0; delay-hide: 200;" class="uk-dropdown">
                    <ul class="uk-nav uk-dropdown-nav">
                        @if(has_child_post($_row->id))
                            @foreach (has_child_post($_row->id) as $__row)
                                @if(has_child_post($__row->id))
                                    <li> <a href="">{{$__row->post_title}} <span class="uk-margin-remove uk-align-right " uk-icon="icon: chevron-right; ratio: 1;"></span></a>
                                        <div uk-dropdown="pos: right-top; offset: 0; delay-hide: 200;" class="uk-dropdown">
                                            <ul class="uk-nav uk-dropdown-nav">
                                                @foreach (has_child_post($__row->id) as $val)
                                                <li><a href="{{url(geturl($val['uri'], $val['page_key']))}}">{{$val->post_title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li><a href="{{url(geturl($__row['uri'], $__row['page_key']))}}" title="">{{$__row->post_title}} </a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                    </div>
                    </li>
                    @else
                    <li>
                    <a href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                    </li>
                    @endif
                    </ul>
                    @endforeach
                    @endif
                    </div>
                    </li>
                      @elseif (getposts($row->id)->count() > 0)
                           
                        <li><a href="#">{{$row->post_type}}<span class="" uk-icon="icon: chevron-down; ratio: 1;"></span></a>
                           <div class="uk-navbar-dropdown">
                             <ul class="uk-nav uk-navbar-dropdown-nav">
                            @foreach (getposts($row->id) as $_row)
                              <li><a href="{{url(geturl($_row['uri'], $_row['page_key']))}}">{{$_row->post_title}}</a></li>
                              @endforeach
                           </ul>
                           </div>
                        </li>
                       @else
                          <li><a href="{{ url('page/' . posttype_url($row->uri)) }}">{{ $row->post_type }}</a></li>
                    @endif
                    @endforeach
                    @endif
                    </ul>
                    </nav>
                            <!-- menu -->
                        </div>
                        <!-- <a href="" class="uk-button uk-button-small uk-button-primary uk-margin-medium-left">Login</a> -->
                        <!-- mobile menu button -->
                        <button class="uk-navbar-toggle uk-hidden@m  " uk-toggle="target: #offcanvas-reveal"
                                uk-navbar-toggle-icon></button>
                        <div class="search-container">
                            <form action="{{route('search-results')}}" method="post">
                                @csrf
                                <input class="search expandright" id="searchright" type="search" name="search"
                                       placeholder="Search">
                                <label class="search-btn searchbutton" for="searchright"><span
                                        class="mglass">&#9906;</span></label>
                            </form>
                        </div>
                        <!-- mobile menu button -->
                    </div>
                </nav>
            </div>
            <div class="uk-clearfix"></div>
        </div>
    </div>
    <!-- end main menu -->
</header>
<!-- /header -->
<!--Pre loader start-->
<!--   <div id="uk-preloader">
   <div class="uk-loading">
      <svg version="1.2" height="300" width="600" xmlns="http://www.w3.org/2000/svg"
         viewport="0 0 60 60" xmlns:xlink="http://www.w3.org/1999/xlink">
         <path id="uk-pulsar" stroke="rgba(0,155,155,1)" fill="none" stroke-width="2"stroke-linejoin="round"
            d="M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210" />
      </svg>
   </div>
   </div> -->
<!--pre loader end-->
