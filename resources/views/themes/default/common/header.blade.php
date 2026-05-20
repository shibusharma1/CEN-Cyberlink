<!DOCTYPE html>
<html>

<head>
    <title>{{ $setting->site_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keyword')" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ $setting->site_name }}" />
    <meta property="og:description" content="@yield('brief')" />

    @if (trim($__env->yieldContent('thumbnail')))
        <meta property="og:image" content="{{ asset(env('PUBLIC_PATH') . 'uploads/original/') }}/@yield('thumbnail')" />
    @else
        <meta property="og:image" content="{{ asset('images/logo.png') }}" />
    @endif
    <meta property="og:image:width" content="1000" />
    <meta property="og:image:height" content="600" />

    <meta name="twitter:image" content="{{ asset(env('PUBLIC_PATH') . 'uploads/original/') }}/@yield('thumbnail')" />
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('brief')">
    <meta name="twitter:card" content="summary_large_image" />
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#002573">
    <!-- end favicon -->
    <!-- required css  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <!-- end -->
</head>

<body>
    <!-- header start -->
    <header>
        <div class="uk-middle-header uk-flex-middle">
            <div class="uk-container">
                <nav class="uk-navbar">
                    <div class="uk-navbar-left">
                        <a class="uk-logo uk-margin-large-right" href="{{ url('/') }}">
                            <div class="uk-margin-small-right  "><img src="{{ asset('images/logo.png') }}"
                                    alt="Logo"></div>
                        </a>
                    </div>
                    <div class="uk-navbar-right">
                        <div class="uk-visible@m uk-glorious-year uk-text-center">
                            <ul class="uk-grid-medium uk-program-list uk-grid-divider" uk-grid>
                                @foreach ($navigations as $row)
                                    @if ($loop->iteration == 2)
                                        @foreach (has_posts($row->id) as $_row)
                                            @if ($loop->iteration == 1)
                                                <li>
                                                    <a href="{{ url(geturl($_row->uri)) }}" class="bg-12"
                                                        uk-tooltip="title: Clean Air &  Urban Mobility; pos: bottom">
                                                        <img src="{{ asset('images/program/01.svg') }}" width="80"
                                                            alt="">

                                                    </a>
                                                </li>
                                            @elseif($loop->iteration == 2)
                                                <li>
                                                    <a href="{{ url(geturl($_row->uri)) }}" class="bg-6"
                                                        uk-tooltip="title: Energy & Climate Change; pos: bottom"> <img
                                                            src="{{ asset('images/program/02.svg') }}" width="80"
                                                            alt="">

                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ url(geturl($_row->uri)) }}" class="bg-3"
                                                        uk-tooltip="title: Water &  Sanitation; pos: bottom"> <img
                                                            src="{{ asset('images/program/03.svg') }}" width="80"
                                                            alt="">

                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- mobile menu button -->
                        <button class="uk-navbar-toggle uk-hidden@m  " uk-toggle="target: #offcanvas-reveal"
                            uk-navbar-toggle-icon></button>
                        <!-- mobile menu button -->
                    </div>
                </nav>
            </div>
            <div class="uk-clearfix"></div>
        </div>
        <div class="uk-navigation "
            uk-sticky="top: 100; animation:uk-animation-fade uk-animation-slow uk-transform-origin-bottom-center">
            <!-- menu -->

            <div class="uk-h-sticky uk-visible@m"
                uk-sticky="top: 500; animation:uk-animation-fade uk-animation-slow uk-transform-origin-bottom-center">
                <div class="uk-navbar-container uk-inner-navigation navbar-container uk-position-relative ">
                    <div class="uk-container ">
                        <nav class="" uk-navbar>
                            <ul class="uk-navbar-nav uk-position-relative">
                                <li><a href="{{ url('/') }}"> Home</a></li>
                                @if ($navigations->count())
                                    @foreach ($navigations as $row)
                                        @if (getposts($row->id)->count() > 0)
                                            @if ($loop->iteration == 2)
                                                {{-- <li><a href="#"> {{ $row->post_type }}
                                                        <span class=""
                                                            uk-icon="icon: chevron-down; ratio: .75;"></span>
                                                    </a>
                                                </li>   
                                                <div class="uk-navbar-dropdown uk-wave-black-bottom bg-black uk-margin-remove uk-padding-remove uk-border-top"
                                                        uk-drop="delay-hide: 10; uk-animation-slide-top-small; duration: 300; boundary: .uk-navbar-container; boundary-align: true; pos: bottom-justify;">
                                                        <div class="uk-container">
                                                            <div uk-grid class="uk-grid-small"
                                                                uk-scrollspy="cls: uk-animation-slide-top-small; delay: 300; repeat: false;">
                                                                <ul class="tab-nav uk-mega-tab uk-padding-menu   uk-tab-left uk-margin-medium-right  "
                                                                    data-uk-tab="{connect:'.uk-switcher'}">

                                                                    @foreach (has_posts($row->id) as $_row)
                                                                        <li><a
                                                                                href="">{{ $_row->post_title }}</a>
                                                                        </li>
                                                                    @endforeach


                                                                </ul>
                                                                <div class="uk-switcher uk-width-expand@m uk-padding-menu ">
                                                            <!-- list -->
                                                            @foreach (has_posts($row->id) as $_key => $_row)
                                                                @if ($_key >= 6)

                                                                    @continue
                                                                @endif
                                                                <div>
                                                                    <ul class="uk-grid-small uk-margin-medium uk-child-width-1-3@s uk-mega-list"
                                                                        uk-grid
                                                                        uk-scrollspy="cls: uk-animation-slide-top-small; delay: 300; repeat: false;">
                                                                        @if (has_child_post($_row->id))
                                                                            @foreach (has_child_post($_row->id) as $__row)
                                                                                <li>
                                                                                    @if ($__row->external_link)
                                                                                    <a href="{{$__row->external_link}}" target="_blank">
                                                                                        @else
                                                                                    <a href="{{url(strtolower($_row->uri).'/'.geturl($__row->uri))}}">
                                                                                        @endif
                                                                                        <div class="uk-flex uk-flex-middle">
                                                                                        <div><span class="uk-letter">{{substr($__row->post_title,0,1)}}</span> </div>
                                                                                            <div>{{$__row->post_title}}</div>
                                                                                        </div>
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                    <div class="uk-megamenu-viewall"><a
                                                                            href="{{url(geturl($_row->uri))}}"
                                                                            class="uk-button uk-button-primary-outline">
                                                                            View All
                                                                            <span class="uk-icon "
                                                                                  uk-icon="icon:arrow-right; ratio: 1.5"
                                                                                  uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                                                                        </a></div>
                                                                </div>
                                                        @endforeach
                                                        <!-- list end -->
                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <li>
                                                    <a href="#">
                                                        {{ $row->post_type }}
                                                        <span uk-icon="icon: chevron-down; ratio: .75;"></span>
                                                    </a>

                                                    <div uk-dropdown="pos: bottom-left; offset: 0">
                                                        <ul class="uk-nav uk-dropdown-nav">

                                                            @foreach (has_posts($row->id) as $_row)
                                                                <li>
                                                                    <a href="{{ url(geturl($_row->uri)) }}">
                                                                        {{ $_row->post_title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </li>
                                            @elseif($row->id == 19)
                                                <li><a href="{{ url('page/' . posttype_url($row->uri)) }}"
                                                        title="">{{ $row->post_type }}</a></li>
                                            @else
                                                <li><a href=""> {{ $row->post_type }} <span
                                                            class="uk-margin-xsmall-left"
                                                            uk-icon="icon: chevron-down; ratio: .75;"></span></a>
                                                    <div uk-dropdown="pos: bottom-left; offset:0; delay-hide: 200;">
                                                        <ul class="uk-nav uk-dropdown-nav">

                                                            @foreach (getposts($row->id) as $_row)
                                                                @if ($_row->id == 152)
                                                                    <li>
                                                                        <a
                                                                            href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}">
                                                                            {{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}
                                                                            <span
                                                                                class="uk-margin-remove  uk-align-right"
                                                                                uk-icon="icon: chevron-right; ratio: .75;"></span></a>
                                                                        <div
                                                                            uk-dropdown="pos: right-top; offset: 0; delay-hide: 200;">
                                                                            <ul class="uk-nav uk-dropdown-nav">
                                                                                @foreach (has_child_posts($_row->id) as $__row)
                                                                                    <li>
                                                                                        @if ($__row->external_link)
                                                                                            <a href="{{ $__row->external_link }}"
                                                                                                target="_blank">{{ $__row->post_title }}</a>
                                                                                        @else
                                                                                            <a
                                                                                                href="{{ url($_row->uri . '/' . geturl($__row['uri'], $__row['page_key'])) }}">{{ $__row->post_title }}</a>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <a href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}"
                                                                            title="">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </li>
                                            @endif
                                        @else
                                            <li><a href="{{ url('page/' . posttype_url($row->uri)) }}"
                                                    title="">{{ $row->post_type }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                                <!-- -->

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- menu -->
        </div>
        <!-- start mobile menu -->
        <div id="offcanvas-reveal" uk-offcanvas="mode: reveal; flip: true">
            <div class="uk-offcanvas-bar uk-padding-remove">
                <div class="uk-margin-remove bg-white uk-position-relative  ">
                    <button class="uk-offcanvas-close uk-close-large" type="button" uk-close></button>
                    <a class="uk-navbar-item uk-background-white uk-padding-small" href="{{ url('/') }}"> <img
                            src="{{ asset('images/logo.png') }}" alt="Logo" class="uk-logo-light"
                            width="200"> </a>
                </div>
                <nav>
                    <ul class="uk-navsidebar  uk-nav-parent-icon uk-nav-left uk-margin-auto-vertical"
                        uk-nav="multiple: false">
                        <li><a href="{{ url('/') }}"> Home</a></li>
                        @foreach ($navigations as $row)
                            @if (getposts($row->id)->count() > 0)
                                @if ($row->id == 19)
                                    <li><a href="{{ url('page/' . posttype_url($row->uri)) }}"
                                            title="">{{ $row->post_type }}</a></li>
                                @else
                                    <li class="uk-parent"><a href="javascript:void(0)">{{ $row->post_type }}</a>
                                        <ul class="uk-nav-parent-icon uk-nav" uk-nav="multiple: false"
                                            aria-hidden="true" hidden="">

                                            @foreach (getposts($row->id) as $_row)
                                                @if ($_row->id == 152)
                                                    <li class="uk-parent">
                                                        <a
                                                            href="#">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                                                        <ul class="uknavsub" hidden="" aria-hidden="true">
                                                            @foreach (has_child_posts($_row->id) as $__row)
                                                                <li>
                                                                    @if ($__row->external_link)
                                                                        <a href="{{ $__row->external_link }}"
                                                                            target="_blank">{{ $__row->post_title }}</a>
                                                                    @else
                                                                        <a
                                                                            href="{{ url($_row->uri . '/' . geturl($__row['uri'], $__row['page_key'])) }}">{{ $__row->post_title }}</a>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}"
                                                            title="">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </li>
                                @endif
                            @else
                                <li><a href="{{ url('page/' . posttype_url($row->uri)) }}"
                                        title="">{{ $row->post_type }}</a></li>
                            @endif
                        @endforeach

                    </ul>
                </nav>
                <nav class="uk-card-body">
                    <ul class="uk-iconnav uk-flex-center">
                        @if ($setting->facebook_link)
                            <li>
                                <a class="uk-icon-small facebookBtn smGlobalBtn" href="{{ $setting->facebook_link }}"
                                    target="_blank"></a>
                            </li>
                        @endif
                        @if ($setting->twitter_link)
                            <li>
                                <a class="uk-icon-small twitterBtn smGlobalBtn" href="{{ $setting->twitter_link }}"
                                    target="_blank"></a>
                            </li>
                        @endif
                        @if ($setting->experience)
                            <li>
                                <a class="uk-icon-small youtubeBtn smGlobalBtn" href="{{ $setting->experience }}"
                                    target="_blank"></a>
                            </li>
                        @endif
                        @if ($setting->instagram_link)
                            <li>
                                <a class="uk-icon-small instagramBtn smGlobalBtn"
                                    href="{{ $setting->instagram_link }}" target="_blank"></a>
                            </li>
                        @endif
                        @if ($setting->linkedin_link)
                            <li>
                                <a class="uk-icon-small linkedinBtn smGlobalBtn" href="{{ $setting->linkedin_link }}"
                                    target="_blank"></a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <!-- end mobile menu -->
    </header>
    <!-- end header -->
