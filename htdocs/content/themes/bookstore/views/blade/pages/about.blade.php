@extends('blade.layouts.main')

@section('main')
    @loop
        <div id="about" class="wrapper">
            <div class="bks-title-box">
                <h1>{{ Loop::title() }}</h1>
            </div>
            <div id="about--content">
                {!! Loop::content() !!}
            </div>
            @if(isset($members) && $members->isNotEmpty())
                <div id="about--team">
                    <ul>
                        @foreach($members as $i => $member)
                            @if(!$i % 3)
                                <li class="last">
                            @else
                                <li>
                            @endif
                                <div class="member clearfix">
                                    <div class="member--picture">
                                        {!! wp_get_attachment_image(meta($member->ID, 'th_pic', true), 'medium') !!}
                                    </div>
                                    <div class="member--bio">
                                        <h4>{{ $member->post_title }}</h4>
                                        <p>{{ meta($member->ID, 'th_job', true) }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endloop
    <!-- Blog -->
    @include('blade.blog.latest')
    <!-- End blog -->

@endsection