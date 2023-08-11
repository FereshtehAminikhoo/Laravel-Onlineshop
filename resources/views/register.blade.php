@extends('main')
@section('content')
<div class="container-fluid mt-5 bg-white shadow-sm border border-bottom-0 header_register">
    <div class="row">
        <div class="col-md-12 pt-2 pr-4">
            <h4>ثبت نام در آنلاین شاپ</h4>
        </div>
    </div>
</div>

<div class="container-fluid bg-white shadow-sm border form_register">
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="container mt-2 form_box">
                    <div class="col-md-12">
                        <p>اگر قبلا ثبت نام کرده اید، نیاز به ثبت نام مجدد ندارید</p>
                    </div>
                </div>
            </div>
            <form  action="{{route('client_createAccount')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>نام</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">person_outline</i></span>
                            </div>
                            <input type="text" name="name" class="form-control rounded-left input_form0" placeholder="نام خود را وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>نام خانوادگی</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">person_outline</i></span>
                            </div>
                            <input type="text" name="family_name" class="form-control rounded-left input_form0" placeholder="نام خانوادگی خود را وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>کدملی</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                            <input type="number" name="national" class="form-control rounded-left input_form0" placeholder="کدملی خود را وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>شماره تماس</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">phone</i></span>
                            </div>
                            <input type="number" name="phone_number" class="form-control rounded-left input_form0" placeholder="شماره تماس خود را وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>ایمیل</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">mail_outline</i></span>
                            </div>
                            <input type="email" name="email" class="form-control rounded-left input_form0" placeholder="ایمیل خود را وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>رمز عبور</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">lock_open</i></span>
                            </div>
                            <input type="password" name="password" class="form-control rounded-left input_form0" placeholder="رمز عبور خود را وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>تکرار رمز عبور</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">lock_open</i></span>
                            </div>
                            <input type="password" name="repeat_password" class="form-control rounded-left input_form0" placeholder="رمز عبور خود را مجدد وارد نمایید" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 mb-1">
                        <input type="checkbox" value="checkbox">
                        <label class="label_checkbox"><a href="#">حریم خصوصی</a> و <a href="#">شرایط و قوانین</a> استفاده از سرویس های سایت آنلاین شاپ را مطالعه نموده و با کلیه موارد آن موافقم.</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <button type="submit" class="btn btn-lg btn_register">ثبت نام در آنلاین شاپ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<div class="container-fluid shadow-sm border border-top-0 check_register">
    <div class="row">
        <div class="col-md-12 pt-3 text-center register_footer">
            <ul class="list-inline">
                <span>قبلا در آنلاین شاپ ثبت نام کرده اید؟</span>
                <li class="list-inline-item"><a href="{{route('client_login')}}">وارد شوید</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="border-bottom mt-5 pt-3"></div>
<div class="container-fluid mt-3 pt-2 mb-5 pb-5 footer_page">
    <div class="row">
        <div class="col-md-12 col-sm-6 text-center text-sm-center">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">درباره آنلاین شاپ</a></li>
                <li class="list-inline-item"><a href="#">فرصت های شغلی</a></li>
                <li class="list-inline-item"><a href="#">تماس با ما</a></li>
                <li class="list-inline-item"><a href="#">همکاری با سازمان ها</a></li>
            </ul>
            <p>استفاده از مطالب فروشگاه اینترنتی آنلاین شاپ فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به شرکت نوآوران فن آوازه (فروشگاه آنلاین شاپ) می باشد.</p>
        </div>
    </div>
</div>

@stop
