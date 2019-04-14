@extends('blade.layouts.main')

@section('main')
    @loop
        <div class="page">
            <h1>{{ Loop::title() }}</h1>
            {!! Loop::content() !!}
        </div>
    @endloop
@endsection