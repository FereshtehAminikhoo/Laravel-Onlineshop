@extends('admin.index')
@section('content')
    <div class="col-lg-8 col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">برند ها</h5>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام</th>
                        <th scope="col">تصویر</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$brand->name}}</td>
                            <td>
                                @if($brand->file !== null)
                                    <img src="{{asset($brand->file)}}" width="50px" height="50px" alt="pic">

                                @endif
                            </td>
                            <td>
                                <a class="fa fa-edit fa-2x" href="{{route('brand_edit',['id'=>$brand->id])}}"></a>

                                <a class="fa fa-remove fa-2x" href="{{route('brand_delete',['id'=>$brand->id])}}"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

