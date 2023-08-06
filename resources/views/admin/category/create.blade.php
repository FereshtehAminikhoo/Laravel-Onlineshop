@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">افزودن دسته بندی</h5>

            <form method="post" action="/admin/category/save" enctype="multipart/form-data">
                @csrf
                <label class="form-group has-float-label">
                    <input name="name" class="form-control" />
                    <span>نام</span>
                </label>
                    <label>دسته بندی والد</label>
                    <select class="form-control " data-width="100%" name="parent_id">
                        <option value=""></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                <label>تصویر</label>
                <br>
                <input type="file" name="file">
                <button class="btn btn-primary mt-5" type="submit">افزودن</button>
            </form>
        </div>
    </div>
@endsection
