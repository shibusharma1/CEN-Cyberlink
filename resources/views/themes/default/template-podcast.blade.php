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
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle  "
             uk-height-viewport="expand: true; min-height: 150;">
        @endif
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container text-white"
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:h1;  delay: 100; repeat: false;">
                <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_title}}</h1></div>
    </section>
    <!-- end -->
    <!-- section -->
    @if(video_gallery()->count() > 0)
    <section class="uk-section   bg-light uk-position-relative ">
        <div class="uk-container">
            @foreach(video_gallery() as $row )
                {!! $row->video !!}	
            @endforeach
        </div>
    </section>
    @endif
    <!-- end section -->
@stop
