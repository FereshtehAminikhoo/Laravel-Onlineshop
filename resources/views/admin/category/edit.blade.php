@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش دسته بندی</h5>

            <form method="post" action="{{route('category_update',['id'=>$category->id])}}">
                @csrf
                <label class="form-group has-float-label">
                    <input name="name" class="form-control" value="{{$category->name}}" />
                    <span>نام</span>
                </label>
                <button class="btn btn-primary" type="submit">ثبت</button>
            </form>
        </div>
    </div>
@endsection
