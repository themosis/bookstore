@extends('blade.layouts.main')

@section('main')

    <div id="help" class="wrapper">
        <div class="bks-title-box">
            <h1>{{ $page->post_title }}</h1>
        </div>
        @if(!empty($page->post_content))
            <div id="help--info">
                <div id="help--info__wrapper">
                    <p><span class="bubble-icon"></span>{{ $page->post_content }}</p>
                </div>
            </div>
        @endif
        <div id="help--faqs">
            <dl>
                @foreach($faqs as $faq)
                    <dt>{{ $faq->post_title }}</dt>
                    <dd>{!! wpautop($faq->post_content) !!}</dd>
                @endforeach
            </dl>
        </div>
    </div>

@endsection