@extends('blade.layouts.main')

@section('main')
    <div id="blog" class="wrapper">
        <div class="bks-title-box">
            @if(isset($title) && !empty($title))
                <h1>{{ $title }}</h1>
            @else
                <h1>{{ __("Latest News", THEME_TEXTDOMAIN) }}</h1>
            @endif
        </div>
        <div id="news" class="clearfix">
            <!-- Articles -->
            @if(!empty($articles))
                <div id="news--articles">
                    @foreach($articles as $article)
                        <article>
                            <div class="article--date">
                                <span>{{ get_the_date('j F Y', $article->ID) }}</span>
                            </div>
                            <a href="{{ get_permalink($article->ID) }}" class="article--title"><h2>{{ $article->post_title }}</h2></a>
                            @if(has_post_thumbnail($article->ID))
                                {!! get_the_post_thumbnail($article->ID) !!}
                            @endif
                            <div class="article--excerpt clearfix">
                                <div class="article--excerpt__content">
                                    <p>{{ $article->post_excerpt }}</p>
                                    <a href="{{ get_permalink($article->ID) }}" class="tiny-button yellow">{{ __("Read more", THEME_TEXTDOMAIN) }}</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p>{{ __("Sorry, no articles available", THEME_TEXTDOMAIN) }}</p>
            @endif
            <!-- End articles -->
            <!-- Sidebar -->
            <div id="news--sidebar">
                <div class="sidebar">
                    @php(dynamic_sidebar('blog-sidebar'))
                </div>
            </div>
            <!-- End sidebar -->
        </div>
    </div>
@endsection