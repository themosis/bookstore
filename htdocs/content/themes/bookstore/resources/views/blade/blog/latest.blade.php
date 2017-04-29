<div id="bks-blog">
    <div class="wrapper">
        <div class="bks-title-box">
            <h1>{{ __("Latest news", THEME_TEXTDOMAIN) }}</h1>
            @if(isset($news_url) && !empty($news_url))
                <a href="{{ $news_url }}" title="{{ __("All Articles", THEME_TEXTDOMAIN) }}" class="bks-link">{{ sprintf('> %s', __("All Articles", THEME_TEXTDOMAIN)) }}</a>
            @endif
        </div>
        @if(isset($latest_articles))
            <div class="bks-blog-latest">
                <ul>
                    <?php
                        $i = 0;
                        $modulo = 2;
                    ?>
                    @query(array('post_type' => 'post', 'posts_per_page' => 2))
                        <li <?php if(1 == $i % $modulo){ echo('class="last"'); } ?>>
                            <article class="home-article">
                                <h5>{{ get_post_time('j F Y', true, Loop::id()) }}</h5>
                                <h2>{{ Loop::title() }}</h2>
                                <p>{{ Loop::excerpt() }}</p>
                                <div class="link-box">
                                    <a href="{{ Loop::link() }}" class="tiny-button yellow" title="Read more">Read more</a>
                                </div>
                            </article>
                        </li>
                        <?php $i++; ?>
                    @endquery
                </ul>
            </div>
        @endif
    </div>
</div>