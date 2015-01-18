@include('header')

	<!-- BOOKS COLLECTION -->
	<div id="books" class="wrapper">
		<div class="bks-title-box">
			<h1>Collection</h1>
		</div>
		<div id="books--collection">
			<ul class="books">
				<?php
					$i = 0;
					$modulo = 3;
				?>

				@if($books->have_posts())
					@while($books->have_posts())
						<li <?php if($modulo - 1 == $i % $modulo ){ echo('class="last"'); } ?>>
							<div class="book">
								<h3>{{ Loop::title() }}</h3>
								<a href="{{ Loop::link() }}" class="book-featured-box" style="background-color: {{ Meta::get(Loop::id(), 'color') }};">
									{{ Loop::thumbnail() }}
								</a>
								<p>{{ Loop::excerpt() }}</p>
								<div class="button-box">
									<a href="{{ Loop::link() }}" class="tiny-button">Buy</a>
								</div>
							</div>
						</li>
					@endwhile
				@endif
			</ul>
		</div>
	</div>
	<!-- END BOOKS COLLECTION -->

@include('footer')