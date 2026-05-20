@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

    @if ($data->banner)
        <section
            class="uk-cover-container  uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center uk-position-relative "
            uk-parallax="bgy: -100; easing: -2;  "data-src="{{ asset('uploads/original/' . $data->banner) }}"
            uk-height-viewport="expand: true; min-height: 300;" uk-img>
        @else
            <section class="bg-primary uk-position-relative uk-flex uk-flex-middle uk-text-center"
                uk-height-viewport="expand: true; min-height: 150;" uk-img uk-parallax="bgx: -80,-80;bgy: -0, 0"
                style="background: var(--bg-primary); background-size: cover; background-repeat: no-repeat;">
    @endif
    <div class="uk-width-1-1 uk-position-z-index">
        <div class="uk-container">
            <h4 class="text-white uk-margin-remove"
                uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 20; repeat: false;"> {{ $pos_type->post_type }}
            </h4>
            <h1 class="uk-text-bolder text-white uk-margin-remove"
                uk-scrollspy="cls: uk-animation-slide-top-small;   delay: 30; repeat: false;">{{ $data->post_title }}</h1>
        </div>
    </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section">
        <div class="uk-container">
            {{-- <div class="uk-margin-medium uk-text-center">
                {!! $data->post_excerpt !!}
            </div> --}}

            <!-- ================= CONTENT SECTION ================= -->
            {{-- Shibu Changes Starts  --}}
            <style>
                .sidebar-program-item:hover {
                    background: #002573 !important;
                    color: #fff !important;
                    transform: translateX(4px);
                }

                .sidebar-program-item:hover span,
                .sidebar-program-item:hover i {
                    color: #fff !important;
                }

                .uk-transition-toggle:hover img {
                    transform: scale(1.05);
                }

                svg[data-svg="angle-right"] polyline {
                    stroke: #54B435;
                }
            </style>
            <section class="bg-white">
                <div class="uk-container">
                    <div class="uk-grid-large" uk-grid>
                        <!-- ================= MAIN CONTENT ================= -->
                        <div class="uk-width-2-3@m">
                            <!-- Featured Image -->
                            <div class="uk-border-rounded uk-overflow-hidden uk-box-shadow-small"
                                uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: false;">
                                <img src="{{ $data->page_thumbnail ? asset('uploads/original/' . $data->page_thumbnail) : asset('assets/cen/banner.png') }}"
                                    alt="{{ $data->post_title }}" class="uk-transition-toggle"
                                    style="width:100%;height:480px;object-fit:cover;transition:.7s;">
                            </div>

                            <!-- Meta -->
                            <div class="uk-flex uk-flex-wrap uk-flex-middle uk-margin-large-top uk-padding-bottom"
                                style="gap:40px;border-bottom:1px solid #e5e7eb;">

                                <!-- Category -->
                                <div class="uk-flex uk-flex-middle" style="gap:14px;">
                                    <div class="uk-flex uk-flex-center uk-flex-middle"
                                        style="width:44px;height:44px;border-radius:10px;background:#EDFBE2;">
                                        <svg width="30" height="30" viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg" data-svg="leaf">
                                            <path fill="#54B435"
                                                d="M546.2 9.2c-11.6-11.6-30.4-11.6-42 0L420.1 93.3C377 80.5 329.6 82 287.7 98.6
                                                                    214.6 127.7 160 195.3 160 272c0 19.5 3.1 38.3 8.8 56.1L9.2 487.7c-12.5 12.5-12.5 32.8 0 45.3
                                                                    12.5 12.5 32.8 12.5 45.3 0l157.1-157.1C230.7 384.9 249.5 388 269 388
                                                                    c76.7 0 144.3-54.6 173.4-127.7 16.6-41.9 18.1-89.3 5.3-132.4l84.1-84.1
                                                                    c11.6-11.6 11.6-30.4 0-42zM269 324c-35.3 0-64-28.7-64-64
                                                                    0-47.6 31.6-90.4 78.1-106.9 22.2-7.9 46.1-10 69.3-6.4
                                                                    -7.2 23.6-19.9 46.3-37.7 64.1C321.9 288.6 297.6 324 269 324z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="uk-margin-remove" style="font-size:14px;color:#9ca3af;">
                                            Category
                                        </p>
                                        <h4 class="uk-margin-remove" style="font-weight:600;color:#002573;">
                                            {{ $data->category->category ?? 'Climate Resilience' }}
                                        </h4>
                                    </div>
                                </div>
                                <!-- Location -->
                                <div class="uk-flex uk-flex-middle" style="gap:14px;">
                                    <div class="uk-flex uk-flex-center uk-flex-middle"
                                        style="width:44px;height:44px;border-radius:10px;background:#EDFBE2;">
                                        <svg width="30" height="30" viewBox="0 0 384 512"
                                            xmlns="http://www.w3.org/2000/svg" data-svg="location-dot">
                                            <path fill="#54B435"
                                                d="M168 0C75.2 0 0 75.2 0 168c0 118.7 168 344 168 344s168-225.3 168-344C336 75.2 260.8 0 168 0zm0 224
                                                         c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="uk-margin-remove" style="font-size:14px;color:#9ca3af;">
                                            Location
                                        </p>
                                        <h4 class="uk-margin-remove" style="font-weight:600;color:#002573;">
                                            {{ $data->location ?? 'Nepal' }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="uk-margin-large-top"
                                uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: false;">
                                <h2 style="font-size:32px;font-weight:700;color:#002573;">
                                    Description
                                </h2>
                                <div class="uk-margin-medium-top" style="color:#4b5563;line-height:2.2;font-size:16px;">
                                    {!! $data->post_content ??
                                        '<p>The project focuses on addressing climate change, disaster risk reduction and social inequality in Nepal.</p>' !!}
                                </div>
                            </div>
                            <!-- Highlight Quote -->
                            <div class="uk-margin-large-top"
                                uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: false;"
                                style="background:#F8FAFC;border-left:4px solid #54B435;border-radius:0 24px 24px 0;padding:40px;">
                                <p style="font-size:30px;font-style:italic;font-weight:500;color:#002573;line-height:1.8;">
                                    {{ $data->highlight_quote ?? '“Empowering local women and vulnerable communities is essential for achieving long-term climate resilience and sustainable development.”' }}
                                </p>
                            </div>
                            <!-- Additional Image -->
                            <div class="uk-margin-large-top uk-border-rounded uk-overflow-hidden uk-box-shadow-small"
                                uk-scrollspy="cls: uk-animation-slide-bottom-small; repeat: false;">
                                <img src="{{ $data->second_image ? asset('uploads/original/' . $data->second_image) : asset('assets/cen/fuel_economy.jpg') }}"
                                    alt="Program" style="width:100%;height:480px;object-fit:cover;transition:.7s;">
                            </div>
                        </div>

                        <!-- ================= SIDEBAR ================= -->
                        <aside class="uk-width-1-3@m">
                            <div style="position: sticky; top: 60px; width: 353px;">
                                <!-- Programs -->
                                <div class="uk-box-shadow-small"
                                    style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;">
                                    <!-- Heading -->
                                    <div style="padding:20px;border-bottom:1px solid #f3f4f6;background:#F8FAFC;">
                                        <h3 style="font-size:28px;font-weight:700;color:#002573;margin:0;">
                                            Programs
                                        </h3>
                                    </div>
                                    <!-- Menu -->
                                    <div>
                                        @foreach ($data_child->take(6) as $program)
                                            @php
                                                $isActive = $program->id == $data->id;
                                            @endphp
                                            <a href="{{ url(get_parent_name($program->id)->uri . '/' . geturl($program['uri'], $program['page_key'])) }}"
                                                class="uk-flex uk-flex-between uk-flex-middle uk-link-reset sidebar-program-item"
                                                style="padding:22px 28px;border-bottom:1px solid #f3f4f6;transition:.3s ease;background:{{ $isActive ? '#002573' : '#fff' }};color:{{ $isActive ? '#fff' : '#374151' }};font-weight:500;">
                                                <span style="color:inherit;">
                                                    {{ $program->post_title }}
                                                </span>
                                                <svg width="30" height="30" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" data-svg="angle-right">
                                                    <polyline fill="none" stroke="#000" stroke-width="1.5"
                                                        points="8 5 12 10 8 15"></polyline>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            {{-- Shibu changes ends here --}}
            <h3 class="uk-section" style="font-size:28px;font-weight:700;color:#002573;margin:0;">
                Latest Programs
            </h3>

            {{-- ----------------------------------------------------------------------------------------- --}}
            <ul class="uk-grid-medium uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s"
                uk-height-match="target:.uk-card-default" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 20; repeat: false;">
                <!--  -->
                @foreach ($data_child as $value)
                    <li>
                        <div>
                            <div class="bg-white uk-border-rounded uk-overflow-hidden uk-box-shadow-large">
                                <div class="uk-media-250 uk-position-relative">
                                    <a
                                        href="{{ url(get_parent_name($value->id)->uri . '/' . geturl($value['uri'], $value['page_key'])) }}">

                                        @if ($value->page_thumbnail)
                                            <img src="{{ asset('uploads/original/' . $value->page_thumbnail) }}"
                                                class="uk-transition-scale-down uk-transition-opaque" alt="">
                                        @else
                                            <img src="{{ asset('images/default.png') }}"
                                                class="uk-transition-scale-down uk-transition-opaque" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="uk-card uk-card-default  uk-card-body">
                                    <h1 class="uk-h4 uk-text-bold uk-margin-remove"><a
                                            href="{{ url(get_parent_name($value->id)->uri . '/' . geturl($value['uri'], $value['page_key'])) }}">
                                            {{ $value->post_title }} </a></h1>
                                    <div class="uk-text-small uk-margin-small">
                                        <span class="uk-project-status text-green">
                                            <svg width="30" height="30" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg" data-svg="check-circle">
                                                <circle cx="10" cy="10" r="8" fill="none"
                                                    stroke="#000" stroke-width="1.5"></circle>
                                                <polyline fill="none" stroke="#000" stroke-width="1.5"
                                                    points="6 10 9 13 14 7"></polyline>
                                            </svg>
                                            {{ $value->category ? $value->category->category : '' }}</span>
                                        {!! $value->post_excerpt !!}
                                        <a
                                            href="{{ url(get_parent_name($value->id)->uri . '/' . geturl($value['uri'], $value['page_key'])) }}">Read
                                            More <svg width="30" height="30" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg" data-svg="angle-right">
                                                <polyline fill="none" stroke="#000" stroke-width="1.5"
                                                    points="8 5 12 10 8 15"></polyline>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                <!--  -->

            </ul>
        </div>
    </section>
    <!-- section end -->
    {{ $data_child->links('themes.default.common.pagination') }}

@stop
