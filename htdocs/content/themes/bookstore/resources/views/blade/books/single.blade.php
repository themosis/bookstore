@extends('blade.layouts.main')

@section('main')

    <!-- Book promo -->
    <div id="bks-promo" style="background-color: {{ meta('color', $book->ID) }};">
        <div class="wrapper">
            <div class="promo-wrapper">
                <div class="promo-container">
                    <h1>{{ $book->post_title }}</h1>
                    <h5>{{ sprintf('%s %s', __("By", THEME_TEXTDOMAIN), meta('author', $book->ID)) }}</h5>
                    <a href="#" class="big-button">{{ __("Buy the book", THEME_TEXTDOMAIN) }}</a>
                </div>
                <div class="promo-media">
                    <img src="{{ wp_get_attachment_image_url(meta('promo-image', $book->ID), 'book-promo') }}" alt="{{ $book->post_title }}" width="399" height="435">
                </div>
            </div>
        </div>
    </div>
    <!-- End book promo -->
    <!-- Book content -->
    <div class="wrapper">
        <div id="book--container">
            <div class="bks-title-box">
                <h1>{{ __("Content", THEME_TEXTDOMAIN) }}</h1>
            </div>
            <div id="book--content">
                {!! wpautop($book->post_content) !!}
            </div>
        </div>
    </div>
    <!-- End book content -->
    <!-- Recommended books -->
    <div class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Recommandations", THEME_TEXTDOMAIN) }}</h1>
        </div>
        <div id="popular-container">
            <ul class="books">
                @foreach($books as $i -> $book)
                    @if(2 == $i % 3)
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
                            @if(!empty($book->post_excerpt))
                                <p>{{ $book->post_excerpt }}</p>
                            @else
                                <p>{{ wp_trim_words($book->post_content, 10) }}</p>
                            @endif
                            <div class="button-box">
                                <a href="{{ get_permalink($book->ID) }}" class="tiny-button">{{ __("Buy", THEME_TEXTDOMAIN) }}</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- End recommended books -->

@endsection