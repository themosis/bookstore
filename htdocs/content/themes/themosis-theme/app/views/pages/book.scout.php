@include('header')

	<!-- BOOK PROMO -->
	<div id="bks-promo" style="background-color: {{ Meta::get($book->ID, 'color') }};">
		<div class="wrapper">
			<div class="promo-wrapper">
				<div class="promo-container">
					<h1>{{ $book->post_title }}</h1>
					<h5>By {{ Meta::get($book->ID, 'author') }}</h5>
					<a href="#" class="big-button">Buy book</a>
				</div>
				<div class="promo-media">
					<img src="{{ Meta::get($book->ID, 'promo-image') }}" alt="Demo Book" width="399" height="435">
				</div>
			</div>
		</div>
	</div>
	<!-- END BOOK PROMO -->
	<!-- BOOK CONTENT -->
	<div class="wrapper">
		<div id="book--container">
			<div class="bks-title-box">
				<h1>Content</h1>
			</div>
			<div id="book--content">
				{{ apply_filters('the_content', $book->post_content) }}
			</div>
		</div>
	</div>
	<!-- END BOOK CONTENT -->
	<!-- RECOMMANDATIONS -->
	<div class="wrapper">
		<div class="bks-title-box">
			<h1>RECOMMANDATIONS</h1>
		</div>
		<div id="popular-container">
			<ul class="books">
			<?php $modulo = 3; ?>
				@foreach($books as $i => $b)
					<li <?php if($modulo - 1 == $i % $modulo) { echo('class="last"'); } ?>>
						<div class="book">
							<h3>{{ $b->title }}</h3>
							<a href="{{ $b->link }}" class="book-featured-box" style="background-color: {{ $b->color }};">
								<img src="{{ $b->image }}" alt="{{ $b->title }}" width="266" height="146">
							</a>
							<p>{{ $b->excerpt }}</p>
							<div class="button-box">
								<a href="{{ $b->link }}" class="tiny-button">Buy</a>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- END RECOMMANDATIONS -->

@include('footer')