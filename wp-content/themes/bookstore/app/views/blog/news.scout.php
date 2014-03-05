@include('header')

	<!-- NEWS -->
	<div id="blog" class="wrapper">
		<div class="bks-title-box">
			<h1>Latest news</h1>
		</div>
		<div id="news" class="clearfix">
			<!-- ARTICLES -->
			<div id="news--articles">
				<article>
					<div class="article--date">
						<span>3 March 2014</span>
					</div>
					<a href="#" class="article--title"><h2>The March selection of our readers.</h2></a>
					<img src="<?php echo(themosisAssets()); ?>/images/articleFeaturedImage001.jpg" alt="Article featured image">
					<div class="article--excerpt clearfix">
						<div class="article--excerpt__content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<a href="#" class="tiny-button yellow">Read more</a>
						</div>
					</div>
				</article>
				<article>
					<div class="article--date">
						<span>3 March 2014</span>
					</div>
					<a href="#" class="article--title"><h2>The March selection of our readers.</h2></a>
					<img src="<?php echo(themosisAssets()); ?>/images/articleFeaturedImage001.jpg" alt="Article featured image">
					<div class="article--excerpt clearfix">
						<div class="article--excerpt__content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<a href="#" class="tiny-button yellow">Read more</a>
						</div>
					</div>
				</article>
				<article class="last">
					<div class="article--date">
						<span>3 March 2014</span>
					</div>
					<a href="#" class="article--title"><h2>The March selection of our readers.</h2></a>
					<img src="<?php echo(themosisAssets()); ?>/images/articleFeaturedImage001.jpg" alt="Article featured image">
					<div class="article--excerpt clearfix">
						<div class="article--excerpt__content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<a href="#" class="tiny-button yellow">Read more</a>
						</div>
					</div>
				</article>
			</div>
			<!-- END ARTICLES -->
			<!-- SIDEBAR -->
			<div id="news--sidebar">
				<div class="sidebar">
					<div class="sidebar--widget">
						<div class="sidebar--widget__content">
							<h3>Categories</h3>
							<ul>
								<li><a href="#">News</a></li>
								<li><a href="#">Miscellaneous</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Development</a></li>
								<li><a href="#">Strategy</a></li>
							</ul>
						</div>
					</div>
					<div class="sidebar--widget">
						<div class="sidebar--widget__content">
							<h3>Latest articles</h3>
							<ul>
								<li><a href="#">The March selection of our readers.</a></li>
								<li><a href="#">St-Valentin Top 10 books.</a></li>
								<li><a href="#">Some random article about litterature and romance.</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- END SIDEBAR -->
		</div>
	</div>
	<!-- END NEWS -->

@include('footer')