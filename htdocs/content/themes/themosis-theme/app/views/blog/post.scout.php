@include('header')

	<div class="wrapper">
		<div id="news" class="clearfix">
			<!-- ARTICLES -->
			<div id="news--articles">
				@loop
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
	@include('blog.latest')
	<!-- END BLOG -->

@include('footer')