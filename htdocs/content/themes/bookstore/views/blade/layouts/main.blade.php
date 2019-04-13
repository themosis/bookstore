<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @head
</head>
<body>
<header>
    <div id="bookstore-logo">
        <a href="{{ home_url() }}">
            <img src="{{ $theme->getUrl('dist/images/logo.png') }}" alt="Bookstore" width="154" height="40">
        </a>
    </div>
    <div id="bookstore-navigation">
        {!! wp_nav_menu([
            'theme_location' => 'header-nav',
            'container' => false,
            'echo' => false
        ]) !!}
    </div>
    <div id="bookstore-search">
        <div id="search-button"></div>
        <div id="search--form">
            <div id="search--form__icon"></div>
            <div id="search--form__form">
                <!-- @TODO Search form -->
            </div>
        </div>
    </div>
</header>

@yield('main')

<footer>
    <div class="wrapper">
        <div class="footer--copyright">
            <p>&copy; {{ sprintf('%s %d', __('Copyright Bookstore', THEME_TD), date('Y')) }}</p>
        </div>
        <div class="footer--navigation">
            {!! wp_nav_menu([
                'theme_location' => 'footer-nav',
                'container' => false,
                'echo' => false
            ]) !!}
        </div>
    </div>
</footer>
@footer
</body>
</html>