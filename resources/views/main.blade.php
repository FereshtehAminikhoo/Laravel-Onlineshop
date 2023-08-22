<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آنلاین شاپ</title>
    <!--bootstarp css-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="/css/icon.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/slider/cssfull.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.toast.min.css">


    <link rel="stylesheet" href="/css/slider/css1.css" media="screen and (max-width:1365px)">
    <link rel="stylesheet" href="/css/slider/css2.css" media="screen and (min-width:1366px)">
    <link rel="stylesheet" href="/css/slider/css3.css" media="screen and (min-width:1680px)">

    <!--bootstrap js-->
    <script src="/js/popper.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/slider1.js"></script>
    <script src="/js/slider2.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/jquery.toast.min.js"></script>
    <script>
        @if(session()->has('notification'))
        $.toast({
            heading: "{{session()->get('notification')['heading']}}",
            text: "{{session()->get('notification')['text']}}",
            icon: "{{session()->get('notification')['icon']}}",
            loader: true,
            loaderBg: '#9EC600',
            hideAfter: 5000
        })
        @endif
    </script>
</head>
<body>

@yield('navbar')
@yield('header')
@yield('content')
@yield('footer')
</body>
</html>
