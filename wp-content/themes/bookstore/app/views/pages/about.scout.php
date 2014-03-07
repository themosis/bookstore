@include('header')
	
	<!-- ABOUT -->
	<div id="about" class="wrapper">
		<div class="bks-title-box">
			<h1>The Bookstore team</h1>
		</div>
		<div id="about--content">
			{{ apply_filters('the_content', $page->post_content) }}
		</div>
		<div id="about--team">
			<ul>
			<?php $modulo = 3; $i = 0; ?>
				@foreach($members as $member)
					<li <?php if($modulo - 1 == $i % $modulo){ echo('class="last"'); } ?>>
						<div class="member clearfix">
							<div class="member--picture">
								<img src="{{ $member['fields']['pic'] }}" alt="{{ $member['fields']['full-name'] }}">
							</div>
							<div class="member--bio">
								<h4>{{ $member['fields']['full-name'] }}</h4>
								<p>{{ $member['fields']['job'] }}</p>
							</div>
						</div>
					</li>
					<?php $i++; ?>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- END ABOUT -->
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
								<p>{{ implode(' ', array_slice(explode(' ', strip_tags($article->post_content)), 0, 20)) }}...</p>
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