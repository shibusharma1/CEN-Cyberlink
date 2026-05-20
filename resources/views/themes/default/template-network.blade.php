@extends('themes.default.common.master')
<!--@section('post_title',$data->post_title)-->
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle  " uk-height-viewport="expand: true; min-height: 300;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container text-white" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1;  delay: 100; repeat: false;">
                <h1 class="uk-text-bold uk-h4 text-white uk-margin-remove">{{$pos_type->post_type}}</h1>
                <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_title}}</h1>
                {!! $data->post_excerpt !!}
            </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section   bg-light uk-position-relative ">
        <div class="uk-container">
            <!--  -->
            @foreach($data_child as $value)
                @if($loop->iteration %2 == 0)
            <div class="bg-white uk-box-shadow-small uk-margin-medium-bottom">
                <div class="uk-grid-large uk-transition-toggle uk-list-home uk-flex-middle" uk-height-match=".uk-same-height" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                    <div class="uk-width-1-2@m  uk-flex-last uk-flex-first@m uk-same-height">
                        <div class="uk-padding">
                            <div class="uk-margin-small-bottom">
                                <h1 class="uk-h3 uk-text-bold text-black">{{$value->post_title}}</h1> </div>
                            <p><a href="{{$value->external_link}}"><strong><span>{{$value->sub_title}}</span></strong></a>{!! $value->post_excerpt !!}<a href="{{$value->external_link}}"><span >{{$value->external_link}}</span></a></p> <a href="{{$value->external_link}}" class="uk-button uk-button-primary">VISIT WEBSITE</a> </div>
                    </div>
                    <div class="uk-width-1-2@m  uk-flex-first uk-flex-last@m">
                        <div class=" uk-position-relative uk-same-height uk-logo-inner">
                            <a href="{{$value->external_link}}"> 
                              @if($value->page_thumbnail)
                                     <img src="{{asset('uploads/original/'.$value->page_thumbnail)}}" class="uk-transition-scale-down uk-transition-opaque" alt="">
                                        @else
                                        <img src="{{asset('images/default.png')}}" class="uk-transition-scale-down uk-transition-opaque" alt="">
                                        @endif </a>
                        </div>
                    </div>
                </div>
            </div>
                @else
            <!--  -->
            <!--  -->
            <div class="bg-white uk-box-shadow-small uk-margin-medium-bottom">
                <div class="uk-grid-large uk-transition-toggle uk-list-home  uk-flex-middle" uk-height-match=".uk-same-height" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                    <div class="uk-width-1-2@m">
                        <div class="uk-media-350 uk-position-relative uk-same-height uk-logo-inner">
                            <a href="{{$value->external_link}}">   
                            @if($value->page_thumbnail)
                                     <img src="{{asset('uploads/original/'.$value->page_thumbnail)}}" class="uk-transition-scale-down uk-transition-opaque" alt="">
                                        @else
                                        <img src="{{asset('images/default.png')}}" class="uk-transition-scale-down uk-transition-opaque" alt="">
                                        @endif  </a>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m  uk-same-height  ">
                        <div class="uk-padding ">
                            <div class="uk-margin-small-bottom">
                                <h1 class="uk-h3 uk-text-bold text-black">{{$value->post_title}}</h1> </div>
                            <p><a href="{{$value->external_link}}" target="_blank"><strong><span>{{$value->sub_title}}</span></strong></a>{!! $value->post_excerpt !!}<a href="{{$value->external_link}}" target="_blank"><span >{{$value->external_link}}</span></a></p> <a href="{{$value->external_link}}" class="uk-button uk-button-primary" target="_blank">VISIT WEBSITE</a> </div>
                    </div>
                </div>
            </div>
            @endif
            <!--  -->
            @endforeach


        </div>
    </section>
    <!-- end section -->

@stop
