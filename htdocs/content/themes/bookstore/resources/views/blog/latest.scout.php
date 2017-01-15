<div id="bks-blog">
    <div class="wrapper">
        <div class="bks-title-box">
            <h1>Latest news</h1>
            <?php $newspage = get_page_by_path('news'); ?>
            @if(!empty($newspage))
                <a href="{{ get_permalink($newspage->ID) }}" title="Articles" class="bks-link">&gt; all articles</a>
            @endif
        </div>
        <div class="bks-home-blog">
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
    </div>
</div>