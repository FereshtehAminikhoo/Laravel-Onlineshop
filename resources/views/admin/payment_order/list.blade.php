@extends('admin.index')
@section('content')
    <div class="col-lg-10 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">لیست سفارشات</h5>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام کاربر</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تاریخ پرداخت</th>
                        <th scope="col"> قیمت کل (تومان)</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $cartItem)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$cartItem->user->name.' '.$cartItem->user->family_name}}</td>
                            <td>{{$cartItem->stat}}</td>
                            <td>{{$cartItem->jalali_date}}</td>
                            <td>{{number_format($cartItem->total_price)}}</td>
                            <td>
                                <a class="btn-info p-2 rounded-pill" href="{{route('payment_order_item_list',['id'=>$cartItem->id])}}">نمایش لیست آیتم ها</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
