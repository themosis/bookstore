@include('header')

	<!-- BOOKS COLLECTION -->
	<div id="books" class="wrapper">
		<div class="bks-title-box">
			<h1>Collection</h1>
		</div>
		<div id="books--collection">
			<ul class="books">
				<?php $modulo = 3; ?>
				@foreach($books as $i => $book)
					<li <?php if($modulo - 1 == $i % $modulo ){ echo('class="last"'); } ?>>
						<div class="book">
							<h3>{{ $book->post_title }}</h3>
							<a href="{{ get_permalink($book->ID) }}" class="book-featured-box" style="background-color: {{ Meta::get($book->ID, 'color') }};">
								<img src="{{ Meta::get($book->ID, 'book-feature') }}" alt="{{ $book->post_title }}" width="266" height="146">
							</a>
							<p>{{ $book->post_excerpt }}</p>
							<div class="button-box">
								<a href="{{ get_permalink($book->ID) }}" class="tiny-button">Buy</a>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- END BOOKS COLLECTION -->

@include('footer')