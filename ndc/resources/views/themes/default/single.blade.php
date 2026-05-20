@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <!-- banner -->
    <section class="uk-cover-container  uk-position-relative bg-primary">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-position-relative text-white uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 150;">
                <div class="uk-width-1-1">
                    <div class="uk-grid uk-flex-middle" uk-grid
                         uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, p, a;  delay: 100; repeat: false;">
                        <div class="uk-width-1-2@l uk-width-1-1">
                            <h1 class="f-30 f-w-600 text-white uk-margin-small">{{$data->post_title}}</h1>
                        </div>
                        <div class="uk-width-1-2@l uk-width-1-1 uk-text-right@l">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section bg-white">
        <div class="uk-container">
            <!--  -->
            <div class="uk-grid uk-flex-middle" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, h2, h3,  p, a;  delay: 100; repeat: false;">
                <div class="uk-width-expand@m uk-match-height">
                    {!! $data->post_content !!}
                </div>
                @if($data->page_thumbnail)
                <div class="uk-width-1-3@m ">
                    <div class="uk-border-rounded">
                        <img src="{{asset('uploads/original/' . $data->page_thumbnail)}}">
                    </div>
                </div>
                @endif
            </div>
            <!--  -->
        </div>
    </section>
    <!-- section -->
     <!-- section -->
     @if($data->related_publications->count()>0)
    <section class="uk-section bg-light uk-padding-remove-top">
        <div class="uk-container">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom uk-margin-medium-top"
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, a;  delay: 50; repeat: false;">
                <div>
                    <h1 class="f-28 text-black  f-w-600 ">Related Publication</h1>
                </div>
                <div>
                 <!--<a class="uk-button-text" href="blog-list.php">More</a>-->
                </div>
            </div>
            <!--  -->
            <!--  -->
            <ul uk-grid class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s  uk-margin-bottom"
                uk-height-match="target: .uk-same-height">
                <!--  -->
                @foreach($data->related_publications as $value)
                    <li>
                        <div class="bg-white uk-box-shadow-medium uk-bordered-rounded uk-overflow-hidden ">
                            <div class="uk-media-250 uk-position-relative">
                                <a href="{{url(geturl($value->uri))}}">
                                    @if($value->page_thumbnail)
                                    <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}">
                                    @else
                                     <img src="{{asset('images/default.png')}}">
                                     @endif
                                </a>
                            </div>

                            <div class="uk-position-relative uk-border-left-on-hover uk-padding uk-same-height">
                            <span
                                class="uk-display-block uk-text-muted f-14 f-w-400 uk-margin-small-bottom">{{$value->created_at->format('d M Y')}}</span>
                                <h1 class="f-20 f-w-400 uk-margin-remove"><a href="{{url(geturl($value->uri))}}">
                                        {{$value->post_title}}
                                    </a></h1>
                            </div>
                        </div>
                    </li>
            @endforeach
            <!--  -->

            </ul>
            <!--  -->
        </div>
    </section>
    <!-- section -->
    <nav>
        <ul class="pagination">
            {{$link->links()}}
        </ul>
    </nav>
@endif
@stop
