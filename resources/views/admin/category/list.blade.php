@extends('admin.index')
@section('content')
<div class="col-lg-6 col-md-12 mb-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">دسته بندی ها</h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">نام</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <a class="fa fa-edit fa-2x" href="{{route('category_edit',['id'=>$category->id])}}"></a>

                            <a class="fa fa-remove fa-2x" href="{{route('category_delete',['id'=>$category->id])}}"></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
