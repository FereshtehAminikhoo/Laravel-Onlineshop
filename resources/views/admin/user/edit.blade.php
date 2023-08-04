@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش کاربر</h5>

            <form method="post" action="{{route('user_update', ['id' => $user->id])}}">
                @csrf
                <label class="form-group has-float-label">
                    <input name="name" type="text" class="form-control" />
                    <span>نام</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="email" type="email" class="form-control" />
                    <span>ایمیل</span>
                </label>
                <label class="form-group has-float-label">
                    <input name="password" type="password" class="form-control" />
                    <span>رمز عبور</span>
                </label>

                <button class="btn btn-primary" type="submit">ثبت</button>
            </form>
        </div>
    </div>

@endsection

