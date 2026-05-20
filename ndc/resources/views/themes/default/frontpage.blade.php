@extends('themes.default.common.master')
@section('content')
    <div class="bg-primary uk-position-relative uk-visible-toggle home-page-slider" tabindex="-1"
         uk-slider="autoplay: true; autoplay-interval: 50000; pause-on-hover: true; clsActivated: uk-transition-active;  ">
        <ul class="uk-slider-items uk-child-width-1-1 uk-flex-middle">
            @if($banner->count()>0)
                @foreach($banner as $value)
                    <li>
                        <div class="uk-circle uk-transition-slide-left"></div>
                        <div class="uk-media-500">
                            <img src="{{asset('uploads/banners/'.$value->picture)}}" alt="home banner">
                        </div>
                        <div class="uk-position-center" style="width: 100%;">
                            <div class="uk-container">
                                <ul class="uk-grid-medium" uk-grid>
                                    <li class="uk-width-1-3@s">
                                        <div class="uk-transition-slide-right">
                                            <h1 class=" uk-h2 text-primary uk-text-bold uk-position-relative uk-margin-small">
                                                {{$value->title}} </h1>
                                            <div class="text-black uk-display-block uk-margin">
                                                {{$value->caption}}
                                            </div>
                                            <a href="{{$value->link}}"
                                               class="uk-button uk-button-large uk-button-primary-outline">
                                                {{$value->link_title}}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif


        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
           uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
           uk-slider-item="next"></a>
    </div>
    <!-- slider end -->
    <!-- end banner -->

    <!--section-->
    <section class="uk-section bg-light uk-position-relative">
        <div class="uk-container">
            <div class="uk-grid-small uk-flex-middle" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:div, p, h1, a;  delay: 50; repeat: false;">
                @if($about->page_thumbnail)
                <div class="uk-width-1-2@m">
                    <div class="">
                        <div class="uk-border-rounded uk-position-relative uk-text-center">
                            <a href="{{url(geturl($about->uri))}}">
                                <img src="{{asset('uploads/original/' . $about->page_thumbnail)}}" uk-img>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                <div class="uk-width-expand@m">
                    <div class="uk-margin-bottom">
                        <!-- <span class="text-secondary f-18 f-w-500 uk-margin-remove">About</span> -->
                        <h1 class="f-28 text-black  f-w-600 uk-margin-remove ">About NDC </h1>
                    </div>
                    <div class="f-18 uk-margin-bottom">
                        {!! $about->post_excerpt !!}
                        <a href="{{url(geturl($about->uri))}}" class="uk-scrollspy-inview uk-animation-slide-top-small" style="">Read More <i uk-icon="icon:arrow-right; ratio: 1.5;" class="uk-icon"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->


@if($media->count()>0)
    <!-- section -->
    <section class="uk-section bg-white uk-padding-remove-top">
        <div class="uk-container">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom uk-margin-medium-top"
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, a;  delay: 50; repeat: false;">
                <div>
                    <h1 class="f-28 text-black  f-w-600 ">MEDIA</h1>
                </div>
                <!--<div>-->
                <!--    <a class="uk-button-text" href="blog-list.php">More</a>-->
                <!--</div>-->
            </div>
           

            <div uk-slider>

                <div class="uk-position-relative">

                    <div class="uk-slider-container">
                        <ul class="uk-slider-items uk-child-width-1-3@l uk-grid uk-margin-bottom"
                            uk-height-match="target: .uk-same-height">


                            <!--  -->
                            @foreach($media as $value)
                                <li>
                                    <div
                                        class="bg-white uk-box-shadow-medium uk-bordered-rounded uk-overflow-hidden uk-border-bottom-on-hover">

                                        <!-- if video -->
                                        @if($value->external_link)
                                            <div class="open-video" data-youtube-id="OeS22j1R8iw">
                                                <div class="uk-media-250 uk-position-relative uk-same-height">
                                                    <div class="uk-overlay-primary uk-position-cover"></div>
                                                    <img
                                                        src="https://img.youtube.com/vi/{{$value->external_link}}/mqdefault.jpg">
                                                    <div class="uk-position-center uk-zindex">
                                                        <i class="fa fa-play fa-2x text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- if video -->
                                       @elseif($value->page_thumbnail)
                                            <div class="uk-media-250 uk-position-relative">
                                                <a href="{{url(geturl($value['uri'],$value['page_key']))}}">
                                                    <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}">
                                                </a>
                                            </div>
                                            @else
                                            <div class="uk-media-250 uk-position-relative">
                                                <a href="{{url(geturl($value['uri'],$value['page_key']))}}">
                                                    <img src="{{asset('images/default.png')}}">
                                                </a>
                                            </div>
                                        @endif

                                        <div class="uk-position-relative uk-padding uk-same-height">
                                            <div class="f-14 uk-margin-small-bottom">
                                                <a href="{{url(geturl(post_parent($value->uri)->uri))}}"
                                                   class="uk-margin-remove text-secondary">{{post_parent($value->uri)->post_title}}</a>
                                                |
                                                <span
                                                    class="uk-text-muted f-14 f-w-400 uk-margin-small-bottom">{{$value->created_at->format('d M Y')}}</span>
                                            </div>
                                            <h1 class="f-20 f-w-400 uk-margin-remove"><a
                                                    href="{{url(geturl($value['uri'],$value['page_key']))}}">{{$value->post_title}}</a>
                                            </h1>
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>

                    <div class="uk-hidden@s">
                        <a class="uk-position-center-left uk-position-small uk-slider-btn-custom" href="#"
                           uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-slider-btn-custom" href="#"
                           uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small uk-slider-btn-custom" href="#"
                           uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small uk-slider-btn-custom" href="#"
                           uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                </div>
                <!--  -->
            </div>
    </section>
    <!-- section -->
    @endif
    @if($logos->count()>0)
    <!-- section -->
    <section class="uk-section bg-light">
        <div class="uk-container">
            <h1 class="uk-heading-line uk-position-relative f-28 text-black f-w-600"> <span>
        {{$partner->post_title}}
         </span>
            </h1>
            <div class="uk-slider-container-offset" uk-slider="sets: true; finite: true; autoplay: true;">
                <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                    <ul class="uk-slider-items uk-child-width-1-2  uk-child-width-1-5@m uk-grid-medium  uk-position-relative"
                        uk-grid>
                        @foreach($logos as $value)
                        <li>
                            <a href="" target="_blank" uk-tooltip="{{$value->title}}">
                                <div class="uk-logo-list uk-border-rounded uk-box-shadow-small uk-card-hover">
                                    <img src="{{asset('uploads/original/' . $value->thumbnail)}}" class="uk-img">
                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
        </div>
    </section>
    <!-- section end -->
    @endif
@stop
