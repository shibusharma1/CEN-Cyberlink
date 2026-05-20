@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle uk-text-center" uk-height-viewport="expand: true; min-height: 150;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1;  delay: 100; repeat: false;">
                <h1 class="uk-text-bold uk-h4 text-white uk-margin-remove">{{$pos_type->post_type}}</h1>
                <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_title}}</h1> </div>
    </section>
    <!-- end banner -->
    <section class="uk-section bg-light">
        <div class="uk-container ">
            <div class="uk-grid-large  uk-child-width-1-3@m uk-text-center" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:div;  delay: 20; repeat: false;">
                <!--  -->
                @foreach($associated_posts as $value)
                <div>
                    <div class="uk-border-rounded uk-overflow-hidden uk-text-center bg-white uk-box-shadow-large">
                        <div class="uk-member-holder">
                            <a href="" uk-toggle="target:#members-details-{{$loop->iteration}}">
                                <div class="uk-member-img">  
                                @if($value->thumbnail)
                                   <img src="{{asset('uploads/original/' . $value->thumbnail)}}" class="uk-border-circle" alt="">
                                        @else
                                        <img src="{{asset('images/users.jpg')}}" class="uk-border-circle" alt="">
                                        @endif
                                        </a>
                                         </div>
                                <h1 class="uk-h4 text-primary uk-margin-remove uk-text-bold">{{$value->title}}</h1>
                                <h2 class="uk-h5 uk-display-block text-secondary  uk-margin-remove">{{$value->sub_title}}</h2> </a>
                            <!-- social media -->
                            <div class="uk-social-icon uk-margin-small-top">
                                 @if($value->facebook_link)
                                <a href="{{$value->facebook_link}}" target="_blank"> <span class=" uk-icon" uk-icon="icon: facebook; width: 15; height: 15;">
                                </span> </a>
                                @endif
                                 @if($value->twitter_link)
                                        <a href="{{$value->twitter_link}}" target="_blank"> <span class=" uk-icon" uk-icon="icon: twitter; width: 15; height: 15;">
                                </span> </a>
                                 @endif
                                 @if($value->linked_in_link)
                                <a href="{{$value->linked_in_link}}" target="_blank"> <span class=" uk-icon" uk-icon="icon: linkedin; width: 15; height: 15;"></span> </a>
                                  @endif
                            </div>
                           
                            <!-- social media -->
                        </div>
                    </div>
                </div>
            @endforeach
                <!--  -->

            </div>
        </div>
    </section>
   
    <!-- member details -->
    @foreach($associated_posts as $value)
        <div id="members-details-{{$loop->iteration}}" class="uk-modal" uk-modal>
            <div class="uk-modal-dialog">
                <div class="uk-text-center uk-member-holder uk-padding-remove uk-box-shadow-small">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-text-center uk-padding-small">
                        <div class="uk-member-img"> 
                        @if($value->thumbnail)
                                   <img src="{{asset('uploads/original/' . $value->thumbnail)}}" class="uk-border-circle" alt="">
                                        @else
                                        <img src="{{asset('images/users.jpg')}}" class="uk-border-circle" alt="">
                                        @endif </div>
                        <h1 class="uk-h3 text-primary uk-margin-remove uk-text-bold">{{$value->title}}</h1>
                        <h2 class="uk-h5 uk-display-block text-secondary  uk-margin-remove">{{$value->sub_title}}</h2> </div>
                        @if($value->facebook_link || $value->twitter_link || $value->linked_in_link)
                    <div class="uk-border-light-top uk-padding-small ">
                        <div class="uk-social-icon uk-grid-small uk-grid-divider uk-flex-middle uk-flex-center " uk-grid>
                            @if($value->facebook_link)
                            <div>
                        <a href="{{$value->facebook_link}}" target="_blank"> <span class=" uk-icon  text-black" uk-icon="icon: facebook; width: 20; height: 20;"></span> </a>
                            </div>
                            @endif
                            @if($value->twitter_link)
                            <div>
                            <a href="{{$value->twitter_link}}" target="_blank"> <span class=" uk-icon  text-black" uk-icon="icon: twitter; width: 20; height: 20;"></span> </a>
                            </div>
                            @endif
                             @if($value->linked_in_link)
                            <div>
                                  <a href="{{$value->linked_in_link}}" target="_blank"> <span class=" uk-icon text-black" uk-icon="icon: linkedin; width: 20; height: 20;"></span> </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @if($value->phone || $value->email)
                     <div class="uk-border-light-top uk-border-light-bottom ">
                        <div class="uk-padding-small">
                            <div class=" uk-grid uk-flex-middle uk-flex-center text-primary" uk-grid>
                                @if($value->phone)<div> <i class="fa fa-phone uk-margin-small-right"></i>  {{$value->phone}}    </div>@endif
                                 @if($value->email)<div> <i class="fa fa-envelope uk-margin-small-right"></i>  {{$value->email}} </div>@endif
                            </div>
                        </div>
                    </div> 
                    @endif
                </div>
                <div class="uk-modal-body" uk-overflow-auto>
                {!!$value->brief!!}                </div>
                <div class="uk-padding-small"></div>
            </div>
        </div>

    @endforeach
    <!-- end details -->

    @stop
