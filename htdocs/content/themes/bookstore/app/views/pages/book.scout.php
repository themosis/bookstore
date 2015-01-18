@include('header')

	@loop
		<!-- BOOK PROMO -->
		<div id="bks-promo" style="background-color: {{ Meta::get(Loop::id(), 'color') }};">
			<div class="wrapper">
				<div class="promo-wrapper">
					<div class="promo-container">
						<h1>{{ Loop::title() }}</h1>
						<h5>By {{ Meta::get(Loop::id(), 'author') }}</h5>
						<a href="#" class="big-button">Buy book</a>
					</div>
					<div class="promo-media">
						<?php
							$image = wp_get_attachment_image_src(Meta::get(Loop::id(), 'promo-image'), 'book-promo');
						?>
						<img src="{{ $image[0] }}" alt="Demo Book" width="399" height="435">
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
					{{ Loop::content() }}
				</div>
			</div>
		</div>
		<!-- END BOOK CONTENT -->
	@endloop

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
								{{ $b->image }}
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