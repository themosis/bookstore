@extends('blade.layouts.main')

@section('main')

    <div id="books" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Collection", THEME_TEXTDOMAIN) }}</h1>
        </div>
        <div id="books--collection">
            <ul class="books">
                @php
                    $modulo = 3;
                @endphp
                @foreach($books as $i => $book)
                    @if($modulo - 1 == $i % $modulo)
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
                            <p>{{ get_the_excerpt($book->ID) }}</p>
                            <div class="button-box">
                                <a href="{{ get_permalink($book->ID) }}" class="tiny-button">{{ __("Buy", THEME_TEXTDOMAIN) }}</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection