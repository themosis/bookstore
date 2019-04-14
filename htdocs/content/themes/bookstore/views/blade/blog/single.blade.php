@extends('blade.layouts.main')

@section('main')
    <div class="wrapper">
        <div id="news" class="clearfix">
            <!-- Articles -->
            <div id="news--articles">
                @loop
                    <article class="single-article">
                        <div class="article--date">
                            <span>{{ Loop::date('d F Y') }}</span>
                        </div>
                        <span class="article--title"><h2>{{ Loop::title() }}</h2></span>
                        @if(has_post_thumbnail())
                            {!! Loop::thumbnail() !!}
                        @endif
                        <div class="article--excerpt clearfix">
                            <div class="article--excerpt__content">
                                {!! Loop::content() !!}
                                <div class="article--navigation clearfix">
                                    @php(previous_post_link('%link', __("Previous", THEME_TD)))
                                    @php(next_post_link('%link', __("Next", THEME_TD)))
                                </div>
                            </div>
                        </div>
                    </article>
                @endloop
            </div>
            <!-- End Articles -->
            <!-- Sidebar -->
            <div id="news--sidebar">
                <div class="sidebar">
                    @php(dynamic_sidebar('blog-sidebar'))
                </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
    <!-- Blog -->
    @include('blade.blog.latest')
    <!-- End Blog -->
@endsection