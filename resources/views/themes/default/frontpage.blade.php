@extends('themes.default.common.master')
@section('content')

    <!-- slider -->
    <div class="uk-position-relative uk-visible-toggle    " tabindex="-1"
         uk-slider="autoplay: true; autoplay-interval: 4000; pause-on-hover: true; clsActivated: uk-transition-active;  ">
        <ul class="uk-home-banner uk-slider-items uk-child-width-1-1">
            @if($banners->count()>0)
            @foreach($banners as $value)
                <li>
                    <div class="uk-media-600 uk-home-banner-img"><img
                            src="{{asset('uploads/banners/' . $value->picture)}}" alt="home banner"></div>
                    <div class="  uk-position-bottom   uk-transition-slide-bottom uk-padding-large">
                        <div class="uk-container">
                            <ul class="uk-grid-medium" uk-grid>
                                <li class="uk-width-1-2@s">
                                    <h1 class=" uk-h1 text-white uk-text-bold uk-position-relative uk-margin-remove">
                                        <span>{{$value->title}}</span>
                                    </h1></li>
                                <li class="uk-width-expand@s">
                                    <p class="text-white">
                                        {{$value->caption}}
                                    </p> <a href="{{$value->link}}"
                                            class="uk-button uk-button-large uk-button-white-outline">
                                        {{$value->link_title}}</a></li>
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
    <!-- section -->
    <section class="uk-section-large uk-padding-remove-top bg-light">
        <div class="uk-container ">
            <div class="tab-wrapper uk-margin-large-top ">
                <ul class="uk-flex uk-flex-center uk-home-tab uk-margin-large-bottom uk-box-shadow-large"
                    data-uk-tab="{connect:'#hometab'}"
                    uk-scrollspy="cls: uk-animation-slide-left-small; target:a;  delay: 100; repeat: false">
                    @if ($navigations->count())
                        @foreach ($navigations as $row)
                            @if ($loop->iteration == 2)
                                @foreach (has_posts($row->id) as $_row)
                                    <li><a href="">{{$_row->post_title}}</a></li>
                                @endforeach

                               
                </ul>
                <ul id="home-tab" class="uk-switcher uk-margin-small">
                    <!--  -->
                    @foreach (has_posts($row->id) as $_key => $_row)
                        @if ($_key >= 3)

                            @continue
                        @endif
                        <li>
                            <ul class="uk-grid-medium uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-margin-medium-bottom"
                                uk-height-match="target:.uk-card-default" uk-grid
                                uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, p, a;  delay: 20; repeat: false;">
                                <!--  -->
                                @if(has_child_post($_row->id))
                                    @foreach (has_child_post($_row->id)->slice(0, 3) as $__row)
                                        <li>
                                            <div>
                                                <div
                                                    class="bg-white uk-border-rounded uk-overflow-hidden uk-box-shadow-large">
                                                    <div class="uk-media-250 uk-position-relative">
                                                        <a href="{{url(strtolower($_row->uri).'/'.geturl($__row->uri))}}">
                                                        @if($__row->page_thumbnail)
                                                    <img src="{{asset('uploads/original/' . $__row->page_thumbnail)}}">
                                                        @else
                                                        <img src="{{asset('images/default.png')}}">
                                                        @endif </a>
                                        
                                                    </div>
                                                    <div class="uk-card uk-card-default  uk-card-body">
                                                    <h1 class="uk-h4 uk-text-bold uk-margin-remove"><a
                                                            href="">{{$__row->post_title}}</a></h1>
                                                    <div class="uk-text-small uk-margin-small">
                                                        @if($__row->post_category == 5)
                                                            <span class="uk-project-status text-yellow"><i
                                                                    class="fa fa-check-circle"></i> Ongoing </span>
                                                        @else
                                                            <span class="uk-project-status text-green"><i
                                                                    class="fa fa-flag-o"></i> Completed</span>
                                                        @endif
                                                        {!! $__row->post_excerpt !!}<br>

                                                        <a href="{{url(strtolower($_row->uri).'/'.geturl($__row->uri))}}">Read
                                                            More <i class="fa fa-angle-right fa-lg"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach
                            @endif
                            <!--  -->

                            </ul>
                            <div class="uk-text-center"><a href="{{url(geturl($_row->uri))}}" class="uk-button uk-button-large uk-button-primary-outline">
                                    View All
                                    <span class="uk-icon " uk-icon="icon:arrow-right; ratio: 1.5"
                                          uk-scrollspy="cls: uk-animation-slide-right; delay: 400; repeat: false;"></span>
                                </a></div>
                        </li>
                    @endforeach


                    @endif
                    @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section class="uk-section-large  uk-padding-remove-bottom bg-primary uk-position-relative">
        <!-- section -->
        <div class="uk-container ">
            <div class="bg-white uk-pull-top uk-box-shadow-medium uk-border-rounded">
                <div class="uk-child-width-1-4@s uk-child-width-1-2 uk-text-center uk-grid-divider uk-grid-small"
                     id="counter" uk-grid
                     uk-scrollspy="cls: uk-animation-slide-left-small; target:div, div;  delay: 20; repeat: false;">
                    <div>
                        <div class="uk-padding">
                            <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field1}}">0</span>
                            </h2>
                            <p class="uk-margin-remove">{{$setting->website2}}</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-padding">
                            <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field2}}">0</span>
                            </h2>
                            <p class="uk-margin-remove">{{$setting->email_secondary}}</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-padding">
                            <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field3}}">0</span>
                            </h2>
                            <p class="uk-margin-remove">{{$setting->address2}}</p>
                        </div>
                    </div>
                    <div class="uk-padding">
                        <h2 class="uk-h1 text-secondary uk-text-bold uk-margin-remove"><span class="count" data-count="{{$setting->field4}}">0</span>
                        </h2>
                        <p class="uk-margin-remove">{{$setting->location2}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section -->
        <div class="uk-container">
            <div
                class="uk-grid-large uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-margin-large-bottom"
                uk-height-match="target:.bg-white" uk-grid
                uk-scrollspy="cls: uk-animation-slide-top-small; target: h1, p, a;  delay: 20; repeat: false;">
                <!--  -->
                <div>
                    <h1 class="text-white uk-h2  uk-text-bold uk-position-relative uk-margin-medium-bottom">
                        <span>{{$podcast->post_title}}</span>
                    </h1>
                     @if(video_gallery()->count() > 0)
                    <div class="bg-white uk-border-rounded uk-overflow-hidden uk-box-shadow-large">
                       
                         @foreach(video_gallery()->take(3) as $row )
                            {!! $row->video !!}	
                        @endforeach


                        <div class="uk-padding-small"><a href="{{url(geturl($podcast->uri))}}" class="uk-button uk-button-primary">View
                                More <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></div>
                    </div>
                    @endif
                </div>
                <!--  -->
                <div>
                    <h1 class=" text-white uk-h2  uk-text-bold uk-position-relative uk-margin-medium-bottom">
                        <span>{{$resource->post_type}}</span>
                    </h1>
                    <!--  -->
                    <div class="bg-white uk-border-rounded uk-overflow-hidden uk-box-shadow-large">
                        <ul class=" uk-list-resources">
                            <!--  -->
                            @foreach($res_child as $value)
                                <li>
                                    <div uk-grid="" class="uk-grid-small uk-grid uk-grid-stack">
                                        <div class="uk-child-width-expand uk-grid-column-small uk-grid uk-first-column"
                                             uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <div class="uk-media-100">
                                                    <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}"> 
                                                      @if($value->page_thumbnail)
                                                    <img class="uk-image" alt="" src="{{asset('uploads/original/'.$value->page_thumbnail)}}">
                                                        @else
                                                        <img class="uk-image" src="{{asset('images/default.png')}}">
                                                        @endif
                                                   
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="uk-margin-remove-first-child">
                                                <p class=" uk-text-bold uk-margin-top uk-margin-medium-right uk-margin-small-bottom">
                                                    <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}"
                                                       class="">{{$value->post_title}}</a></p> <span
                                                    class="uk-text-meta">{{$value->associated_title}}</span></div>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                        <!--  -->
                        </ul>
                        <div class="uk-padding-small"><a href="{{ url('page/' . posttype_url($resource->uri)) }}"
                                                         class="uk-button uk-button-primary">View More <i
                                    class="fa fa-angle-right fa-lg" aria-hidden="true"></i></a></div>
                    </div>
                    <!--  -->
                </div>
                <!--  -->
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-category-title uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom ">
                <div>
                    <h1 class="uk-h3  uk-margin-remove"> Media & Information </h1></div>
                <div>
                    <select name="" id="" class="news_sort uk-select-home">
                        <option value="" selected disabled>Select</option>
                        @foreach($news as $value)
                        <option  value="{{$value->id}}">{{$value->post_title}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
           <div class="uk-category-body filter_result">
                <div class="uk-grid-expand uk-grid-column-small uk-grid-divider uk-grid-small" uk-grid
                     uk-scrollspy="cls: uk-animation-slide-top-small; target: h1, p, a;  delay: 20; repeat: false;">
                    <div class="uk-width-2-5@l uk-first-column">
                        @foreach($news_list->slice(0, 1) as $value)
                           
                                <div class="uk-news">
                                    <div class="uk-margin">
                                        <figure class="uk-media-250 uk-position-relative">
                                            <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">
                                                 @if($value->page_thumbnail)
                                                    <img class="uk-image" alt="" src="{{asset('uploads/original/'.$value->page_thumbnail)}}">
                                                        @else
                                                        <img class="uk-image" src="{{asset('images/default.png')}}">
                                                        @endif
                                        </figure>
                                    </div>
                                    <h1 class=" uk-h4  uk-text-bold uk-margin-small">
                                        <a class="uk-margin-remove" href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">{{$value->post_title}}
                                        </a>
                                    </h1>
                                    <div class="uk-panel    uk-width-large@s">
                                        {!! $value->post_excerpt !!}
                                    </div>
                                </div>
                           
                        @endforeach
                    </div>
                    <div class="uk-width-2-3@m uk-width-2-5@l">
                        <div class="uk-margin">
                            <div
                                class="uk-child-width-1-1 uk-grid-medium uk-grid-divider uk-grid-match uk-grid uk-grid-stack"
                                uk-grid="">
                                <!--  -->
                                @foreach($news_list->slice(1, 2) as $value)
                                <div class="uk-news">
                                    <div class="uk-first-column">
                                        <div class="uk-item uk-panel uk-margin-remove-first-child">
                                            <div class="uk-child-width-expand uk-grid-small" uk-grid="">
                                                <div class="uk-width-1-3@s uk-flex-last@s">
                                                    <div>
                                                        <figure class="uk-media-100 uk-position-relative">
                                                            <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}"> 
                                                             @if($value->page_thumbnail)
                                                    <img class="uk-image" alt="" src="{{asset('uploads/original/'.$value->page_thumbnail)}}">
                                                        @else
                                                        <img class="uk-image" src="{{asset('images/default.png')}}">
                                                        @endif
                                                        </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="uk-margin-remove-first-child uk-first-column">
                                                    <h1 class=" uk-h5  uk-text-bold uk-margin-remove">
                                                        <a class="uk-margin-remove" href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">{{$value->post_title}}</a>
                                                    </h1>
                                                    <div class="uk-content uk-panel uk-margin-top">
                                                        {!! $value->post_excerpt !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   
                            @endforeach
                                <!--  -->
                                
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-3@m uk-width-1-5@l">
                        <ul class="uk-theme-list uk-list-divider">
                            @foreach($news_list->slice(3, 5) as $value)
                            <li><a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">{{$value->post_title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    <!-- section -->
    <section class="uk-section bg-light">
        <div class="uk-container">
            <h1 class="uk-h3 text-primary uk-text-bold uk-position-relative"> <span>
         Our Networks
         </span>
            </h1>
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                <ul class="uk-slider-items uk-child-width-1-2  uk-child-width-1-4@m uk-grid-small" uk-grid style="gap:5px;">
                    @foreach($network as $value)
                        <li style="height: 120px;background: white; text-align: center;">
                            <a href="{{$value->external_link}}" target="_blank"> @if($value->page_thumbnail)
                            <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}" style="height: 100px; margin-top: 7px;">
                                @else
                                <img src="{{asset('images/default.png')}}" style="height: 100px; margin-top: 7px;">
                                @endif</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- section end -->
<!-- modal start -->
    <!--  -->
    @if($popup->count()>0)
            @foreach($popup as $value)
    <div id="modal-group-{{$loop->iteration}}" class="uk-modal onload">
        <div class="uk-modal-dialog">
            <!-- <button class="uk-modal-close-default" type="button" uk-close></button> -->
            <div class="uk-modal-body">
                <p>{{$value->title}}</p>
                <div class="uk-text-center">
                    <img src="{{asset('uploads/banners/' . $value->picture)}}">
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                @if($value->link)
                 <a href="{{$value->link}}"> <button class="uk-button uk-button-primary" type="button">{{$value->link_title}}</button></a>
                  @endif
                 @if($loop->last)
                <button class="uk-button uk-button-danger uk-modal-close" type="button">Close</button>
                @else
                <a href="#modal-group-{{$loop->iteration+1}}" class="uk-button uk-button-primary" uk-toggle>Next</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <!--  -->
    
    <!-- modal end -->
@endsection

@section('libraries')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.alert').hide(8000);
        });


    </script>
@endsection
