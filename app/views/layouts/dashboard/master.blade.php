<!DOCTYPE html>
<html>
    <head>
        <meta name="robots" content="noindex, nofollow">

        <link rel="stylesheet" href="{{ asset('/bower_components/jqueryui/themes/base/jquery-ui.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('packages/mrjuliuss/syntara/assets/css/toggle-switch.css') }}" />
        <link rel="stylesheet" href="{{ asset('packages/mrjuliuss/syntara/assets/css/base.css') }}" media="all">
        <link rel="stylesheet" href="{{ asset('/assets/css/filmoteca.css')}}" />
        <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-datepicker/css/datepicker3.css')}}" />

        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>
        <script src="{{ asset('bower_components/jqueryui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/base.js') }}"></script>
        <script src="{{ asset('bower_components/parsleyjs/dist/parsley.min.js') }}"></script>
        <script src="{{ asset('bower_components/parsleyjs/src/i18n/es.js') }}"></script>
        <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('bower_components/ckeditor/adapters/jquery.js') }}"></script>
        <script src="{{ asset('bower_components/ckeditor/lang/es.js') }}"></script>
        <script src="{{ asset('bower_components/ckeditor-youtube-plugin/youtube/plugin.js') }}"></script>
        <script src="{{ asset('bower_components/ckeditor-youtube-plugin/youtube/lang/es.js') }}"></script>


        <title>{{ (!empty($siteName)) ? $siteName : "Syntara"}}</title>
    </head>
    <body>
        @include(Config::get('syntara::views.header'))
        {{ isset($breadcrumb) ? Breadcrumbs::create($breadcrumb) : '' }}
        <div id="content">
            @yield('content')
        </div>
    </body>
</html>
