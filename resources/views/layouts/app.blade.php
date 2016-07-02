<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Meta::tagMetaProperty('locale', 'fr_FR') !!}
    <title>{{ Meta::meta('title') }}</title>
    {!! Meta::tag('title') !!}
    {!! Meta::tag('description') !!}
    {!! Meta::tag('image') !!}
    {!! Meta::tag('robots') !!}

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/bulk.css') }}" rel="stylesheet"><link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
    <link href="{{ asset('/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animation.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>
<body id="app-layout">

    @yield('content')

    <!-- =========
    Javascript load 
    ===================================-->

    <!-- JS maps for gmap3 JavaScript plugins) -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{{ asset('/js/gmap3.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.autofix_anything.js') }}"></script>
    <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>