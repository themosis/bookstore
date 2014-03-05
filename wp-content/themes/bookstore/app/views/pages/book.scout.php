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
	<!-- BOOK CONTENT -->
	<div class="wrapper">
		<div id="book--container">
			<div class="bks-title-box">
				<h1>Content</h1>
			</div>
			<div id="book--content">
				<p>Sed tincidunt consequat iaculis. Nullam et sem ut purus feugiat malesuada in vitae velit. Quisque nisi lacus, consectetur non bibendum sollicitudin, consequat ac odio. Aliquam placerat blandit dignissim. Morbi semper, felis id tempor mollis, lacus erat tincidunt tortor, id tempus enim erat non tellus. Pellentesque euismod felis et tincidunt lacinia. Nulla eu libero eu turpis vestibulum imperdiet. Nulla accumsan aliquam sagittis. Nam iaculis diam luctus condimentum suscipit. In non massa sit amet nisi lobortis ullamcorper. Aenean nisi ante, tristique at gravida consequat, posuere nec mi. Ut arcu odio, imperdiet et nisl et, porta sollicitudin lectus. Suspendisse potenti. Phasellus adipiscing, turpis non lobortis vestibulum, sapien lorem porttitor elit, eget laoreet orci erat sed sapien.</p>
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
	<!-- END RECOMMANDATIONS -->

@include('footer')