@extends('blade.layouts.main')

@section('main')
    <div id="help" class="wrapper">
        @loop
            <div class="bks-title-box">
                <h1>{{ Loop::title() }}</h1>
            </div>
            <div id="help--info">
                <div id="help--info__wrapper">
                    {!! Loop::content() !!}
                </div>
            </div>
        @endloop
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