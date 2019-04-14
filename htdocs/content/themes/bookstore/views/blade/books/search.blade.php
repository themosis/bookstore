@extends('blade.layouts.main')

@section('main')
    <div id="books" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Search results", THEME_TD) }}</h1>
        </div>
        <div id="books--collection">
            @if(have_posts())
                <ul class="books">
                    @php
                        $i = 0;
                    @endphp
                    @while(have_posts())
                        @php(the_post())
                        @if( 2 == $i % 3)
                            <li class="last">
                        @else
                            <li>
                        @endif
                            <div class="book">
                                <h3>{{ Loop::title() }}</h3>
                                @if(has_post_thumbnail())
                                    <a href="{{ Loop::link() }}" class="book-featured-box" style="background-color: {{ meta(Loop::id(), 'color', true) }};">
                                        {!! Loop::thumbnail('book-features-image') !!}
                                    </a>
                                @endif
                                <p>{{ Loop::excerpt() }}</p>
                                <div class="button-box">
                                    <a href="{{ Loop::link() }}" class="tiny-button">{{ __("Buy", THEME_TD) }}</a>
                                </div>
                            </div>
                        </li>
                        @php($i++)
                    @endwhile
                </ul>
            @else
                <h2>{{ sprintf('%s "%s"', __("Sorry, but we don't find any books related to:", THEME_TD), $searched_terms) }}</h2>
            @endif
        </div>
    </div>
@endsection