@extends('main')
@section('content')
<div class="container-fluid mt-5 bg-white shadow-sm border border-bottom-0 header_login">
    <div class="row">
        <div class="col-md-12 pt-2 pr-4">
            <h4>ورود به آنلاین شاپ</h4>
        </div>
    </div>
</div>

<div class="container-fluid bg-white shadow-sm border form_login">
    <div class="row">
        <div class="col-md-12 mt-2">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <label>ایمیل</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">person_outline</i></span>
                            </div>
                            <input name="email" type="email" class="form-control rounded-left input_form0 @error('email') is-invalid @enderror" placeholder="ایمیل خود را وارد نمایید" value="{{ old('email') }}" required />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2 d-flex justify-content-between align-items-center">
                        <label class="">رمز عبور</label>

                            <a class="btn btn-link mb-2" href="{{ route('password_reset_form') }}">
                                رمز عبور خود را فراموش کرده اید؟
                            </a>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white icon_form rounded-right"><i class="material-icons">lock_open</i></span>
                            </div>
                            <input type="password" class="form-control rounded-left input_form0 @error('password') is-invalid @enderror" placeholder="رمز عبور خود را وارد نمایید" name="password" required />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" class="btn btn-lg btn_login">ورود به آنلاین شاپ</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2 pt-2">
                        <input type="checkbox" value="checkbox">
                        <label for="checkbox">مرا به خاطر داشته باش</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid shadow-sm border border-top-0 check_login">
    <div class="row">
        <div class="col-md-12 pt-3 text-center login_footer">
            <ul class="list-inline">
                <span>کاربر جدید هستید؟</span>
                <li class="list-inline-item"><a href="{{route('client_register')}}">ثبت نام در آنلاین شاپ</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="border-bottom mt-5 pt-3"></div>
<div class="container-fluid mt-3 pt-2 footer_page">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center text-sm-center">
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

@endsection
