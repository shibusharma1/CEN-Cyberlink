@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->banner)
@section('content')
 @if($data->banner)
    <section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
        uk-parallax="bgy: -100; easing: -2;  "data-src="{{asset('uploads/original/'.$data->banner)}}" uk-height-viewport="expand: true; min-height: 300;"
        uk-img>
        @else
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle uk-text-center"
             uk-height-viewport="expand: true; min-height: 150;" uk-img uk-parallax="bgx: -80,-80;bgy: -0, 0"
             style="background: var(--bg-primary) url('images/bg/default-bg.png'); background-size: cover; background-repeat: no-repeat;">
        @endif
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container">
                <h4 class="text-white uk-margin-remove"
                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 20; repeat: false;">{{$data->uid}}</h4>
                <h1 class="uk-text-bolder text-white uk-margin-remove"
                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 30; repeat: false;">{{$data->post_type}}</h1>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section-small">
        <div class="uk-container">
            <ul class="uk-grid-medium uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s"
                uk-height-match="target:.uk-card-default" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 20; repeat: false;">
                <!--  -->
                @foreach($posts as $value)



                    <li>
                        <div>
                            <div class="bg-white">
                                <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}">
                                    <div class="uk-media-250 uk-position-relative">
                                        @if($value->page_thumbnail)
                                        <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}">
                                        @else
                                        <img src="{{asset('images/default.png')}}">
                                        @endif
                                        </div>
                                    <div class="uk-card uk-card-default  uk-card-body">
                                        <h1 class="uk-h4 uk-text-bold uk-margin-remove">{{$value->post_title}}</h1>
                                        <span
                                            class="uk-text-muted uk-margin uk-text-small">{{$value->associated_title}}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach


            </ul>
        </div>
    </section>
    <!-- section end -->
    {{$posts->links('themes.default.common.pagination')}}
@stop
