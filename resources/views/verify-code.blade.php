@extends('main')
@section('content')
    <div class="container-fluid mt-5 pt-5">
        <div class="row">
            <div class="col-md-4 col-sm-6 m-auto forget_password">
                <div class="bg-white shadow-sm border">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 header_forget_pass">
                            <a href="#"><i class="material-icons">arrow_forward</i></a>
                            <h4>کد تایید</h4>
                        </div>
                    </div>
                    <div class="border-bottom mt-3"></div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 form_forget_pass">
                            <form method="post" action="{{route('forget_password_check_verify_code')}}">
                                @csrf
                                <input type="hidden" name="email" value="{{request()->email}}">
                                <p>برای بازیابی رمز عبور، کد تایید ارسال شده را وارد نمایید.</p>
                                <div class="col-md-12 email_forget_pass">
                                    <label>کد تایید</label>
                                    <input type="text" name="verify_code" class="form-control" placeholder="کد تایید خود را وارد نمایید">
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4 pt-2 mb-5 pb-3 text-center btn_forget_pass">
                                        <button type="submit" class="btn btn_forget">تایید</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="shaodw-sm border footer_check_email">
                    <div class="row">
                        <div class="col-md-12 mt-3 pt-2 text-center repeat_forget_pass">
                            <span>ایمیل ارسال نشد؟</span>
                            <a href="#" onclick="event.preventDefault();location.reload();">ارسال مجدد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
