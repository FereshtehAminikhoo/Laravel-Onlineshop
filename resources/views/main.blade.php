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
<script>
    function searchInProducts(search_element) {
        console.log(search_element.value.length)
        if (search_element.value.length > 0) {
            $('#search_result').html('')
            $.ajax({
                type: "GET",
                data: {
                    value: search_element.value,
                }, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/search_in_products",
                success: function (data) {
                    if (data.products.length > 0) {
                        console.log(data.products)
                        var items = data.products
                        var list = ''
                        items.forEach(item => {
                            list += `<li style="background-color: #faeaea;border-bottom: solid 1px black;list-style: none;padding: 15px;margin: 0;">
                                        <a href="/product/${item.id}" style="color:#000;">
                                            <div style="display: flex;flex-direction: row;justify-content: space-between">
                                                <span>${item.title}</span>
                                                <img src="/${item.file}" width="45px" />
                                            </div>
                                        </a>
                                     </li>`
                        })
                        $('#search_result').html(list)
                    } else {
                        $('#search_result').html('')
                    }
                },
                error: function (jqXHR, exception) {
                    console.log('no')
                }
            });
        } else {
            $('#search_result').html('')
        }

    }

</script>
</body>
</html>
