@extends('admin.index')
@section('content')
    <div class="col-lg-10 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">محصولات</h5>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">دسته بندی</th>
                        <th scope="col">تصویر</th>
                        <th scope="col">قیمت</th>
                        <th scope="col">رنگ</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->title}}</td>
                            <td>
                                @if($product->category_id !== null)
                                    {{$product->category->name}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($product->file !== null)
                                    <img src="{{asset($product->file)}}" width="50px" height="50px" alt="pic">

                                @endif
                            </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->color}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a class="fa fa-edit fa-2x" href="{{route('product_edit',['id'=>$product->id])}}"></a>

                                <a class="fa fa-remove fa-2x" href="{{route('product_delete',['id'=>$product->id])}}"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

