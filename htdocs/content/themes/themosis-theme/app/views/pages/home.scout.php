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
	@include('blog.latest')
	<!-- END BLOG -->

@include('footer')