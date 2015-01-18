@include('header')

	<!-- BOOK PROMO -->
	<div id="bks-promo" style="background-color: {{ $promo->color }};">
		<div class="wrapper">
			<div class="promo-wrapper">
				<div class="promo-container">
					<h1>{{ $promo->title }}</h1>
					<h5>By {{ $promo->author }}</h5>
					<a href="{{ $promo->link }}" class="big-button">Buy book</a>
				</div>
				<div class="promo-media">
					<img src="{{ $promo->image }}" alt="{{ $promo->title }}" width="399" height="435">
				</div>
			</div>
		</div>
	</div>
	<!-- END BOOK PROMO -->
	<!-- POPULAR -->
	<div id="popular-books" class="wrapper">
		<div class="bks-title-box">
			<h1>Popular</h1>
			<a href="{{ home_url('books') }}" title="Books" class="bks-link">&gt; all books</a>
		</div>
		<div id="popular-container">
			<ul class="books">
				<?php
					$modulo = 3;
				?>
				@foreach($books as $i => $book)
					<li <?php if(2 == $i % $modulo){ echo('class="last"'); } ?>>
						<div class="book">
							<h3>{{ $book->title }}</h3>
							<a href="{{ $book->link }}" class="book-featured-box" style="background-color: {{ $book->color }};">
								{{ $book->image }}
							</a>
							<p>{{ $book->excerpt }}</p>
							<div class="button-box">
								<a href="{{ $book->link }}" class="tiny-button">Buy</a>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- END POPULAR -->
	<!-- BLOG -->
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
	<!-- END BLOG -->

@include('footer')