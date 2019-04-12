@extends('blade.layouts.main')

@section('main')

    <div id="about" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ $page->post_title }}</h1>
        </div>
        <div id="about--content">
            {!! wpautop($page->post_content) !!}
        </div>
        @if(!empty($members))
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
                                    {!! wp_get_attachment_image($member->pic, 'member-pic') !!}
                                </div>
                                <div class="member--bio">
                                    <h4>{{ $member->full_name }}</h4>
                                    <p>{{ $member->job }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Blog -->
    @include('blade.blog.latest')
    <!-- End blog -->

@endsection