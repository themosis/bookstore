@extends('blade.layouts.main')

@section('main')

    <div id="books" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Collection", THEME_TD) }}</h1>
        </div>
        <div id="books--collection">
            <ul class="books">
                @php
                    $modulo = 3;
                    $i = 0;
                @endphp
                @loop
                    @if($modulo - 1 == $i % $modulo)
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
                @endloop
            </ul>
        </div>
    </div>

@endsection