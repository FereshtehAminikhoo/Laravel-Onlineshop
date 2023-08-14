@extends('main')
@section('navbar')
    <nav class="navbar navbar-expand-md navbar-light navbar_custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu1">
            <div class="nav_line"></div>
            <ul class="navbar-nav">
                @foreach($categories as $category1)
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white dropdown-toggle"
                           data-toggle="dropdown">{{$category1->name}}</a>
                        <div class="dropdown-menu dropdown-menu_custom1 shadow-sm rounded-bottom border-0"
                             id="custom-main-dropdown-menu">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        @foreach($category1->childs as $item)
                                            <div class="top_link">
                                                <a href="{{route('show_category',['id'=>$item->id])}}"><i
                                                        class="material-icons">keyboard_arrow_left</i>{{$item->name}}
                                                </a>
                                            </div>
                                            <ul class="list-group custom-list-group">
                                                @foreach($item->childs as $child)
                                                    <li class="list-group-item border-0 px-0"><a
                                                            href="{{route('show_category',['id'=>$child->id])}}">{{$child->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mr-auto">
                <ul class="navbar-nav special_sale">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">فروش ویژه</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
@section('header')
    <div class="container-fluid shadow-sm bg-white">
        <div class="row p-3">
            <div class="col-lg-2 col-md-3 col-sm-3 col-6 pr-2 box-logo">
                <span class="logo"></span>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-3 col-6">
                <form>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control rounded-right input_search" placeholder="نام کالا، برند و یا دسته مورد نظر خود را وارد کنید...">
                        <div class="input-group-prepend">
                            <div class="input-group-text rounded-left custom-input-group-text">
                                <a href="#"><i class="material-icons">search</i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-6 dropdown_custom text-right">
                @if(auth()->check())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <div class="dropdown">
                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" style="line-height: 40px!important;">
                            {{$user}}
                        </a>
                        <div class="dropdown-menu border-0 shadow rounded-0 dropdown-menu_custom text-center"
                             aria-labelledby="dropdownMenuButton">
                            <div class="text-left">
                                <a class="btn text-light" href="{{route('payment_order')}}">لیست سفارشات</a><br>
                                <a class="btn text-light" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">خروج</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="dropdown">
                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" style="line-height: 40px!important;">
                            ورود/ثبت نام
                        </a>
                        <div class="dropdown-menu border-0 shadow rounded-0 dropdown-menu_custom text-center"
                             aria-labelledby="dropdownMenuButton">
                            <div class="btn login_box">
                                <a class="dropdown-item dropdown-item-custom py-2 btn btn-info" href="{{route('client_login')}}">ورود به آنلاین شاپ</a>
                            </div>
                            <ul class="list-inline register">
                                <li class="list-inline-item">کاربر جدید هستید؟</li>
                                <li class="list-inline-item"><a href="{{route('client_register')}}">ثبت نام</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-6 text-right">
                <a href="{{route('show_shopping_cart')}}" class="btn btn-outline-info">
                    <i class="material-icons shopping_cart">shopping_cart</i>سبد خرید <span>{{count($shoppingCartItems)}}</span>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <!--start sidebar-->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3 order-last order-md-first">
                <div class="bg-white sidebar">
                    <div class="sidebar_header">دسته بندی نتایج</div>
                    <div class="sidebar_catalog">
                        <ul class="pt-1 pr-1">
                            <a href="#">
                                <li><span class="material-icons">chevron_left</span>کالای دیجیتال</li>
                            </a>
                            <a href="#">
                                <li class="padding-right15px pt-1"><span class="material-icons">chevron_left</span>کامپیوتر
                                    و تجهیزات جانبی
                                </li>
                            </a>
                            <li class="padding-right30px pt-1 sidebar_active"><span
                                    class="material-icons">chevron_left</span>هدفون، هدست و میکروفون
                            </li>
                            <a href="#">
                                <li class="padding-right55px pt-2">هدفون</li>
                            </a>
                            <a href="#">
                                <li class="padding-right55px pt-2">هدست</li>
                            </a>
                            <a href="#">
                                <li class="padding-right55px pt-2">میکروفون</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="bg-white sidebar mt-2">
                    <div class="sidebar_header">جستجو در نتایج :</div>
                    <div class="sidebar_catalog mt-2 mb-2">
                        <form>
                            <div class="input-group col">
                                <span class="material-icons ic-form-control-search">search</span>
                                <input type="text" class="form-control rounded-right bg-white input_search1"
                                       placeholder="نام محصول یا برند مورد نظر را بنویسید">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-white sidebar mt-2">
                    <div id="accordion" class="brand">
                        <div class="card">
                            <a href="#collapseOne" class="card-link" data-toggle="collapse">
                                <div class="card-header bg-white">
                                    برند<i class="material-icons pull-left">expand_more</i>
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <form>
                                        <div class="input-group pt-2">
                                            <span class="material-icons ic-form-control-search">search</span>
                                            <input type="text" class="form-control rounded-right bg-white input_search2"
                                                   placeholder="جستجوی نام برند ..">
                                        </div>
                                        <hr>
                                        <div class="form-group input-container">
                                            <div class="col p-0 m-0">
                                                <div class="checkbox p-1">
                                                    <label class="checkbox-container">فیلیپس
                                                        <input type="checkbox">
                                                        <span class="checkmark-login1"></span>
                                                    </label>
                                                    <span class="pull-left pt-1 brand_eng">Philips</span>
                                                </div>
                                                <div class="checkbox p-1">
                                                    <label class="checkbox-container">سونی
                                                        <input type="checkbox">
                                                        <span class="checkmark-login2"></span>
                                                    </label>
                                                    <span class="pull-left pt-1 brand_eng">Sony</span>
                                                </div>
                                                <div class="checkbox p-1">
                                                    <label class="checkbox-container">ال جی
                                                        <input type="checkbox">
                                                        <span class="checkmark-login3"></span>
                                                    </label>
                                                    <span class="pull-left pt-1 brand_eng">Lg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white siderbar mt-2">
                    <div class="sidebar_catalog">
                        <div>
                            <label class="position-relative">
                                <input type="checkbox" class="ios-switch">
                                <div>
                                    <div></div>
                                </div>
                                <div class="text-switch"><span>فقط کالاهای موجود</span></div>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <!--start content-->
            <div class="col-md-9 order-first order-md-last">
                <div class="bg-transparent">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">فروشگاه اینترنتی آنلاین شاپ </a></li>
                            @if($category->parent_id!=null)
                                @if($category->parent->parent)
                                    <li class="breadcrumb-item"><a href="#">
                                            {{$category->parent->parent->name}}
                                        </a>
                                    </li>
                                @endif
                                <li class="breadcrumb-item"><a href="#">{{$category->parent->name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$category->name}}</a></li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <p class="listing_counter">{{count($viewProducts)}} محصول </p>
                <div class="box_navpills">
                    <ul class="nav nav-pills bg-white py-2" id="pills-tab">
                        <i class="material-icons pt-1 sort">sort</i>
                        <span class="pt-1 text_sort px-1">مرتب سازی بر اساس :</span>
                        <li class="nav-item">
                            <a href="{{route('show_category',['id'=>$category->id,'time_sort'=>'on'])}}"
                               class="nav-link" {{--id="pills-home-tab2"--}} {{--data-toggle="pill"--}}>جدیدترین</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('show_category',['id'=>$category->id,'price_sort'=>'arzan'])}}"
                               class="nav-link">ارزان ترین</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('show_category',['id'=>$category->id,'price_sort'=>'geran'])}}"
                               class="nav-link">گران ترین</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach($viewProducts as $view_product)
                                        <div class="col-md-4 full_product-box bg-white">
                                            <div class="product-box bg-white border-bottom">
                                                <a href="{{route('show_product',['id'=>$view_product->id])}}">
                                                    <img src="{{asset($view_product->file)}}" width="150px"
                                                         height="200px">
                                                </a>
                                                <div class="text_product pt-2">
                                                    <p class="title">{{$view_product->title}}</p>
                                                    <p class="price">{{number_format($view_product->price)}} تومان</p>
                                                </div>
                                            </div>
                                            <div class="box_rate">
                                                <span><i class="material-icons">stars</i>2.8</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start pagination-->
    <div class="container mt-3">
        <div class="row justify-content-end">
            <div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="#" class="page-link">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a href="#" class="page-link active_pagination">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item">
                            <a href="#" class="page-link">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!--start ads-->
    <div class="container-fluid ads mt-4 pt-2 ">
        <div class="row">
            <div class="col-md-3 col-6 serv text-center">
                <a href="#1"> <img src="img/aads1.png" class="w-100 d-block rounded" alt=""> </a>

            </div>
            <div class="col-md-3 col-6 serv text-center">
                <a href="#2"> <img src="img/aads2.png" class="w-100 d-block rounded" alt=""></a>

            </div>
            <div class="col-md-3 col-6 serv pt-md-0 pt-2 text-center">
                <a href="#3"> <img src="img/aads3.png" class="w-100 d-block rounded" alt=""></a>

            </div>
            <div class="col-md-3 col-6 serv pt-md-0 pt-2 text-center">
                <a href="#4"> <img src="img/aads4.png" class="w-100 d-block rounded" alt=""></a>

            </div>
        </div>
    </div>

    <!--start slider-->
    <div class="container-fluid mt-3">
        <div class="col-12">
            <section class="slider box_shadow">
                <div class="row">
                    <div class="card panel-title-custom">
                        <div class="card-header  card-header-custom">
                            <p>محصولات مرتبط
                            </p>
                        </div>
                        <div class="card-body py-1" style="padding: 50px">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/2836814.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>مچ بند هوشمند شیائومی مدل Mi Band 3</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/2481611.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>مچ بند هوشمند مدل M2</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1903438.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>ساعت هوشمند بی اس ان ال مدل A9</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/2795704.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>ساعت هوشمند وی سریز مدل A1</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/2836814.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>مچ بند هوشمند شیائومی مدل Mi Band 3</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/2481611.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>مچ بند هوشمند مدل M2</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1903438.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>ساعت هوشمند بی اس ان ال مدل A9</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/2795704.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>ساعت هوشمند وی سریز مدل A1</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!--start category-->
    <div class="container category my-5 bg-white">
        <div class="row">
            <span>دسته بندی ها :</span>
            <a href="#">هدفون</a>
            -
            <a href="#">هدفون</a>
            -
            <a href="#">هدفون</a>
            -
            <a href="#">هدفون</a>
        </div>
    </div>













    <!--start jump-to-top-->
    <div class="container-fluid text-center box_jump_top">
        <a href="#" id="back2Top" class="d-block jump_top pt-2 pb-2">
            <i class="material-icons">
                expand_less
            </i>
            <span>برگشت به بالا</span>
        </a>
    </div>






    <script>
        $(document).ready(function(){
            $('#back2Top').click(function(){
                $("html,body").animate({scrollTop:0}, "slow")
                return false;
            });
        })
    </script>
    <script>
        $(document).ready()
        {
            var owl=$('.owl-carousel');
            owl.owlCarousel({
                items:4,
                rtl:true,
                margin:25,
                nav:true,
                loop:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            });
        }
    </script>
@endsection

@section('footer')
    <div class="container-fluid pt-2 bg_footer">
        <div class="row">
            <div class="col-md-3 col-6 serv text-center">
                <img src="/img/serv3.svg">
                <p>ضمانت اصل بودن کالا</p>
            </div>
            <div class="col-md-3 col-6 serv text-center">
                <img src="/img/serv4.svg">
                <p>هفت روز ضمانت بازگشت</p>
            </div>
            <div class="col-md-3 col-6 serv text-center">
                <img src="/img/serv2.svg ">
                <p>پرداخت درب منزل</p>
            </div>
            <div class="col-md-3 col-6 serv text-center">
                <img src="/img/serv5.svg">
                <p>پشتیبانی همه روزه</p>
            </div>
        </div>
        <div class="container border-bottom"></div>
        <div class="container border-bottom pb-3 pt-3">
            <div class="row">
                <div class="col">
                    <div class="box_footer_links">
                        <p><a href="#">راهنمایی خرید از آنلاین شاپ</a></p>
                        <ul>
                            <li><a href="#">نحوه ثبت سفارش</a></li>
                            <li><a href="#">رویه ارسال سفارش</a></li>
                            <li><a href="#">شیوه های پرداخت</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="box_footer_links">
                        <p><a href="#">خدمات مشتریان</a></p>
                        <ul>
                            <li><a href="#">پاسخ به پرسش های متداول</a></li>
                            <li><a href="#">رویه های بازگردانی کالا</a></li>
                            <li><a href="#">شرایط استفاده</a></li>
                            <li><a href="#">حریم خصوصی</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="box_footer_links">
                        <p><a href="#">با آنلاین شاپ</a></p>
                        <ul>
                            <li><a href="#">فروش در آنلاین شاپ</a></li>
                            <li><a href="#">همکاری با سازمان ها</a></li>
                            <li><a href="#">فرصت های شغلی</a></li>
                            <li><a href="#">تماس با آنلاین شاپ</a></li>
                            <li><a href="#">درباره آنلاین شاپ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col mt-3 mt-sm-0">
                    <div class="footer_form">
                        <p>از تخفیف ها و جدیدترین های آنلاین شاپ باخبر شوید:</p>
                        <form>
                            <div class="input-group text-right">
                                <input type="text" class="form-control rounded-right bg-white input_search" placeholder="آدرس ایمیل خود را وارد کنید">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info border-0 custom-input-group-text rounded-left">
                                        <a href="#" class="text-white">ارسال</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="pt-4">آنلاین شاپ را در شبکه های اجتماعی دنبال کنید:</p>
                        <div class="social_instagram text-center">
                            <a href="#"><img src="img/instagrams.svg" class="px-1">اینستاگرام آنلاین شاپ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-3">
            <div class="row">
                <div class="footer_box_right ml-auto">
                    <p>هفت روز هفته، 24 ساعت شبانه روز پاسخگوی شما هستیم</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">شماره تماس: <a href="#">61930000 - 021، 95119095 - 021</a></li>
                        <li class="list-inline-item">آدرس ایمیل: <a href="#">info@digikala.com</a></li>
                    </ul>
                </div>
                <div class="footer_box_left mr-auto">
                    <a href="#"><img src="img/bazar.png"></a>
                    <a href="#"><img src="img/sibapp.png"></a>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid py-4">
        <div class="row pr-5 pt-5 offset-1">
            <div class="col-lg-6 col-12 footer_digi">
                <p>فروشگاه اینترنتی آنلاین شاپ، بررسی، انتخاب و خرید آنلاین</p>
                <span>آنلاین شاپ به عنوان یکی از قدیمی ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با پایبندی به سه اصل کلیدی، پرداخت در محل، 7 روز ضمانت بازگشت کالا و تضمین اصل بودن کالا، موفق شده تا همگام با فروشگاه های معتبر جهان، به بزرگترین فروشگاه اینترنتی ایران تبدیل شود. به محض ورود به آنلاین شاپ با یک سایت پر از کالا رو به رو می شوید! هر آنچه که نیاز دارید و به ذهن شما خطور می کند در اینجا پیدا خواهید کرد.</span>
            </div>
            <div class="col-md-5 col-12 box_banner">
                <div class="row">
                    <img src="/img/img_footer.JPG" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row pt-4 text-center">
            <div class="col-md-3 col-6"><img src="/img/img_footer1.svg"></div>
            <div class="col-md-3 col-6"><img src="/img/img_footer2.svg"></div>
            <div class="col-md-3 col-6 pt-2"><img src="/img/img_footer3.svg"></div>
            <div class="col-md-3 col-6"><img src="/img/img_footer4.svg"></div>
        </div>
        <div class="container border_bottom1 pt-4"></div>
        <div class="container text-center copyRight pt-4">
            <p>استفاده از مطالب فروشگاه اینترنتی آنلاین شاپ فقط برای مقاصد غیر تجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به شرکت نوآوران فن آوازه (فروشگاه آنلاین شاپ) می باشد.</p>
        </div>
    </footer>

@endsection
