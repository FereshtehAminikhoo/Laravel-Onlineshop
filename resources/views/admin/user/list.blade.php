@extends('admin.index')
@section('content')
<div class="col-lg-12 col-md-12 mb-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">کاربران</h5>
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">نام</th>
                    <th scope="col">نام خانوادگی</th>
                    <th scope="col">کدملی</th>
                    <th scope="col">نوع</th>
                    <th scope="col">شماره تماس</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">رمزعبور</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->family_name}}</td>
                        <td>{{$user->national_code}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>
                            <a class="fa fa-edit fa-2x" href="{{route('user_edit', ['id' => $user->id])}}"></a>
                            <a class="fa fa-remove fa-2x" href="{{route('user_delete', ['id' => $user->id])}}"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
