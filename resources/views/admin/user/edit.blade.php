@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش کاربر</h5>

            <form method="post" action="{{route('user_update', ['id' => $user->id])}}">
                @csrf
                <label class="form-group has-float-label">
                    <input name="name" type="text" class="form-control" value="{{$user->name}}" />
                    <span>نام</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="family_name" type="text" class="form-control value="{{$user->family_name}}" />
                    <span>نام خانوادگی</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="national_code" type="number" class="form-control value="{{$user->national_code}}" />
                    <span>کدملی</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="mobile" type="number" class="form-control value="{{$user->mobile}}" />
                    <span>شماره تماس</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="email" type="email" class="form-control" value="{{$user->email}}" />
                    <span>ایمیل</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="password" type="password" class="form-control" value="{{$user->password}}"/>
                    <span>رمز عبور</span>
                </label>

                <button class="btn btn-primary" type="submit">ثبت</button>
            </form>
        </div>
    </div>
@endsection

