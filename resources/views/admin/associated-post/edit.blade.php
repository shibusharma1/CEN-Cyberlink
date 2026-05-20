@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
@if(Request::segment(3))
<a href="{{url('admin/associated/'.Request::segment(3).'/'.$data->post_id)}}" class="btn btn-primary btn-sm">Go Back</a>
@endif
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{url('admin/associated/'.Request::segment(3).'/'.Request::segment(4))}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
   <input type="hidden" name="_method" value="PUT" />
  <div class="col-md-8">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Edit Associated Post</span>
      </div>
      <div class="panel-body">
  <input type="hidden" name="post_id" value="{{Request::segment(4)}}" />
     <div class="form-group">
        <label for="title" class="col-lg-3 control-label">Title</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}" />
          </div>
        </div>
      </div>
       <div class="form-group">
       <label for="title" class="col-lg-3 control-label">Sub Title</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="title" name="sub_title" class="form-control" value="{{$data->sub_title}}" />
          </div>
        </div>
      </div>

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Brief</label>
     <div class="col-lg-8">
      <div class="bs-component">
        <div class="bs-component">
          <textarea class="form-control my-editor" id="" name="brief" rows="3" autocomplete="off">{{$data->brief}}</textarea>
        </div>
      </div>
    </div>
  </div>

        <div class="form-group">
            <label for="title" class="col-lg-3 control-label">Contact</label>
            <div class="col-lg-8">
                <div class="bs-component">
                    <input type="text" id="ordering" name="phone" value="{{$data->phone}}" class="form-control"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
                <div class="bs-component">
                    <input type="text" id="ordering" name="email"  value="{{$data->email}}" class="form-control"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-lg-3 control-label">Facebook Link</label>
            <div class="col-lg-8">
                <div class="bs-component">
                    <input type="text" id="ordering" name="facebook_link" value="{{$data->facebook_link}}" class="form-control"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-lg-3 control-label">Twitter Link</label>
            <div class="col-lg-8">
                <div class="bs-component">
                    <input type="text" id="ordering" name="twitter_link" value="{{$data->twitter_link}}" class="form-control"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-lg-3 control-label">LinkedIn Link</label>
            <div class="col-lg-8">
                <div class="bs-component">
                    <input type="text" id="ordering" name="linked_in_link" value="{{$data->linked_in_link}}" class="form-control"/>
                </div>
            </div>
        </div>

  <div class="form-group">
        <label for="title" class="col-lg-3 control-label">Ordering</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="ordering" name="ordering" class="form-control" value="{{$data->ordering}}" />
          </div>
        </div>
  </div>
  
<!--<div class="form-group">-->
<!--      <label class="col-lg-3 control-label">Icon</label>-->
<!--      <div class="col-lg-8">-->
<!--        <div class="bs-component">-->

<!--            <select id="template" name="icon" style="font-family: 'FontAwesome';">-->
<!--               @if($data->icon != NULL)-->
<!--                <option value="{{$data->icon}}" selected>{{$data->icon}}</option>-->
<!--                @else-->
<!--                 <option value="" selected>Choose Icon</option>-->
<!--                 @endif-->

<!--                <option value="coins">&#xf1c0; COINS </option>-->
<!--                 <option value="chart-bar">&#xf080; BAR </option>-->
<!--                  <option value="chart-line">&#xf201; LINE </option>-->
<!--                  <option value="newspaper">&#xf1ea; NEWSPAPER </option>-->
<!--                  <option value="user-plus">&#xf007; USER PLUS </option>-->
<!--                  <option value="briefcase">&#xf0b1; BRIEFCASE </option>-->
<!--                  <option value="lightbulb">&#xf0eb; LIGHTBULB </option>-->
<!--                  <option value="glasses">&#xf000; GLASSESS </option>-->
<!--                  <option value="clock">&#xf017; CLOCK </option>-->
<!--                  <option value="bullseye">&#xf140; BULLSEYE </option>-->
<!--                  <option value="wallet">&#xf07b; WALLET </option>-->
<!--                  <option value="star"> &#xf005; STAR</option>-->
<!--                  <option value="handshake"> HANDSHAKE </option>-->
<!--                    <option value="fingerprint">FINGERPRINT </option>-->

<!--          </select>  <i class="arrow"></i>-->

<!--        </div>-->
<!--      </div>-->
<!--    </div>-->

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Thumbnail</label>
     <div class="col-lg-8">
      <div class="bs-component">
        <div class="bs-component">
          <div id="xedit-demo">
            @if($data->thumbnail)
              <span class="id{{$data->id}}">
              <a href="#{{$data->id}}" class="imagedelete"></a>
              <img src="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $data->thumbnail) }}" width="150" />
              </span>
              <hr>
              @endif
         <input type="file" name="thumbnail" />
       </div>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-3 control-label" for=""> </label>
    <div class="col-lg-8">
      <div class="bs-component">
       <input type="submit" class="btn btn-primary btn-lg" value="Submit" />
     </div>
   </div>
 </div>


</div>
</div>
</div>

<div class="col-md-4"> </div>
</form>
@endsection
@section('scripts')
@endsection
