@include('header')

	<!-- BOOK PROMO -->
	<div id="bks-promo">
		<div class="wrapper">
			<div class="promo-wrapper">
				<div class="promo-container">
					<h1>Sass for web designers</h1>
					<h5>By Dan Cederholm</h5>
					<a href="#" class="big-button">Buy book</a>
				</div>
				<div class="promo-media">
					<img src="<?php echo(themosisAssets()); ?>/images/book001.png" alt="Demo Book" width="399" height="435">
				</div>
			</div>
		</div>
	</div>
	<!-- END BOOK PROMO -->
	<!-- POPULAR -->
	<div id="popular-books" class="wrapper">
		<div class="bks-title-box">
			<h1>Popular</h1>
			<a href="#" title="Books" class="bks-link">&gt; all books</a>
		</div>
		<div id="popular-container">
			<ul class="books">
				<li>
					<div class="book">
						<h3>Design is a job</h3>
						<a href="#" class="book-featured-box">
							<img src="<?php echo(themosisAssets()); ?>/images/book001.jpg" alt="Book featured image" width="266" height="146">
						</a>
						<p>Co-founder of Mule Design and raconteur Mike Monteiro wants to help you do your job better.</p>
						<div class="button-box">
							<a href="#" class="tiny-button">Buy</a>
						</div>
					</div>
				</li>
				<li>
					<div class="book">
						<h3>The elements of content strategy</h3>
						<a href="#" class="book-featured-box">
							<img src="<?php echo(themosisAssets()); ?>/images/book002.jpg" alt="Book featured image" width="266" height="146">
						</a>
						<p>Co-founder of Mule Design and raconteur Mike Monteiro wants to help you do your job better.</p>
						<div class="button-box">
							<a href="#" class="tiny-button">Buy</a>
						</div>
					</div>
				</li>
				<li class="last">
					<div class="book">
						<h3>HTML5 for web designers</h3>
						<a href="#" class="book-featured-box">
							<img src="<?php echo(themosisAssets()); ?>/images/book003.jpg" alt="Book featured image" width="266" height="146">
						</a>
						<p>Co-founder of Mule Design and raconteur Mike Monteiro wants to help you do your job better.</p>
						<div class="button-box">
							<a href="#" class="tiny-button">Buy</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- END POPULAR -->

@include('footer')