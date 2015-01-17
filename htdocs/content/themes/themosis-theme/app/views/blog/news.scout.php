@include('header')

	<!-- NEWS -->
	<div id="blog" class="wrapper">
		<div class="bks-title-box">
			<h1>Latest news</h1>
		</div>
		<div id="news" class="clearfix">
			<!-- ARTICLES -->
			<div id="news--articles">
				@loop(array('post_type' => 'post'))
					<article>
						<div class="article--date">
							<span>{{ get_the_date('j F Y') }}</span>
						</div>
						<a href="{{ Loop::link() }}" class="article--title"><h2>{{ Loop::title() }}</h2></a>
						{{ Loop::thumbnail() }}
						<div class="article--excerpt clearfix">
							<div class="article--excerpt__content">
								<p>{{ Loop::excerpt() }}</p>
								<a href="{{ Loop::link() }}" class="tiny-button yellow">Read more</a>
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
	<!-- END NEWS -->

@include('footer')