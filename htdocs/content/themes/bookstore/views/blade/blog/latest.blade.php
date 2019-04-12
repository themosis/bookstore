<div id="bks-blog">
    <div class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __('Latest news', THEME_TD) }}</h1>
            @if(isset($news_url) && ! empty($news_url))
                <a href="{{ $news_url }}" title="{{ __('All Articles', THEME_TD) }}" class="bks-link">
                    {{ sprintf('> %s', __('All Articles', THEME_TD)) }}
                </a>
            @endif
        </div>
        @if(isset($latest_articles))
            <div class="bks-blog-latest">
                <ul>
                    @php
                        $modulo = 2;
                    @endphp
                    @foreach($latest_articles as $i => $post)
                        @if(1 == $i % $modulo)
                            <li class="last">
                        @else
                            <li>
                        @endif
                            <article class="blog-article">
                                <h5>{{ get_post_time('j F Y', true, $post->ID) }}</h5>
                                <h2>{{ $post->post_title }}</h2>
                                @if(! empty($post->post_excerpt))
                                    <p>{{ $post->post_excerpt }}</p>
                                @else
                                    <p>{!! wp_trim_words($post->post_content, 10) !!}</p>
                                @endif
                                <div class="link-box">
                                    <a href="{{ get_permalink($post->ID)}}" class="tiny-button yellow" title="{{ __('Read more', THEME_TD) }}">{{ __('Read more', THEME_TD) }}</a>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>