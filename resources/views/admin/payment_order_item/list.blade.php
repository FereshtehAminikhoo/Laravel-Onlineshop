@extends('admin.index')
@section('content')
    <div class="col-lg-10 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">لیست آیتم ها</h5>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">کد سفارش</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">تعداد</th>
                        <th scope="col">قیمت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderItems as $orderItem)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$orderItem->order_id}}</td>
                            <td>{{$orderItem->product->title}}</td>
                            <td>{{$orderItem->count}}</td>
                            <td>{{number_format($orderItem->price)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

