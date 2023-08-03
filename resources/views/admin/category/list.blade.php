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
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$category->name}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
