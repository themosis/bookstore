@extends('blade.layouts.main')

@section('main')
    <div id="books" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Search results", THEME_TEXTDOMAIN) }}</h1>
        </div>
        <div id="books--collection">
            @if(!empty($books))
                <ul class="books">
                    @foreach($books as $i -> $book)
                        @if( 2 == $i % 3)
                            <li class="last">
                        @else
                            <li>
                        @endif
                            <div class="book">
                                <h3>{{ $book->post_title }}</h3>
                                @if(has_post_thumbnail($book->ID))
                                    <a href="{{ get_permalink($book->ID) }}" class="book-featured-box" style="background-color: {{ meta('color', $book->ID) }};">
                                        {!! get_the_post_thumbnail($book->ID, 'book-features-image') !!}
                                    </a>
                                @endif
                                <p>{{ $book->post_excerpt }}</p>
                                <div class="button-box">
                                    <a href="{{ get_permalink($book->ID) }}" class="tiny-button">{{ __("Buy", THEME_TEXTDOMAIN) }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h2>{{ sprintf('%s "%s"', __("Sorry, but we don't find any books related to:", THEME_TEXTDOMAIN), $searched_terms) }}</h2>
            @endif
        </div>
    </div>
@endsection