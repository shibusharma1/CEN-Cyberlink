@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <!-- banner -->
     @if($data->banner)
	<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgx: 80, 80 ;bgy: -50, -200" style="background:url({{asset('uploads/original/' . $data->banner)}});">
		@else
    <section class="bg-primary uk-position-relative uk-flex uk-flex-middle uk-text-center"
             uk-height-viewport="expand: true; min-height: 150;" uk-img uk-parallax="bgx: -80,-80;bgy: -0, 0"
             style="background: var(--bg-primary); background-size: cover; background-repeat: no-repeat;">
        @endif
        <div class="uk-overlay-primary  uk-position-cover "></div>
		<div class="uk-home-banner uk-width-1-1 uk-position-z-index">
			<div class="uk-container uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 550;">
				<div class="uk-width-1-1@l uk-width-1-1" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
					<h1 class="uk-text-bold uk-h4 text-white uk-margin-remove"> {{$pos_type->post_type}} 
         <i class="fa fa-angle-right uk-margin-left uk-margin-right"></i> <a href="#">{{$data_child->post_title}}</a></h1>
					<h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_title}}</h1> </div>
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
			<div class="uk-grid-large" uk-grid>
				<div class="uk-width-expand@s">
					 {!! $data->post_content !!}
				</div>
				<div class="uk-width-1-3@s">
					<div style="z-index: 9;" uk-sticky="media: @m; offset: 150; bottom: #uk-stop-sticky;">
						<div class="bg-white uk-box-shadow-medium ">
							<!--  -->
							@if($related->count()>0)
							<div class="uk-margin-medium-bottom">
								<div class="bg-primary uk-padding-small">
								<h1 class="uk-h5 uk-margin-remove text-white uk-text-bold">Related Programs</h1> </div>
							<ul class="uk-list  uk-list-striped uk-margin-remove-top">
							 @foreach($related as $value)
                                    <li class="">
                                        <h3 class="  uk-h5 uk-text-bold uk-margin-remove">
                                            <a href="{{url(strtolower($data_child->uri).'/'.geturl($value->uri))}}"
                                               class="">{{$value->post_title}}</a>
                                        </h3></li>
                                @endforeach
						
							</ul>
							</div>
							@endif
							<!--  -->
							<!--  -->
								@if($documents->count()>0)
							<div class=" ">
								<div class="bg-primary uk-padding-small">
								<h1 class="uk-h5 uk-margin-remove text-white uk-text-bold">Related Documents</h1> </div>
							<ul class="uk-list  uk-list-striped uk-margin-remove-top">
							@foreach($documents as $value)
                            <li class="">
                                <h3 class="  uk-h5 uk-text-bold uk-margin-remove">
                                    <a href="{{asset('uploads/doc/'.$value->document)}}" target="_blank" class="">{{$value->title}}</a>
                                </h3> </li>
                            @endforeach
							</ul>
							</div>
							@endif
							<!--  -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="uk-stop-sticky"></div>
	</section>
	<!-- end section -->
@stop
