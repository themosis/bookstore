@include('header')

	<div class="wrapper">
		<div id="news" class="clearfix">
			<!-- ARTICLES -->
			<div id="news--articles">
				@loop(array('p' => $article->ID))
					<article class="single-article">
						<div class="article--date">
							<span>{{ get_the_date('d F Y') }}</span>
						</div>
						<span class="article--title"><h2>{{ Loop::title() }}</h2></span>
						{{ Loop::thumbnail() }}
						<div class="article--excerpt clearfix">
							<div class="article--excerpt__content">
								{{ Loop::content() }}
								<div class="article--navigation clearfix">
									<?php previous_post_link('%link', 'Previous'); ?>
									<?php next_post_link('%link', 'Next'); ?>
								</div>
							</div>
						</div>
					</article>
				@endloop
			</div>
			<!-- END ARTICLES -->
			<!-- SIDEBAR -->
			<div id="news--sidebar">
				<div class="sidebar">
					<?php dynamic_sidebar('blog-sidebar'); ?>
				</div>
			</div>
			<!-- END SIDEBAR -->
		</div>
	</div>
	<!-- BLOG -->
	<div id="bks-blog">
		<div class="wrapper">
			<div class="bks-title-box">
				<h1>Latest news</h1>
				<a href="{{ get_permalink($newspage->ID) }}" title="Articles" class="bks-link">&gt; all articles</a>
			</div>
			<div class="bks-home-blog">
				<ul>
					<?php
						$modulo = 2;
					?>
					@foreach($news as $i => $article)
						<li <?php if(1 == $i % $modulo){ echo('class="last"'); } ?>>
							<article class="home-article">
								<h5>{{ get_post_time('j F Y', true, $article->ID) }}</h5>
								<h2>{{ $article->post_title }}</h2>
								<p>{{ $article->post_excerpt }}</p>
								<div class="link-box">
									<a href="{{ get_permalink($article->ID) }}" class="tiny-button yellow" title="Read more">Read more</a>
								</div>
							</article>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<!-- END BLOG -->

@include('footer')