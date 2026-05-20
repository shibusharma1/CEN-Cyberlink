@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')

    <!-- section -->
    <section class="uk-section ">
        <div class="uk-container">
            <div class="uk-grid" uk-grid>
                <div class="uk-width-expand@m">
                    <h1 class="uk-h2 uk-text-bold uk-margin">{{$data->post_title}}</h1>
                    <!--  -->
                    <div class="uk-border-light-top uk-border-light-bottom uk-margin-bottom uk-padding-small">
                        <div class="uk-child-width-expand@s uk-flex-middle" uk-grid>
                            <div class="uk-text-muted"> {{$data->associated_title}} </div>
                            <div>
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div>
                                <!-- ShareThis END -->
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    @if($data->banner)
                    <figure class="uk-feature-image uk-margin-medium-bottom" uk-lightbox="">
                        <a href="{{asset('uploads/original/' . $data->banner)}}" data-caption="{{$data->sub_title}}">
                            <img src="{{asset('uploads/original/' . $data->banner)}}" alt=""> </a>
                        <figcaption>
                            {!! $data->sub_title !!}

                        </figcaption>
                    </figure>
                    @endif
                    
                    {!! $data->post_content !!}
                    
                    @if($documents->count()>0)
                    <table style="border-collapse: collapse; width: 100%;" border="1">
                        <tbody>
                             <tr>
                        <td style="width: 47.512%;"><strong>Title</strong></td>
                        <td style="width: 47.512%;"><strong>Document</strong></td>
                        </tr>
                        
                         @foreach($documents as $value)
                        <tr>
                        <td style="width: 47.512%;"><strong>{{$value->title}}</strong></td>
                        <td style="width: 47.512%;"><a href="{{asset('uploads/doc/'.$value->document)}}" target="_blank" rel="noopener"><strong>Download / View</strong></a></td>
                        </tr>
                         @endforeach
                        </tbody>
                        </table>
                        @endif
                    </div>
               
            </div>
        </div>
        <div id="uk-stop-sticky"></div>
    </section>
    <!-- section end -->


@stop