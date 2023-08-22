@extends('main')
@section('content')
    <div class="container-fluid mt-5 pt-5">
        <div class="row">
            <div class="col-md-4 col-sm-6 m-auto change_password">
                <div class="bg-white shadow-sm border">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 header_change_pass">
                            <a href="#"><i class="material-icons">arrow_forward</i></a>
                            <h4>تغییر رمز عبور</h4>
                        </div>
                    </div>
                    <div class="border-bottom mt-3"></div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mt-3 form_change_pass">
                            <form method="post" action="{{route('change_password')}}">
                                @csrf
                                <div class="col-md-12 pb-5 mb-5 new_pass">
                                    <label>رمز عبور جدید<span>*</span></label>
                                    <div class="input-group">
                                        <input name="password" type="text" class="form-control rounded-right input_form0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white icon_form rounded-left"><i class="material-icons">visibility</i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4 pt-3 new_pass">
                                    <label>تکرار رمز عبور جدید<span>*</span></label>
                                    <div class="input-group">
                                        <input name="repeat-password" type="text" class="form-control rounded-right input_form0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white icon_form rounded-left"><i class="material-icons">visibility</i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4 pt-3 mb-5 pb-3 text-center btn_change_pass">
                                        <button type="submit" class="btn btn_change">تغییر رمز</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
