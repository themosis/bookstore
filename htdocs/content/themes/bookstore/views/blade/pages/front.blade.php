@extends('blade.layouts.main')

@section('main')

    <!-- Book Promo -->
    @if(isset($promo))
        <div id="bks-promo" style="background-color: {{ meta($promo->ID, 'th_color', true) }};">
            <div class="wrapper">
                <div class="promo-wrapper">
                    <div class="promo-container">
                        <h1>{{ $promo->post_title }}</h1>
                        <h5>{{ sprintf('%s %s', __("By", THEME_TD), meta($promo->ID, 'th_author', true)) }}</h5>
                        <a href="{{ get_permalink($promo->ID) }}" class="big-button">{{ __("Buy book", THEME_TD) }}</a>
                    </div>
                    <div class="promo-media">
                        <img src="{{ wp_get_attachment_image_url(meta($promo->ID, 'th_promo-image', true), 'book-promo') }}" alt="{{ $promo->post_title }}" width="399" height="435">
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Book Promo -->

    <!-- Popular -->
    @if(isset($books) && $books->isNotEmpty())
        <div id="popular-books" class="wrapper">
            <div class="bks-title-box">
                <h1>{{ __('Popular', THEME_TD) }}</h1>
                <a href="{{ get_post_type_archive_link($promo->post_type) }}" title="{{ __('Books', THEME_TD) }}" class="bks-link">{{ sprintf('> %s', __('All Books', THEME_TD)) }}</a>
            </div>
            <div id="popular-container">
                <ul class="books">
                    @foreach($books as $i => $book)
                        @if(2 == $i % 3)
                            <li class="last">
                        @else
                            <li>
                        @endif
                            <div class="book">
                                <h3>{{ $book->post_title }}</h3>
                                @if(has_post_thumbnail($book->ID))
                                    <a href="{{ get_permalink($book->ID) }}" class="book-featured-box" style="background-color: {{ meta('color', $book->ID, true) }};">
                                        {!! get_the_post_thumbnail($book->ID, 'book-features-image') !!}
                                    </a>
                                @endif
                                <p>{{ $book->post_excerpt }}</p>
                                <div class="button-box">
                                    <a href="{{ get_permalink($book->ID) }}" class="tiny-button">{{ __('Buy', THEME_TD) }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- End Popular -->

    @include('blade.blog.latest')

@endsection