<head>
    <meta name="slurp" content="index,follow"/>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    <meta name="robots" content="index,follow"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="ROBOTS" content="index,follow"/>
    <meta name="googlebot" content="index,follow"/>
    <meta name="BingBOT" content="index,follow"/>
    <meta name="yahooBOT" content="index,follow"/>
    <meta name="slurp" content="index,follow"/>
    <meta name="msnbot" content="index,follow"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">

    <title>{{isset($title) ? $title : config()->get('seo.default_title')}}</title>
    <meta name="description" content="{{isset($description) ? $description : config()->get('seo.description')}}">
    <meta name="keywords" content="{{isset($keywords) ? $keywords : config()->get('seo.keywords')}}">
    <link rel="canonical" href="{{env('APP_URL')}}"/>

    <meta property="og:title" content="{{isset($title) ? $title : config()->get('seo.default_title')}}"/>
    <meta property="og:description" content="{{isset($description) ? $description : config()->get('seo.description')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{env('APP_URL')}}"/>
    <meta property="og:site_name" content="{{env('APP_NAME')}}"/>
    <meta property="og:image" content="{{asset('favicon.ico')}}"/>

    <meta name="twitter:card" content="website"/>
    <meta name="twitter:title" content="{{isset($title) ? $title : config()->get('seo.default_title')}}"/>
    <meta name="twitter:description" content="{{isset($description) ? $description : config()->get('seo.description')}}"/>
    <meta name="twitter:url" content="{{route('home')}}"/>
    <meta name="twitter:site" content="{{env('APP_URL')}}"/>
    <meta name="twitter:image" content="{{asset('favicon.ico')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
