  @if(has_posts($data->post_type)->count() > 0)
 <div class="small-nav-inner">
         <ul class="about-nav d-flex justify-content-around">
             @foreach(has_posts($data->post_type) as $row)
            <li class="{{(Request::segment(1) == geturl($row['uri'],$row['page_key']))?'active':''}}">
               <a href="{{ geturl($row['uri'],$row['page_key']) }}">{{$row->post_title}} </a>
            </li> 
            @endforeach           
         </ul>
      </div>
@endif