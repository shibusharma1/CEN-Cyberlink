<div class="uk-width-1-4@m">
	<div style="z-index: 9;" uk-sticky="media: @m; offset: 70; bottom: #uk-stop-sticky;">
	    
	    	<!--  -->
		@if($documents->count()>0)
		<div class="">
		<div class="uk-category-title uk-flex uk-flex-between uk-flex-middle ">
			<div>
				<h1 class="uk-h5 uk-text-bold uk-margin-remove uk-text-uppercase">Related Documents </h1> </div>
		</div>
		<ul class="uk-list  uk-list-striped uk-margin-remove-top">
		    @foreach($documents as $value)
			<li class=""><h3 class="  uk-h5 uk-text-bold uk-margin-remove">
            <a href="{{asset('uploads/doc/'.$value->document)}}" target="_blank" class="">{{$value->title}}</a>
         </h3> </li>
          @endforeach
						
		</ul>
		</div>
		@endif
		<!--  -->
		
		
		<!--  -->
		@if($related_event_news->count()>0)
		<div class="uk-margin-medium-bottom">
		<div class="uk-category-title uk-flex uk-flex-between uk-flex-middle ">
			<div>
				<h1 class="uk-h5 uk-text-bold uk-margin-remove uk-text-uppercase">You may like </h1> </div>
		</div>
		<ul class="uk-list  uk-list-striped uk-margin-remove-top">
		     @foreach($related_event_news as $value)
			<li class="">
				<h3 class="uk-h5 uk-text-bold uk-margin-remove">
            <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}" class="">{{$value->post_title}}</a>
                </h3> <span class="uk-text-muted">{{$value->associated_title}}</span>
            </li>
            @endforeach
			
		</ul>
		</div>
		@endif
		<!--  -->

	

	</div>
</div>