<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head lang="en">
        <!-- Metadata Info -->
        <meta charset="utf-8">
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('meta_description', '')">
        <meta name="keywords" content="@yield('meta_keywords', '')">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta property="og:title" content="">

        <!-- Page Title & Favicon -->
        <title>{{ isset($title) ? $title : '' }}</title>
        <link href="../../assets/ico/favicon.png" rel="shortcut icon">
        <!-- Render Bootstrap Styles -->
        <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <!-- Normalize CSS Recomended By Bootstrap -->
        <link href="{{ asset('bower_components/normalize-css/normalize.css') }}" rel="stylesheet">
        <!-- Use Font Awesome Icons Instead of Glyphicons -->
        <link href="{{ asset('bower_components/fontawesome/css/font-awesome.css') }}" rel="stylesheet">
        <!-- Google API -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,100' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Bootstrap Select CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.min.css" rel="stylesheet">
        <!-- Style CSS -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Render Page Specific Styles -->
        @yield('css')

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="{{ asset('bower_components/html5shiv/dist/html5shiv.js') }}"></script>
            <script src="{{ asset('bower_components/respond/dest/respond.min.js') }}"></script>
        <![endif]-->

        <!-- Render Modernizr Javascript For HTML5 Compatibility -->
        <script src="{{ asset('bower_components/modernizr/modernizr.js') }}"></script>
    </head>
    <body class="{{ isset($body) ? $body : '' }}">

        @yield('body')

        <header>
        </header>

        <div id="content-container">
            @yield('content')
        </div>

        <footer>
        </footer>

        <!-- Render Javascript Libraries At End Of Document So Pages Load Faster -->

        <!-- Render jQuery First -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bower_components/jquery/dist/jquery.min.js"><\/script>')</script>

        <!-- Render Velocity JavaScript -->
        <script src="//cdn.jsdelivr.net/jquery.velocity/0.2.1/jquery.velocity.min.js"></script>

        <!-- Render Bootstrap JavaScript -->
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- Render Bootstrap Select JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.3.5/bootstrap-select.min.js"></script>

        <!-- Render Uploadifive JavaScript -->
        <script src="{{ asset('js/jquery.uploadifive.min.js') }}"></script>

        <!-- Render Main JavaScript -->
        <script src="{{ asset('js/script.js') }}"></script>

        <!-- Render Page Specific JavaScript -->
        @yield('js')

        <!-- Render Google Analytics JavaScript -->
        <script>
            var _gaq=[['_setAccount',''],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
