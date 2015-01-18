@include('header')

	@loop
		<!-- ABOUT -->
		<div id="about" class="wrapper">
			<div class="bks-title-box">
				<h1>The Bookstore team</h1>
			</div>
			<div id="about--content">
				{{ Loop::content() }}
			</div>
			<div id="about--team">
				<ul>
				<?php $modulo = 3; ?>
					@foreach($members as $i => $member)
						<li <?php if($modulo - 1 == $i % $modulo){ echo('class="last"'); } ?>>
							<div class="member clearfix">
								<div class="member--picture">
									<?php
										$image = wp_get_attachment_image_src($member['pic'], 'member-pic');
									?>
									<img src="{{ $image[0] }}" alt="{{ $member['full-name'] }}">
								</div>
								<div class="member--bio">
									<h4>{{ $member['full-name'] }}</h4>
									<p>{{ $member['job'] }}</p>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!-- END ABOUT -->
	@endloop

	<!-- BLOG -->
	@include('blog.latest')
	<!-- END BLOG -->

@include('footer')