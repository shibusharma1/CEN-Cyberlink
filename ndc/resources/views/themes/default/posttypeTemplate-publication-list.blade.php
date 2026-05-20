@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <!-- banner -->
    <section class="bg-primary uk-background-norepeat uk-background-top-right uk-background-image@s
   uk-position-relative uk-flex uk-flex-middle uk-text-left"
             uk-height-viewport="expand: true; min-height: 200;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container"
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:h2;  delay: 100; repeat: false;">


                <form class="uk-grid" action="{{route('search-publication')}}" method="post">
                    @csrf
                    <!--  -->
                    <div class="uk-width-1-2@m">
                        <h2 class="f-30 f-w-600  uk-margin-small  text-white">{{$data->post_type}}</h2>
                    </div>
                    <!--  -->


                    <!--  -->
                    <div class="uk-width-1-4@m">
                            <select class="publication_filter uk-select">
                                <option selected disabled>Select Year</option>
                                @foreach($category as $value)
                                    <option value="{{$value->id}}">{{$value->category}}</option>
                                @endforeach
                            </select>
                    </div>
                    <!--  -->
                    <!--  -->

                    <div class="uk-width-1-4@m">
                        <div class="uk-search uk-search-default bg-white">
                            <button class="uk-search-icon-flip" uk-search-icon></button>
                            <input class="uk-search-input" type="search" name="search" placeholder="Search">
                        </div>
                    </div>
                    <!--  -->

                </form>


            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="filter_result uk-section bg-light">
        <div class="uk-container"
             uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, a;  delay: 50; repeat: false;">
            <!--  -->
            <ul uk-grid class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s  uk-margin-bottom"
                uk-height-match="target: .uk-same-height">
                <!--  -->
                @foreach($posts as $value)

                    <li>
                        <div class="bg-white uk-box-shadow-medium uk-bordered-rounded uk-overflow-hidden ">
                            <div class="uk-media-250 uk-position-relative">
                                <a href="{{url(geturl($value['uri'],$value['page_key']))}}">
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
                                <h1 class="f-20 f-w-400 uk-margin-remove"><a
                                        href="{{url(geturl($value['uri'],$value['page_key']))}}">{{$value->post_title}}</a>
                                </h1>
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
            {{$posts->links()}}

        </ul>
    </nav>
@stop
