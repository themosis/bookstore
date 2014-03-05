@include('header')

	<div class="wrapper">
		<div id="news" class="clearfix">
			<!-- ARTICLES -->
			<div id="news--articles">
				<article class="single-article">
					<div class="article--date">
						<span>3 March 2014</span>
					</div>
					<a href="#" class="article--title"><h2>The March selection of our readers.</h2></a>
					<img src="<?php echo(themosisAssets()); ?>/images/articleFeaturedImage001.jpg" alt="Article featured image">
					<div class="article--excerpt clearfix">
						<div class="article--excerpt__content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<div class="article--navigation clearfix">
								<a href="#" class="tiny-button yellow prev-button">Previous</a>
								<a href="#" class="tiny-button yellow next-button">Next</a>
							</div>
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
	<!-- BLOG -->
	<div id="bks-blog" class="related-posts">
		<div class="wrapper">
			<div class="bks-title-box">
				<h1>People have also read</h1>
				<a href="#" title="Articles" class="bks-link">&gt; all articles</a>
			</div>
			<div class="bks-home-blog">
				<ul>
					<li>
						<article class="home-article">
							<h5>3 March 2014</h5>
							<h2>The March selection of our readers.</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<div class="link-box">
								<a href="#" class="tiny-button yellow" title="Read more">Read more</a>
							</div>
						</article>
					</li>
					<li class="last">
						<article class="home-article">
							<h5>14 February 2014</h5>
							<h2>Top 10 of romance litterature.</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fringilla ipsum nunc, vel aliquam arcu egestas ut. Proin congue nisl nunc, vitae feugiat enim tempor non.</p>
							<div class="link-box">
								<a href="#" class="tiny-button yellow" title="Read more">Read more</a>
							</div>
						</article>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END BLOG -->

@include('footer')