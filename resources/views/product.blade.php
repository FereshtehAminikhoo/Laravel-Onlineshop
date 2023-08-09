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
@section('content')
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
                <div class="dropdown">
                    <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" style="line-height: 40px!important;">
                        ورود/ثبت نام
                    </a>
                    <div class="dropdown-menu border-0 shadow rounded-0 dropdown-menu_custom text-center"
                         aria-labelledby="dropdownMenuButton">
                        <div class="btn login_box">
                            <a class="dropdown-item dropdown-item-custom py-2 btn btn-info" href="#">ورود به آنلاین شاپ</a>
                        </div>
                        <ul class="list-inline register">
                            <li class="list-inline-item">کاربر جدید هستید؟</li>
                            <li class="list-inline-item"><a href="#">ثبت نام</a></li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <div class="text-left">
                            <button onclick="location.href='http://www.google.com'"
                                    class="dropdown-item border-0 dropdown-item_custom" type="button"><i
                                    class="material-icons profile_link pr-2">person</i>پروفایل
                            </button>
                            <button onclick="location.href='http://www.google.com'"
                                    class="dropdown-item border-0 dropdown-item_custom" type="button"><i
                                    class="material-icons profile_link pr-2">assignment_turned_in</i>پیگیری سفارش
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-6 text-right">
                <a href="#" class="btn btn-outline-info">
                    <i class="material-icons shopping_cart">shopping_cart</i>سبد خرید <span>۰</span>
                </a>
            </div>
        </div>
    </div>

    <!--start product-->
    <div class="container-fluid box_product">
        <div class="row">
            <div class="col-lg-4 bg-white">
                <div class="row">
                    <div class="col-lg-2 col-2 gallery_options">
                        <ul class="list-inline">
                            <li><a href="#"><i class="material-icons">favorite_border</i></a></li>
                            <li><a href="#"><i class="material-icons">share</i></a></li>
                            <li><a href="#"><i class="material-icons">hdr_strong</i></a></li>
                            <li><a href="#"><i class="material-icons">timeline</i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-10">
                        <div class="box_img border-bottom text-center pt-0 pt-md-4">
                            <img src="{{asset($product->file)}}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 product-info">
                <div class="row text-center text-md-left">
                    <div class="col-md-9 pt-3">
                        <h1 class="product-title">{{$product->title}}</h1>
                    </div>
                    <div class="col-md-3 text-center box_beenhere">
                        <i class="material-icons beenhere">beenhere</i>
                        <p>بیش از 20 نفر از خریداران این محصول را پیشنهاد داده اند</p>
                    </div>
                </div>
                <div class="border_bottom"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="product_directory pt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <span>برند</span>
                                    :
                                    <span>متفرقه</span>
                                </li>
                                <li class="list-inline-item pr-3">
                                    <span>دسته بندی</span>
                                    :
                                    <span><a href="{{route('show_category',['id'=>$product->category_id])}}">{{$product->category->name}}</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="box_color mt-1 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item title"> رنگ :<span class="box_check1">{{$product->color}}</span></li>

                            </ul>
                        </div>
                        <br>
                        <div class="product_guarantee mt-3 text-center text-md-left">
                            <i class="material-icons">offline_pin</i>
                            <span>سرویس ویژه آنلاین شاپ : 7 روز تضمین تعویض کالا</span>
                        </div>
                        <div class="border_bottom mt-3"></div>
                        <div class="product_guarantee mt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item mr-0"><i class="material-icons store">store</i></li>
                                <li class="list-inline-item">
                                    <span>فروشنده</span>
                                    :
                                    <span><a href="#">بوسمن</a></span>
                                </li>
                                <li class="seller_rate"><span>رضایت خرید : 53%</span></li>
                            </ul>
                        </div>
                        <div class="product_guarantee mt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item mr-0">
                                    <img src="/img/1fb9a3a5.svg">
                                </li>
                                <li class="list-inline-item mr-2">
                                    <span>بسته بندی و ارسال توسط آنلاین شاپ</span>
                                </li>
                            </ul>
                        </div>
                        <div class="product_guarantee mt-2 text-center text-md-left">
                            <ul class="list-inline">
                                <li class="list-inline-item mr-0">
                                    <img src="img/warehouse.JPG">
                                </li>
                                <li class="list-inline-item mr-2">
                                    <span class="text-info">آماده ارسال</span>
                                </li>
                            </ul>
                        </div>
                        <div class="border_bottom mt-3"></div>
                        <div class="box_price mt-2 text-center text-md-left">
                            <p>{{$product->price}} تومان</p>
                            <a href="{{route('add_product_to_cart',['id'=>$product->id])}}" class="btn btn_custom2 shadow-sm"><i class="material-icons">shopping_cart</i>افزودن به سبد خرید</a>
                        </div>
                    </div>
                    <div class="col-md-4 product_params bg-transparent mt-2 text-center text-md-left">
                        <div class="bxo1">
                            <a href="#" class="btn btn-white"><i class="material-icons">store</i>7 فروشنده / گارانتی این کالا</a>
                        </div>
                        <div class="box2 mt-4">
                            <span>ویژگی های محصول</span>
                            <ul>
                                <li>قابلیت پخش موسیقی : دارد</li>
                                <li>قابلیت کنترل صدا و موزیک : ندارد</li>
                                <li>راهنمایی صوتی : ندارد</li>
                                <li><a href="#">موارد بیشتر +</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 pb-4 text-center text-md-left">
                    <div class="col-md-6">
                        <ul class="list-inline">
                            <li class="list-inline-item unfair-price">آیا از قیمت راضی هستید؟</li>
                            <li class="list-inline-item unfair-price"><a href="#">بله</a></li>
                            <li class="list-inline-item"><a href="#">|</a></li>
                            <li class="list-inline-item unfair-price"><a href="#">خیر</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 box_offer text-right text-center text-md-right">
                        <span><i class="material-icons local_offer">local_offer</i><a href="#">کالای خود را در آنلاین شاپ بفروشید</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start product feature-->
    <div class="container mt-3 product_feature">
        <div class="row">
            <div class="col box">
                <a href="#"><img src="/img/c99c8b3d.svg" class="img-fluid">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>تحویل اکسپرس</li>
                    </ul>
                </a>
            </div>
            <div class="col box">
                <a href="#"><img src="/img/28cf2088.svg" class="img-fluid pf_img">
                    <ul class="list-inline">
                        <li>پشتیبانی</li>
                        <li>7 روزه 24 ساعته</li>
                    </ul>
                </a>
            </div>
            <div class="col box">
                <a href="#"><img src="/img/4c9cdf1f.svg" class="img-fluid pf_img">
                    <ul class="list-inline">
                        <li>امکان</li>
                        <li>پرداخت در محل</li>
                    </ul>
                </a>
            </div>
            <div class="col box">
                <a href="#"><img src="/img/d9c5e979.svg" class="img-fluid pf_img">
                    <ul class="list-inline">
                        <li>7 روز</li>
                        <li>ضمانت بازگشت</li>
                    </ul>
                </a>
            </div>
            <div class="col box">
                <a href="#"><img src="/img/9aec2c1d.svg" class="img-fluid pf_img">
                    <ul class="list-inline">
                        <li>ضمانت</li>
                        <li>اصل بودن کالا</li>
                    </ul>
                </a>
            </div>
        </div>
    </div>

    <!--start suppliers-->
    <div class="container mt-4">
        <div class="title_suppliers">
            <span><i class="material-icons">store</i>لیست فروشنده / گارانتی های این محصول</span>
        </div>
        <div class="table_suppliers pb-4 bg-white mt-4 shadow-sm">
            <table class="table bg-white table-bordered table-responsive_custom">
                <thead>
                <tr class="text-white">
                    <th>نام فروشنده</th>
                    <th>زمان ارسال</th>
                    <th>گارانتی</th>
                    <th>قیمت</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="table_link">
                        <a href="#">رهام</a>
                        <br>
                        <i class="material-icons">check</i>
                        <span class="span1">رضایت خرید: </span><span class="span2">59 % از (1396) رای</span>
                    </td>
                    <td>
                        <img src="/img/warehouse.JPG" width="25">
                        <span class="span2">آماده ارسال</span>
                        <br>
                        <span class="span1">بسته بندی و ارسال توسط آنلاین شاپ</span>
                    </td>
                    <td>
                        <i class="material-icons offline_pin">offline_pin</i>
                        <span class="title_g">گارانتی اصالت و سلامت فیزیکی کالا</span>
                    </td>
                    <td>
                        <span class="price pt-2">65,000 تومان</span>
                    </td>
                    <td>
                        <a href="#" class="btn btn_custom2 shadow-sm">افزودن به سبد خرید</a>
                    </td>
                </tr>
                <tr>
                    <td class="table_link">
                        <a href="#">رهام</a>
                        <br>
                        <i class="material-icons">check</i>
                        <span class="span1">رضایت خرید: </span><span class="span2">59 % از (1396) رای</span>
                    </td>
                    <td>
                        <img src="/img/warehouse.JPG" width="25">
                        <span class="span2">آماده ارسال</span>
                        <br>
                        <span class="span1">بسته بندی و ارسال توسط آنلاین شاپ</span>
                    </td>
                    <td>
                        <i class="material-icons offline_pin">offline_pin</i>
                        <span class="title_g">گارانتی اصالت و سلامت فیزیکی کالا</span>
                    </td>
                    <td>
                        <span class="price pt-2">65,000 تومان</span>
                    </td>
                    <td>
                        <a href="#" class="btn btn_custom2 shadow-sm">افزودن به سبد خرید</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="text-center">
                <p class="text-center"><a href="#">مشاهده (5) فروشنده / گارانتی بیشتر<i class="material-icons">keyboard_arrow_down</i></a></p>
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
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
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

    <!--start box-tabs-->
    <div class="container-fluid box-tabs mt-4">
        <ul class="nav nav-tabs nav-tabs-custom border sticky-top" id="myTab">
            <li class="nav-item border-right">
                <a href="#home" class="nav-link" id="home-tab" data-toggle="tab">
                    <i class="material-icons">assignment</i>مشخصات
                </a>
            </li>
            <li class="nav-item border-left">
                <a href="#profile" class="nav-link" id="profile-tab" data-toggle="tab">
                    <i class="material-icons">message</i>کاربران
                </a>
            </li>
            <li class="nav-item border-left">
                <a href="#contact" class="nav-link active" id="contact-tab" data-toggle="tab">
                    <i class="material-icons">contact_support</i>پرسش و پاسخ
                </a>
            </li>
        </ul>
        <div class="tab-content box-content" id="myTabContent">
            <!--start tab details-->
            <div class="tab-pane fade bg-white p-5" id="home">
                <h4>مشخصات فنی</h4>
                <span>HBQ-I7 Bluetooth Handsfree</span>
                <div class="box_list mt-4">
                    <p class="title"><i class="material-icons">arrow_left</i>مشخصات کلی</p>
                    <section>
                        <ul class="param_list lis-inline">
                            <div class="container">
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت پخش موسیقی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">دارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت کنترل صدا و موزیک</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">راهنمایی صوتی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </section>
                </div>
                <div class="box_list mt-4">
                    <p class="title"><i class="material-icons">arrow_left</i>مشخصات کلی</p>
                    <section>
                        <ul class="param_list lis-inline">
                            <div class="container">
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت پخش موسیقی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">دارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت کنترل صدا و موزیک</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">راهنمایی صوتی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </section>
                </div>
                <div class="box_list mt-4">
                    <p class="title"><i class="material-icons">arrow_left</i>مشخصات کلی</p>
                    <section>
                        <ul class="param_list lis-inline">
                            <div class="container">
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت پخش موسیقی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">دارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت کنترل صدا و موزیک</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">راهنمایی صوتی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </section>
                </div>
                <div class="box_list mt-4">
                    <p class="title"><i class="material-icons">arrow_left</i>مشخصات کلی</p>
                    <section>
                        <ul class="param_list lis-inline">
                            <div class="container">
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom1">راهنمایی صوتی</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">دارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <!-- <div class="box_params_list">
                                            <p class="block border_right_custom1">قابلیت کنترل صدا و موزیک</p>
                                        </div> -->
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                                <div class="row pr-md-2">
                                    <li class="list-inline-item col-md-3 pl-md-1 pr-md-3 p-0 m-0">
                                        <!-- <div class="box_params_list">
                                            <p class="block border_right_custom1">راهنمایی صوتی</p>
                                        </div> -->
                                    </li>
                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                        <div class="box_params_list">
                                            <p class="block border_right_custom2">ندارد</p>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </section>
                </div>
            </div>
            <!--end tab details-->
            <!--start tab users-->
            <div class="tab-pane fade bg-white p-5" id="profile">
                <h4>امتیاز کاربران به:</h4>
                <span class="font-weight-bold">هندزفری بلوتوث (103 نفر)</span>
                <div class="box_comment container mt-4">
                    <div class="row">
                        <div class="col-md-6 bc1 col-12">
                            <div class="row mt-1">
                                <div class="col-lg-5 col-12">
                                    <span class="progress_title">آرگونومی</span>
                                </div>
                                <div class="col-lg-5 col-12">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 95%;" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-12 text-center text-lg-right px-0">
                                    <span class="product_title2">عالی</span>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-5 col-12">
                                    <span class="progress_title">کیفیت عمومی پخش صدا</span>
                                </div>
                                <div class="col-lg-5 col-12">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 55%;" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-12 text-center text-lg-right px-0">
                                    <span class="product_title2">معمولی</span>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-5 col-12">
                                    <span class="progress_title">کیفیت ساخت</span>
                                </div>
                                <div class="col-lg-5 col-12">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 55%;" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-12 text-center text-lg-right px-0">
                                    <span class="product_title2">معمولی</span>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-5 col-12">
                                    <span class="progress_title">ارزش در برابر قیمت</span>
                                </div>
                                <div class="col-lg-5 col-12">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 68%;" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-12 text-center text-lg-right px-0">
                                    <span class="product_title2">معمولی</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 bc2">
                            <p>شما هم می توانید در مورد این کالا نظر بدهید</p>
                            <span>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا از آنلاین شاپ خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.</span>
                            <a href="#" class="btn btn_custom3 mt-4 shadow-sm"><i class="material-icons">add_comment</i>افزودن نظر جدید</a>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="container box_filter mt-5 border-bottom">
                        <div class="row">
                            <div class="col-md-6 bf1">
                                <p><i class="material-icons">transit_enterexit</i>نظرات کاربران</p>
                            </div>
                            <div class="col-md-6 bf2">
                                <ul class="list-inline">
                                    <li class="list-inline-item">مرتب سازی بر اساس :</li>
                                    <li class="list-inline-item"><a href="#">نظر خریداران</a></li>
                                    <li class="list-inline-item"><a href="#" class="active_custom">مفیدترین نظرات</a></li>
                                    <li class="list-inline-item"><a href="#">جدیدترین نظرات</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container box_users_comment mt-3 p-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="box_message_light">
                                    <i class="material-icons">shopping_cart</i>خریدار این محصول
                                </div>
                                <div class="box_shopping mt-5">
                                    <span>خریداری شده از :</span>
                                    <p><i class="material-icons">store</i><a href="#">اسمارت الکترونیک</a></p>
                                </div>
                                <div class="box_message_dislike mt-5">
                                    <i class="material-icons">thumb_down_alt</i>خرید این محصول را توصیه نمیکنم
                                </div>
                            </div>
                            <div class="col-md-9 pr-5" style="margin-top: -10px;">
                                <div class="box_comment_header mt-4 mt-md-0">
                                    <span class="span1">نخرید</span>
                                    <br>
                                    <span class="span2">توسط فرشته امینی خو در تاریخ 1 مرداد 1402</span>
                                </div>
                                <div class="border-bottom mt-3"></div>
                                <div class="row mt-4">
                                    <div class="col-md-6 evaluation-positive">
                                        <ul class="list-inline">
                                            <span>نقاط قوت</span>
                                            <li class="list-inline-item ml-3">هیچی</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 evaluation-negative">
                                        <ul class="list-inline">
                                            <span>نقاط ضعف</span>
                                            <li class="list-inline-item ml-3">کیفیت صدا، موقع زنگ اصلا صدا نمیره</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <p class="box_text_comment">دوستان سلام من این رو خریدم اصلا خوب نیست صدا نمیره اونایی که میگن خوبه همشون فروشنده این بسته هستنن با اکانت هایی که ساختن میان الکی نظر میدن نخرید اصلا خوب نیست</p>
                                    </div>
                                </div>
                                <div class="row comments_likes justify-content-end">
                                    <span class="mr-4 mt-1">آیا این نظر برایتان مفید بود ؟</span>
                                    <a href="#" class="btn btn-like mt-1 mt-md-0">بله 70</a>
                                    <a href="#" class="btn btn-like mt-1 mt-md-0">خیر 7</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container box_users_comment mt-3 p-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="box_message_light">
                                    <i class="material-icons">shopping_cart</i>خریدار این محصول
                                </div>
                                <div class="box_shopping mt-5">
                                    <span>خریداری شده از :</span>
                                    <p><i class="material-icons">store</i><a href="#">اسمارت الکترونیک</a></p>
                                </div>
                                <div class="box_message_dislike mt-5">
                                    <i class="material-icons">thumb_down_alt</i>خرید این محصول را توصیه نمیکنم
                                </div>
                            </div>
                            <div class="col-md-9 pr-5" style="margin-top: -10px;">
                                <div class="box_comment_header mt-4 mt-md-0">
                                    <span class="span1">نخرید</span>
                                    <br>
                                    <span class="span2">توسط فرشته امینی خو در تاریخ 1 مرداد 1402</span>
                                </div>
                                <div class="border-bottom mt-3"></div>
                                <div class="row mt-4">
                                    <div class="col-md-6 evaluation-positive">
                                        <ul class="list-inline">
                                            <span>نقاط قوت</span>
                                            <li class="list-inline-item ml-3">هیچی</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 evaluation-negative">
                                        <ul class="list-inline">
                                            <span>نقاط ضعف</span>
                                            <li class="list-inline-item ml-3">کیفیت صدا، موقع زنگ اصلا صدا نمیره</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <p class="box_text_comment">دوستان سلام من این رو خریدم اصلا خوب نیست صدا نمیره اونایی که میگن خوبه همشون فروشنده این بسته هستنن با اکانت هایی که ساختن میان الکی نظر میدن نخرید اصلا خوب نیست</p>
                                    </div>
                                </div>
                                <div class="row comments_likes justify-content-end">
                                    <span class="mr-4 mt-1">آیا این نظر برایتان مفید بود ؟</span>
                                    <a href="#" class="btn btn-like mt-1 mt-md-0">بله 70</a>
                                    <a href="#" class="btn btn-like mt-1 mt-md-0">خیر 7</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container box_users_comment mt-3 p-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="box_message_light">
                                    <i class="material-icons">shopping_cart</i>خریدار این محصول
                                </div>
                                <div class="box_shopping mt-5">
                                    <span>خریداری شده از :</span>
                                    <p><i class="material-icons">store</i><a href="#">اسمارت الکترونیک</a></p>
                                </div>
                                <div class="box_message_dislike mt-5">
                                    <i class="material-icons">thumb_down_alt</i>خرید این محصول را توصیه نمیکنم
                                </div>
                            </div>
                            <div class="col-md-9 pr-5" style="margin-top: -10px;">
                                <div class="box_comment_header mt-4 mt-md-0">
                                    <span class="span1">نخرید</span>
                                    <br>
                                    <span class="span2">توسط فرشته امینی خو در تاریخ 1 مرداد 1402</span>
                                </div>
                                <div class="border-bottom mt-3"></div>
                                <div class="row mt-4">
                                    <div class="col-md-6 evaluation-positive">
                                        <ul class="list-inline">
                                            <span>نقاط قوت</span>
                                            <li class="list-inline-item ml-3">هیچی</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 evaluation-negative">
                                        <ul class="list-inline">
                                            <span>نقاط ضعف</span>
                                            <li class="list-inline-item ml-3">کیفیت صدا، موقع زنگ اصلا صدا نمیره</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <p class="box_text_comment">دوستان سلام من این رو خریدم اصلا خوب نیست صدا نمیره اونایی که میگن خوبه همشون فروشنده این بسته هستنن با اکانت هایی که ساختن میان الکی نظر میدن نخرید اصلا خوب نیست</p>
                                    </div>
                                </div>
                                <div class="row comments_likes justify-content-end">
                                    <span class="mr-4 mt-1">آیا این نظر برایتان مفید بود ؟</span>
                                    <a href="#" class="btn btn-like mt-1 mt-md-0">بله 70</a>
                                    <a href="#" class="btn btn-like mt-1 mt-md-0">خیر 7</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end tab users-->
            <!--start tab Q & A-->
            <div class="tab-pane fade show active bg-white p-5" id="contact">
                <h4 class="font-weight-bold">پرسش و پاسخ</h4>
                <span class="font-weight-bold">پرسش خود را در مورد محصول مطرح نمایید</span>
                <div class="box_questions container mt-4">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="7"></textarea>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-12 text-center">
                                <a href="#" class="btn btn_custom3 btn-lg shadow-sm">ثبت پرسش</a>
                            </div>
                            <div class="col-md-9 col-12 m-0 p-0 pt-3 pt-md-0 email_check">
                                <form action="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label pr-4" for="customCheck1">اولین پاسخی که به پرسش من داده شد، از طریق ایمیل به من اطلاع دهید. <br>
                                            با انتخاب دکمه "ثبت پرسش"، موافقت خود را با <a href="#">قوانین انتشار محتوا</a> در آنلاین شاپ اعلام می کنم.
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="container box_filter mt-5 border-bottom">
                            <div class="row">
                                <div class="col-md-4 bf1">
                                    <p><i class="material-icons">transit_enterexit</i>پرسش ها و پاسخ ها (22 پرسش)</p>
                                </div>
                                <div class="col-md-8 bf2 text-md-right text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">مرتب سازی بر اساس :</li>
                                        <li class="list-inline-item"><a href="#">جدیدترین پرسش</a></li>
                                        <li class="list-inline-item"><a href="#" class="active_custom">بیشترین پاسخ به پرسش</a></li>
                                        <li class="list-inline-item"><a href="#">پرسش های شما</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="container box_questions mt-4">
                            <div class="row">
                                <div class="col-md-2 bq1 text-center">
                                    <i class="material-icons">contact_support</i>
                                    <br>
                                    <span class="span1">پرسش</span>
                                    <br>
                                    <span class="span2">فرشته امینی خو</span>
                                </div>
                                <div class="col-md-10 bq2">
                                    <p>سلام چطوری دو گوشی همزمان پخش میکنه ؟</p>
                                    <div class="row" style="position: relative; top:100px">
                                        <div class="col-md-5 col-6">
                                            <span class="date">8 مرداد 1402</span>
                                        </div>
                                        <div class="col-md-7 col-6">
                                            <a href="#" class="d-none d-sm-block">به این پرسش پاسخ دهید (1 پاسخ)</a>
                                            <a href="#" class="d-sm-none d-block">پاسخ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 bq1 text-center">
                                    <i class="material-icons highlight">highlight</i>
                                    <br>
                                    <span class="span1">پاسخ</span>
                                    <br>
                                    <span class="span2">فرشته امینی خو</span>
                                </div>
                                <div class="col-md-10 bq2 bg-transparent">
                                    <p>نحوه راه اندازی (خیلی دربارش پرسیده بودند) : اول: بلوتوث گوشی را خاموش کنید. دوم: لطفا کلید های چند منظوره در هر دو هدفون را همزمان فشار دهید</p>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row footer">
                                        <div class="col-md-5 col-12">
                                            <span class="date">16 مرداد 1402</span>
                                        </div>
                                        <div class="col-md-7 col-12 text-right">
                                            <div class="comments_likes">
                                                <span class="mr-4 mt-1">آیا این پاسخ برایتان مفید بود ؟</span>
                                                <a href="#" class="btn btn-like mt-1 mt-md-0">بله 70</a>
                                                <a href="#" class="btn btn-like mt-1 mt-md-0">خیر 7</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container box_questions mt-4">
                            <div class="row">
                                <div class="col-md-2 bq1 text-center">
                                    <i class="material-icons">contact_support</i>
                                    <br>
                                    <span class="span1">پرسش</span>
                                    <br>
                                    <span class="span2">فرشته امینی خو</span>
                                </div>
                                <div class="col-md-10 bq2">
                                    <p>سلام چطوری دو گوشی همزمان پخش میکنه ؟</p>
                                    <div class="row" style="position: relative; top:100px">
                                        <div class="col-md-5 col-6">
                                            <span class="date">8 مرداد 1402</span>
                                        </div>
                                        <div class="col-md-7 col-6">
                                            <a href="#" class="d-none d-sm-block">به این پرسش پاسخ دهید (1 پاسخ)</a>
                                            <a href="#" class="d-sm-none d-block">پاسخ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 bq1 text-center">
                                    <i class="material-icons highlight">highlight</i>
                                    <br>
                                    <span class="span1">پاسخ</span>
                                    <br>
                                    <span class="span2">فرشته امینی خو</span>
                                </div>
                                <div class="col-md-10 bq2 bg-transparent">
                                    <p>نحوه راه اندازی (خیلی دربارش پرسیده بودند) : اول: بلوتوث گوشی را خاموش کنید. دوم: لطفا کلید های چند منظوره در هر دو هدفون را همزمان فشار دهید</p>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row footer">
                                        <div class="col-md-5 col-12">
                                            <span class="date">16 مرداد 1402</span>
                                        </div>
                                        <div class="col-md-7 col-12 text-right">
                                            <div class="comments_likes">
                                                <span class="mr-4 mt-1">آیا این پاسخ برایتان مفید بود ؟</span>
                                                <a href="#" class="btn btn-like mt-1 mt-md-0">بله 70</a>
                                                <a href="#" class="btn btn-like mt-1 mt-md-0">خیر 7</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end tab Q & A-->
        </div>
    </div>

    <!--start slider-->
    <div class="container-fluid mt-3 mb-5">
        <div class="col-12">
            <section class="slider box_shadow">
                <div class="row">
                    <div class="card panel-title-custom">
                        <div class="card-header  card-header-custom">
                            <p>خریداران این محصول، محصولات زیر را هم خریده اند
                            </p>
                        </div>
                        <div class="card-body py-1" style="padding: 50px">
                            <div class="owl-carousel owl-theme">

                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
                                                <p>12300 هزاز تومان</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <div class="card panel-custom">
                                            <div class="card-body panel-body-custom">
                                                <img src="img/1687421.jpg" alt="">
                                            </div>
                                            <div class="card-footer panel-footer-custom">
                                                <h4>کنسول بازی سونی مدل Playstation 4</h4>
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

























    <!--start jump-to-top-->
    <div class="container-fluid text-center box_jump_top">
        <a href="#" id="back2Top" class="d-block jump_top pt-2 pb-2">
            <i class="material-icons">
                expand_less
            </i>
            <span>برگشت به بالا</span>
        </a>
    </div>

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
