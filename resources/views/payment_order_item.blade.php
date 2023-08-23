@extends('main')
@section('navbar')
    <script>
        function showMustLoginAlert(){
            alert("برای افزودن محصول به سبد خرید، ابتدا وارد حساب کاربری خود شوید!")
        }
    </script>
    <nav class="navbar navbar-expand-md navbar-light navbar_custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu1">
            <div class="nav_line"></div>
            <ul class="navbar-nav">
                @foreach($categories as $category1)
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white dropdown-toggle" data-toggle="dropdown">{{$category1->name}}</a>
                        <div class="dropdown-menu dropdown-menu_custom1 shadow-sm rounded-bottom border-0" id="custom-main-dropdown-menu">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        @foreach($category1->childs as $item)
                                            <div class="top_link">
                                                <a href="{{route('show_category',['id'=>$item->id])}}"><i class="material-icons">keyboard_arrow_left</i>{{$item->name}}</a>
                                            </div>
                                            <ul class="list-group custom-list-group">
                                                @foreach($item->childs as $child)
                                                    <li class="list-group-item border-0 px-0"><a href="{{route('show_category',['id'=>$child->id])}}">{{$child->name}}</a></li>
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
                <a class="logo" href="/"></a>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-3 col-6">
                <form>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control rounded-right input_search"
                               placeholder="نام کالای موردنظر خود را وارد کنید..." oninput="searchInProducts(this)">
                        <div class="input-group-prepend">
                            <div class="input-group-text rounded-left custom-input-group-text">
                                <a href="#"><i class="material-icons">search</i></a>
                            </div>
                        </div>
                    </div>
                </form>
                <ul id="search_result" style="position: absolute;margin-top: 20px;z-index: 2;border-radius: 5px;width: 95%;padding: 0"></ul>
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
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-9 col-sm-10 m-auto">
                <div class="bg-white shadow-sm border payment_order">
                    <div class="row">
                        <div class="col-md-12 mt-3 pt-3 header_payment_order">
                            <h4>لیست آیتم ها</h4>
                        </div>
                    </div>
                    <div class="border_bottom mt-3 mx-auto" style="width: 93%;"></div>
                    <div class="row">
                        <div class="col-md-12 mt-3 pt-3 table_payment_order">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">کد سفارش</th>
                                    <th scope="col">نام محصول</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">قیمت</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderItems as $orderItem)
                                        <tr>

                                        <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$orderItem->order_id}}</td>
                                    <td>{{$orderItem->product->title}}</td>
                                    <td>{{$orderItem->count}}</td>
                                    <td>{{number_format($orderItem->price)}}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
















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
                            <a href="#"><img src="/img/instagrams.svg" class="px-1">اینستاگرام آنلاین شاپ</a>
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
                        <li class="list-inline-item">آدرس ایمیل: <a href="#">info@onlineshop.com</a></li>
                    </ul>
                </div>
                <div class="footer_box_left mr-auto">
                    <a href="#"><img src="/img/bazar.png"></a>
                    <a href="#"><img src="/img/sibapp.png"></a>
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
