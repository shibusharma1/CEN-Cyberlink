<div class="uk-container"
     uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, a;  delay: 50; repeat: false;">
    <!--  -->
    <ul uk-grid class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s  uk-margin-bottom"
        uk-height-match="target: .uk-same-height">
        <!--  -->
        @foreach($result as $value)

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

        @if($result->isEmpty())
            <h3>No results found</h3>
    @endif
    <!--  -->

    </ul>
    <!--  -->
</div>
