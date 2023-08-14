@extends('main')
@section('content')
    <div class="container-fluid mt-5 pt-5">
        <div class="row">
            <div class="col-md-4 col-sm-6 m-auto forget_password">
                <div class="bg-white shadow-sm border">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 header_forget_pass">
                            <a href="#"><i class="material-icons">arrow_forward</i></a>
                            <h4>فراموشی رمز عبور</h4>
                        </div>
                    </div>
                    <div class="border-bottom mt-3"></div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 form_forget_pass">
                            <form>
                                <p>برای بازیابی رمز عبور، ایمیل خود را وارد نمایید</p>
                                <div class="col-md-12 email_forget_pass">
                                    <label>ایمیل</label>
                                    <input type="email" class="form-control" placeholder="ایمیل خود را وارد نمایید">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4 pt-2 mb-5 pb-3 text-center btn_forget_pass">
                            <a href="#" class="btn btn_forget">بازیابی رمز عبور</a>
                        </div>
                    </div>
                </div>
                <div class="shaodw-sm border footer_check_email">
                    <div class="row">
                        <div class="col-md-12 mt-3 pt-2 text-center repeat_forget_pass">
                            <span>ایمیل ارسال نشد؟</span>
                            <a href="#">ارسال مجدد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
