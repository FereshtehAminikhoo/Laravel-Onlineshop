@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">افزودن محصول</h5>

            <form method="post" action="/admin/product/save" enctype="multipart/form-data">
                @csrf
                <label class="form-group has-float-label">
                    <input  type="text" name="title" class="form-control" />
                    <span>عنوان</span>
                </label>
                <label>دسته بندی</label>
                <select class="form-control " data-width="100%" name="category_id">
                    <option value=""></option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <label class="mt-3">تصویر</label>
                <br>
                <input type="file" name="file">
                <label class="form-group has-float-label mt-4">
                    <input  type="number" name="price" class="form-control" />
                    <span>قیمت</span>
                </label>
                <label class="form-group has-float-label">
                    <input  type="text" name="color" class="form-control" />
                    <span>رنگ</span>
                </label>
                <label class="form-group has-float-label">
                    <input type="text" name="description" class="form-control" />
                    <span>توضیحات</span>
                </label>
{{--                <label>دسته بندی والد</label>--}}
{{--                <select class="form-control " data-width="100%" name="parent_id">--}}
{{--                    <option value=""></option>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                <label>تصویر</label>--}}
{{--                <br>--}}
{{--                <input type="file" name="file">--}}
                <button class="btn btn-primary mt-5" type="submit">افزودن</button>
            </form>
        </div>
    </div>

@endsection

