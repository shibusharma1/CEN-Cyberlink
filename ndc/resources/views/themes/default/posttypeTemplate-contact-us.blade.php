@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <!--pre loader end--><!-- banner -->
    <section class="bg-primary uk-background-norepeat uk-background-top-right uk-background-image@s
   uk-position-relative uk-flex uk-flex-middle uk-text-left"
             uk-height-viewport="expand: true; min-height: 150;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container text-white"
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:h2;  delay: 100; repeat: false;">
                <h2 class="f-30 f-w-600  uk-margin-small">{{$data->post_type}}</h2>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- section -->
    <section class="uk-section bg-light">
        <div class="uk-container uk-container-large">
            <div class="uk-child-width-expand@s" uk-grid uk-height-match="target:.uk-same-height"
                 uk-scrollspy="cls: uk-animation-slide-top-small; target:div, p, h1, a;  delay: 50; repeat: false;">
                <!--  -->
                <div>
                    <div class="uk-padding bg-white uk-box-shadow-medium uk-same-height">
                        <h1 class="uk-h4 f-w-400 ">Location</h1>
                        <ul class="uk-list-varticle  text-primary ">
                            <li class="uk-flex uk-flex-middle"><i
                                    class="fa fa-map-marker fa-2x uk-margin-small-right text-secondary"></i> <a
                                    href="https://www.google.com/maps/search/Pragati+Path,+Talchikhel,+Lalitpur,+Nepal/@27.6640202,85.3101432,15z/data=!3m1!4b1"
                                    target="_blank" class="text-black">{{$setting->location1}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--  -->

                <!--  -->
                <div>
                    <div class="uk-padding bg-white uk-box-shadow-medium uk-same-height">
                        <h1 class="uk-h4 f-w-400 ">Contact at</h1>
                        <ul class="uk-list-varticle  text-primary ">
                            <li class="uk-flex uk-flex-middle"><i
                                    class="fa fa-phone fa-2x uk-margin-small-right  text-secondary"></i> <a
                                    href="tel:{{$setting->phone}}" class="text-black">{{$setting->phone}}</a></li>
                        </ul>
                    </div>
                </div>
                <!--  -->

                <!--  -->
                <div>
                    <div class="uk-padding bg-white uk-box-shadow-medium uk-same-height">
                        <h1 class="uk-h4 f-w-400 ">Email us</h1>
                        <ul class="uk-list-varticle  text-primary ">
                            <li class="uk-flex uk-flex-middle"><i
                                    class="fa fa-envelope fa-2x uk-margin-small-right  text-secondary"></i> <a
                                    href="mailto:{{$setting->email_primary}}" class="text-black">{{$setting->email_primary}}</a></li>
                        </ul>
                    </div>
                </div>
                <!--  -->

            </div>
            <div class="uk-margin-medium-top">
               {!! $setting->google_map2 !!}
            </div>

        </div>
    </section>
    <!-- end section -->

@endsection
