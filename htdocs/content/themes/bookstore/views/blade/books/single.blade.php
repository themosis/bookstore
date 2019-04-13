@extends('blade.layouts.main')

@section('main')

    @loop
        <!-- Book promo -->
        <div id="bks-promo" style="background-color: {{ meta(Loop::id(), 'th_color', true) }};">
            <div class="wrapper">
                <div class="promo-wrapper">
                    <div class="promo-container">
                        <h1>{{ Loop::title() }}</h1>
                        <h5>{{ sprintf('%s %s', __("By", THEME_TD), meta(Loop::id(), 'th_author', true)) }}</h5>
                        <a href="#" class="big-button">{{ __("Buy the book", THEME_TD) }}</a>
                    </div>
                    <div class="promo-media">
                        <img src="{{ wp_get_attachment_image_url(meta(Loop::id(), 'th_promo-image'), 'book-promo') }}" alt="{{ Loop::title() }}" width="399" height="435">
                    </div>
                </div>
            </div>
        </div>
        <!-- End book promo -->
        <!-- Book content -->
        <div class="wrapper">
            <div id="book--container">
                <div class="bks-title-box">
                    <h1>{{ __("Content", THEME_TD) }}</h1>
                </div>
                <div id="book--content">
                    {!! Loop::content() !!}
                </div>
            </div>
        </div>
        <!-- End book content -->
    @endloop
    <!-- Recommended books -->
    @if(isset($books) && $books->isNotEmpty())
        <div class="wrapper">
            <div class="bks-title-box">
                <h1>{{ __("Recommandations", THEME_TD) }}</h1>
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
                                    <a href="{{ get_permalink($book->ID) }}" class="book-featured-box" style="background-color: {{ meta($book->ID, 'th_color', true) }};">
                                        {!! get_the_post_thumbnail($book->ID, 'book-features-image') !!}
                                    </a>
                                @endif
                                @if(! empty($book->post_excerpt))
                                    <p>{{ $book->post_excerpt }}</p>
                                @else
                                    <p>{{ wp_trim_words($book->post_content, 10) }}</p>
                                @endif
                                <div class="button-box">
                                    <a href="{{ get_permalink($book->ID) }}" class="tiny-button">{{ __("Buy", THEME_TD) }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- End recommended books -->

@endsection