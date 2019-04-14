@extends('blade.layouts.main')

@section('main')
    <div id="blog" class="wrapper">
        @if(have_posts())
            <div class="bks-title-box">
                <h1>{!! get_the_archive_title() !!}</h1>
            </div>
            <div id="news" class="clearfix">
                <!-- Articles -->
                <div id="news--articles">
                    @while(have_posts())
                        @php(the_post())
                        <article>
                            <div class="article--date">
                                <span>{{ Loop::date('j F Y') }}</span>
                            </div>
                            <a href="{{ Loop::link() }}" class="article--title"><h2>{{ Loop::title() }}</h2></a>
                            @if(has_post_thumbnail())
                                {!! Loop::thumbnail() !!}
                            @endif
                            <div class="article--excerpt clearfix">
                                <div class="article--excerpt__content">
                                    {!! Loop::excerpt() !!}
                                    <a href="{{ Loop::link() }}" class="tiny-button yellow">{{ __("Read more", THEME_TD) }}</a>
                                </div>
                            </div>
                        </article>
                    @endwhile
                </div>
                <!-- End articles -->
                <!-- Sidebar -->
                <div id="news--sidebar">
                    <div class="sidebar">
                        @php(dynamic_sidebar('blog-sidebar'))
                    </div>
                </div>
                <!-- End sidebar -->
            </div>
        @else
            <p>{{ __("Sorry, no articles available", THEME_TD) }}</p>
        @endif
    </div>
@endsection