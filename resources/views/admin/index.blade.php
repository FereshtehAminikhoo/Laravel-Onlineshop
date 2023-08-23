<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل ادمین</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/font/iconsmind-s/css/iconsminds.css"/>
    <link rel="stylesheet" href="/font/simple-line-icons/css/simple-line-icons.css"/>

    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/vendor/bootstrap.rtl.only.min.css"/>
    <link rel="stylesheet" href="/css/vendor/fullcalendar.min.css"/>
    <link rel="stylesheet" href="/css/vendor/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="/css/vendor/datatables.responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2.min.css"/>
    <link rel="stylesheet" href="/css/vendor/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css"/>
    <link rel="stylesheet" href="/css/vendor/bootstrap-stars.css"/>
    <link rel="stylesheet" href="/css/vendor/nouislider.min.css"/>
    <link rel="stylesheet" href="/css/vendor/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="/css/vendor/component-custom-switch.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="/css/vendor/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="/css/vendor/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/jquery.toast.min.css">
</head>

<body id="app-container" class="menu-default show-spinner">
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1"/>
                <rect x="0.48" y="7.5" width="7" height="1"/>
                <rect x="0.48" y="15.5" width="7" height="1"/>
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1"/>
                <rect x="1.56" y="7.5" width="16" height="1"/>
                <rect x="1.56" y="15.5" width="16" height="1"/>
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1"/>
                <rect x="0.5" y="7.5" width="25" height="1"/>
                <rect x="0.5" y="15.5" width="25" height="1"/>
            </svg>
        </a>

    </div>


    <a class="navbar-logo" href="Dashboard.Default.html">
        <span class="logo d-none d-xs-block"></span>
        <span class="logo-mobile d-block d-xs-none"></span>
    </a>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            <div class="d-none d-md-inline-block align-text-bottom mr-3">
                <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                     data-toggle="tooltip" data-placement="left" title="Dark Mode">
                    <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                    <label class="custom-switch-btn" for="switchDark"></label>
                </div>
            </div>
            <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                <i class="simple-icon-size-fullscreen"></i>
                <i class="simple-icon-size-actual"></i>
            </button>
        </div>
        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="name">{{auth()->user()->name.' '.auth()->user()->family_name}}</span>
                <span>
                    <img alt="Profile Picture" src="/img/profiles/ShowStdPic.gif"/>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right mt-3">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">خروج</a>
            </div>
        </div>
    </div>
</nav>
<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li>
                    <a href="#dashboard">
                        <i class="iconsminds-shop-4"></i>
                        <span>دسته بندی</span>
                    </a>
                </li>
                <li>
                    <a href="#layouts">
                        <i class="iconsminds-digital-drawing"></i> محصولات
                    </a>
                </li>
                <li>
                   <a href="#ui">
                       <i class="iconsminds-pantone"></i>برند ها
                   </a>
                </li>
                <li>
                    <a href="#pagination">
                        <i class="simple-icon-notebook"></i>سفارشات
                    </a>
                </li>
                <li>
                    <a href="#applications">
                        <i class="iconsminds-air-balloon-1"></i> کاربران
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="dashboard">
                <li class="active">
                    <a href="/admin/category/list">
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">لیست دسته بندی ها</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/category/create">
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">افزودن دسته بندی</span>
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="layouts" id="layouts">
                <li>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="/admin/product/list">
                                    <i class="simple-icon-picture"></i> <span
                                        class="d-inline-block">لیست محصولات</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product/create">
                                    <i class="simple-icon-check"></i> <span
                                        class="d-inline-block">افزودن محصول</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="ui">
                <li>
                    <a href="/admin/brand/list">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">لیست برند ها</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/brand/create">
                        <i class="simple-icon-check"></i> <span class="d-inline-block">افزودن برند</span>
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="pagination">
                <li>
                    <a href="/admin/payment_order/list">
                        <i class="simple-icon-list"></i> <span class="d-inline-block">لیست سفارشات</span>
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="applications">
                <li>
                    <a href="/admin/user/list">
                        <i class="simple-icon-user-following"></i>
                        <span class="d-inline-block">لیست کاربران</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/user/create">
                        <i class="simple-icon-user-follow"></i>
                        <span class="d-inline-block">افزودن ادمین</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<main>
    <div class="container-fluid">

        @yield('content')

    </div>
</main>

<script src="/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/js/vendor/Chart.bundle.min.js"></script>
<script src="/js/vendor/chartjs-plugin-datalabels.js"></script>
<script src="/js/vendor/moment.min.js"></script>
<script src="/js/vendor/fullcalendar.min.js"></script>
<script src="/js/vendor/datatables.min.js"></script>
<script src="/js/vendor/perfect-scrollbar.min.js"></script>
<script src="/js/vendor/progressbar.min.js"></script>
<script src="/js/vendor/jquery.barrating.min.js"></script>
<script src="/js/vendor/select2.full.js"></script>
<script src="/js/vendor/nouislider.min.js"></script>
<script src="/js/vendor/bootstrap-datepicker.js"></script>
<script src="/js/vendor/Sortable.js"></script>
<script src="/js/vendor/mousetrap.min.js"></script>
<script src="/js/vendor/glide.min.js"></script>
<script src="/js/dore.script.js"></script>
<script src="/js/scripts.js"></script>
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
</body>

</html>
