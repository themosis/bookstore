@include('header')

	<!-- FAQS -->
	<div id="help" class="wrapper">
		<div class="bks-title-box">
			<h1>Help &amp; Faqs</h1>
		</div>
		<div id="help--info">
			<div id="help--info__wrapper">
				<p><span class="bubble-icon"></span>{{ Meta::get($page->ID, 'help-text') }}</p>
			</div>
		</div>
		<div id="help--faqs">
			<dl>
				@foreach($faqs as $faq)
					<dt>{{ $faq->post_title }}</dt>
					<dd>{{ $faq->post_content }}</dd>
				@endforeach
			</dl>
		</div>
	</div>
	<!-- END FAQS -->

@include('footer')