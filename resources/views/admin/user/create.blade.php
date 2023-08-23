@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">افزودن ادمین</h5>

            <form method="post" action="/admin/user/save">
                @csrf
                <label class="form-group has-float-label">
                    <input name="name" type="text" class="form-control" />
                    <span>نام</span>
                </label>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-group has-float-label">
                    <input name="family_name" type="text" class="form-control" />
                    <span>نام خانوادگی</span>
                </label>
                @error('family_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-group has-float-label">
                    <input name="national_code" type="number" class="form-control" />
                    <span>کدملی</span>
                </label>
                @error('national')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-group has-float-label">
                    <input name="mobile" type="number" class="form-control" />
                    <span>شماره تماس</span>
                </label>
                @error('mobile')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-group has-float-label">
                    <input name="email" type="email" class="form-control" />
                    <span>ایمیل</span>
                </label>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-group has-float-label">
                    <input name="password" type="password" class="form-control" />
                    <span>رمز عبور</span>
                </label>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary" type="submit">افزودن</button>
            </form>
        </div>
    </div>
@endsection
