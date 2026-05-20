<!-- footer start -->
<footer>
    <section class="uk-padding-large uk-background-norepeat uk-background-bottom-right uk-background-image@s" uk-img
             uk-parallax="bgx: -50,-50;bgy: 0, -20"
             style="background: var(--bg-primary) url('images/cyberlink.png');   background-repeat: no-repeat;">
        <div class="uk-container">
            <div class=" uk-grid-small uk-child-width-1-5@m uk-child-width-1-2@s " uk-grid uk-grid
                 uk-scrollspy="cls: uk-animation-slide-left-small; target:li, h5;  delay: 20; repeat: false;">
                <!--  -->
                <div>
                    @foreach ($navigations as $row)
                        @if ($loop->iteration == 3)
                            <h5 class=" uk-text-bold text-white">{{$row->post_type}}</h5>
                            <ul class="uk-list">
                                @if (getposts($row->id)->count() > 0)
                                    @foreach (getposts($row->id) as $_row)
                                        <li>
                                            <a href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}"
                                               title="">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    @endforeach
                </div>
                <!--  -->
                <!--  -->
                <div>
                    @foreach ($navigations as $row)
                        @if ($loop->iteration == 1)
                            <h5 class=" uk-text-bold text-white">{{$row->post_type}}</h5>
                            <ul class="uk-list">
                                @if (getposts($row->id)->count() > 0)
                                    @foreach (getposts($row->id) as $_row)
                                        <li>
                                            <a href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}"
                                               title="">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    @endforeach
                </div>
                <!--  -->
                <!--  -->
                <div>
                    @foreach ($navigations as $row)
                        @if ($loop->iteration == 2)
                            <h5 class=" uk-text-bold text-white">{{$row->post_type}}</h5>
                            <ul class="uk-list">
                                @foreach (has_posts($row->id) as $_row)
                                    <li><a href="{{url(geturl($_row->uri))}}">{{$_row->post_title}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </div>
                <!--  -->
                <!--  -->
                <div>
                    @foreach ($navigations as $row)
                        @if ($loop->iteration == 5)
                            <h5 class=" uk-text-bold text-white">{{$row->post_type}}</h5>
                            <ul class="uk-list">
                                @if (getposts($row->id)->count() > 0)
                                    @foreach (getposts($row->id) as $_row)
                                        <li>
                                            <a href="{{ url(geturl($_row['uri'], $_row['page_key'])) }}"
                                               title="">{{ \Illuminate\Support\Str::ucfirst($_row->post_title) }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    @endforeach
                </div>
                <!--  -->
                <!--  -->
                <div>
                    <h5 class=" uk-text-bold  text-white"> Contact </h5>
                    <ul class="uk-list text-white">
                        <li class=" uk-flex"><i
                                class="fa fa-map-marker uk-margin-small-right uk-text-large"></i>{{$setting->location1}}
                        </li>
                        <li class=" uk-flex"><i
                                class="fa fa-phone uk-margin-small-right uk-text-large"></i>{{$setting->phone2}}</li>
                        <li class=" uk-flex"><i
                                class="fa fa-envelope uk-margin-small-right uk-text-large"></i>{{$setting->email_primary}}
                        </li>
                    </ul>
                </div>
                <!--  -->
            </div>
            <!--  -->
        </div>
    </section>
    <div class="uk-text-center text-black uk-margin">
        <div class="uk-container">
            <div class="uk-grid-small uk-flex uk-flex-between uk-flex-middle" uk-grid>
                <!--  -->
                <div>{!!$setting->copyright_text!!}</div>
                <!--  -->
                <!--  -->
                <div>
                    <div id="social" class="uk-margin-small">
                        @if($setting->facebook_link)
                        <a class="facebookBtn smGlobalBtn" href="{{$setting->facebook_link}}" target="_blank"></a>
                        @endif
                         @if($setting->twitter_link)
                        <a class="twitterBtn smGlobalBtn" href="{{$setting->twitter_link}}" target="_blank"></a>
                        @endif
                         @if($setting->experience)
                        <a class="youtubeBtn smGlobalBtn" href="{{$setting->experience}}" target="_blank"></a>
                        @endif
                         @if($setting->instagram_link)
                        <a class="instagramBtn smGlobalBtn" href="{{$setting->instagram_link}}" target="_blank"></a>
                        @endif
                         @if($setting->linkedin_link)
                        <a class="linkedinBtn smGlobalBtn" href="{{$setting->linkedin_link}}" target="_blank"></a>
                        @endif
                        
                    </div>
                </div>
                <!--  -->
                <!--  -->
                <div>Made with <i class="fa fa-heart text-red"></i> by <a href="" class="text-primary">Cyberlink Pvt.
                        Ltd.</a></div>
                <!--  -->
            </div>
        </div>
</footer>
<!-- footer end -->
<!-- required javascript  -->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/player.js')}}"></script>
<script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=6072c7cf406a11001102de2a&product=sop'
        async='async'></script>
</body>

</html>
