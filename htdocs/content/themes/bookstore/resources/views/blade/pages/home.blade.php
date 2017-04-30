@extends('blade.layouts.main')

@section('main')

    <!-- Book Promo -->
    <div id="bks-promo" style="background-color: {{ meta('color', $promo->ID) }};">
        <div class="wrapper">
            <div class="promo-wrapper">
                <div class="promo-container">
                    <h1>{{ $promo->post_title }}</h1>
                    <h5>{{ sprintf('%s %s', __("By", THEME_TEXTDOMAIN), meta('author', $promo->ID)) }}</h5>
                    <a href="{{ get_permalink($promo->ID) }}" class="big-button">{{ __("Buy book", THEME_TEXTDOMAIN) }}</a>
                </div>
                <div class="promo-media">
                    <img src="{{ wp_get_attachment_image_url(meta('promo-image', $promo->ID), 'book-promo') }}" alt="{{ $promo->post_title }}" width="399" height="435">
                </div>
            </div>
        </div>
    </div>
    <!-- End Book Promo -->

    <!-- Popular -->
    <div id="popular-books" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Popular", THEME_TEXTDOMAIN) }}</h1>
            <a href="{{ get_post_type_archive_link($promo->post_type) }}" title="{{ __("Books", THEME_TEXTDOMAIN) }}" class="bks-link">{{ sprintf('> %s', __("All Books", THEME_TEXTDOMAIN)) }}</a>
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
                            <p>{{ $book->post_excerpt }}</p>
                            <div class="button-box">
                                <a href="{{ get_permalink($book->ID) }}" class="tiny-button">{{ __("Buy", THEME_TEXTDOMAIN) }}</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- End Popular -->

    @include('blade.blog.latest)

@endsection