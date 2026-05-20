@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <!-- banner -->
    @if($data->banner)
    <section class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
        uk-parallax="bgy: -100; easing: -2;  "data-src="{{asset('uploads/original/'.$data->banner)}}" uk-height-viewport="expand: true; min-height: 300;"
        uk-img>
        @else
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle uk-text-center" uk-height-viewport="expand: true; min-height: 150;">
        @endif
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container">
                <h1 class="uk-text-bold uk-h4 text-white uk-margin-remove">{{$pos_type->post_type}}</h1>

                <h1 class="uk-text-bolder text-white uk-margin-remove"
                    uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 30; repeat: false;">{{$data->post_title}}</h1>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-padding-small bg-light uk-position-relative">
        <div class="uk-container">
            <div class="uk-child-width-1-4@s uk-child-width-1-2 uk-text-center uk-grid-divider uk-grid-small"
                 id="counter" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-left-small; target:div, div;  delay: 20; repeat: false;">
                <div>
                    <div class="uk-padding-small">
                          <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field1}}">0</span>
                            </h2>
                            <p class="uk-margin-remove">{{$setting->website2}}</p>
                    </div>
                </div>
                <div>
                    <div class="uk-padding-small">
                       <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field2}}">0</span>
                            </h2>
                            <p class="uk-margin-remove">{{$setting->email_secondary}}</p>
                    </div>
                </div>
                <div>
                    <div class="uk-padding-small">
                         <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field3}}">0</span>
                            </h2>
                            <p class="uk-margin-remove">{{$setting->address2}}</p>
                    </div>
                </div>
                <div class="uk-padding-small">
                  <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field4}}">0</span>
                        </h2>
                        <p class="uk-margin-remove">{{$setting->location2}}</p>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end section -->
    <!-- section -->
    <section class="uk-section bg-white uk-position-relative">
        <div class="uk-container">
            <!--  -->
            <div class="uk-grid-medium uk-flex-middle" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 20; repeat: false;">
                <div class="uk-width-expand@m  uk-flex-last uk-flex-first@m">
                    <div class=" ">
                        {!! $data->post_excerpt !!}
                    </div>
                </div>
                <div class="uk-width-1-3@m  uk-flex-first uk-flex-last@m">
                    <div class="uk-media-350 uk-border-rounded">
                        <a href="#"> <img src="{{asset('uploads/original/'.$data->page_thumbnail)}}" alt=""></a>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <hr>
            <div class="uk-grid-medium uk-grid-divider" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-left-small; target:li, p;  delay: 20; repeat: false;">
                <!--  -->
                @if($data_child->isNotEmpty())
                    @foreach($data_child as $value)
                        <div class="uk-width-1-2@m">
                            <p><b>{{$value->post_title}}</b></p>
                            <p>{!! $value->post_content !!}</p>
                        </div>
                @endforeach
            @endif
            <!--  -->
            </div>
            
             <div class=" ">
                        {!! $data->post_content !!}
                    </div>
            <!--  -->
        </div>
    </section>
    <!-- end section -->
@endsection
