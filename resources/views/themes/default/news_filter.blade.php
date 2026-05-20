<div class="uk-grid-expand uk-grid-column-small uk-grid-divider uk-grid-small" uk-grid
     uk-scrollspy="cls: uk-animation-slide-top-small; target: h1, p, a;  delay: 20; repeat: false;">
    <div class="uk-width-2-5@l uk-first-column">
        <div class="uk-news">
            <div class="uk-margin">
                <figure class="uk-media-250 uk-position-relative">
                    <a href="{{ url(geturl($result->first()['uri'], $result->first()['page_key'])) }}"> 
                      @if($result->first()->page_thumbnail)
                    <img class="uk-image" alt="" src="{{asset('uploads/original/'.$result->first()->page_thumbnail)}}">
                        @else
                        <img class="uk-image" src="{{asset('images/default.png')}}">
                        @endif
                    </a>
                </figure>
            </div>
            <h1 class=" uk-h4  uk-text-bold uk-margin-small">
                <a class="uk-margin-remove"
                   href="{{ url(geturl($result->first()['uri'], $result->first()['page_key'])) }}">{{$result->first()->post_title}}
                </a>
            </h1>
            <div class="uk-panel    uk-width-large@s">
                {!! $result->first()->post_excerpt !!}
            </div>
        </div>
    </div>
    <div class="uk-width-2-3@m uk-width-2-5@l">
        <div class="uk-margin">
            <div
                class="uk-child-width-1-1 uk-grid-medium uk-grid-divider uk-grid-match uk-grid uk-grid-stack"
                uk-grid="">
                <!--  -->
                @foreach($result->skip(1)->take(2) as $value)
                    <div class="uk-news">
                        <div class="uk-first-column">
                            <div class="uk-item uk-panel uk-margin-remove-first-child">
                                <div class="uk-child-width-expand uk-grid-small" uk-grid="">
                                    <div class="uk-width-1-3@s uk-flex-last@s">
                                        <div>
                                            <figure class="uk-media-100 uk-position-relative">
                                                <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}"> 
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
                                            <a class="uk-margin-remove"
                                               href="{{ url(geturl($value['uri'], $value['page_key'])) }}">{{$value->post_title}}</a>
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
                <!--  -->

                <!--  -->
            </div>
        </div>
    </div>
    <div class="uk-width-1-3@m uk-width-1-5@l">
        <ul class="uk-theme-list uk-list-divider">
            @foreach($result->skip(5)->take(5) as $value)
                <li><a href="{{ url(geturl($value['uri'], $value['page_key'])) }}">{{$value->post_title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
