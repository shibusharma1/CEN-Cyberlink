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
                        <div class="uk-width-expand@m">
                            <span
                                class="text-white f-14 f-w-600 uk-margin-small-bottom">Published on  {{$data->created_at->format('d M Y')}}</span>
                            <h1 class="f-30 f-w-600 text-white uk-margin-small">{{$data->post_title}}</h1>
                        </div>
                        <div class="uk-width-auto@m  uk-text-right@l">
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <!-- ShareThis END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section uk-position-relative">
        <div class="uk-container uk-position-relative">
            <!-- grid -->
            <div class="uk-publication-grid uk-flex-middle uk-grid-large uk-grid-divider" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:div, p, h1, a;  delay: 50; repeat: false;">
                <!--  -->
                <div class="uk-width-1-3@l">
                    <h1 class="f-24 f-w-500">Attachments</h1>
                </div>
                <!--  -->
                <!--  -->
                @if($documents->count()>0)
                    @foreach($documents as $value)
                <div class="uk-width-expand@m">
                            <div class="uk-padding-small">
                                <div class="uk-flex uk-flex-middle">
                                    <div>
                                        <a href="{{asset('uploads/doc/'.$value->document)}}"
                                           target="_blank" class="uk-atach">
                                            <i uk-icon="icon:file-pdf; ratio: 1" class="uk-light"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{asset('uploads/doc/'.$value->document)}}"
                                           target="_blank">{{$value->title}}</a>
{{--                                        <span class="uk-display-block">{{$value->title}}</span>--}}
                                    </div>

                                </div>
                            </div>
                </div>
                @endforeach
            @endif

            <!--  -->
            </div>
            <!-- grid -->


            <!-- grid -->
            @if($associated_posts->count()>0)
                @foreach($associated_posts as $value)
                    <div class="uk-publication-grid uk-flex-middle uk-grid-large uk-grid-divider" uk-grid
                         uk-scrollspy="cls: uk-animation-slide-top-small; target:div, p, h1, a;  delay: 50; repeat: false;">
                        <!--  -->
                        <div class="uk-width-1-3@l">
                            <h1 class="f-24 f-w-500">
                                {{$value->title}}
                            </h1>
                        </div>
                        <!--  -->
                        <!--  -->
                        <div class="uk-width-expand@m">
                            <div class="uk-padding-small">
                                {!! $value->brief !!}
                            </div>
                        </div>
                        <!--  -->
                    </div>
            @endforeach
        @endif
        <!-- grid -->


        </div>
    </section>
    <!-- section end -->

@stop
