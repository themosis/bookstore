@extends('blade.layouts.main')

@section('main')
    <div class="wrapper">
        <div id="news" class="clearfix">
            <!-- Articles -->
            <div id="news--articles">
                @if($article)
                    <article class="single-article">
                        <div class="article--date">
                            <span>{{ get_the_date('d F Y', $article->ID) }}</span>
                        </div>
                        <span class="article--title"><h2>{{ $article->post_title }}</h2></span>
                        @if(has_post_thumbnail($article->ID))
                            {!! get_the_post_thumbnail($article->ID) !!}
                        @endif
                        <div class="article--excerpt clearfix">
                            <div class="article--excerpt__content">
                                {!! wpautop($article->post_content) !!}
                                <div class="article--navigation clearfix">
                                    @php(previous_post_link('%link', __("Previous", THEME_TEXTDOMAIN)))
                                    @php(next_post_link('%link', __("Next", THEME_TEXTDOMAIN)))
                                </div>
                            </div>
                        </div>
                    </article>
                @endif
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