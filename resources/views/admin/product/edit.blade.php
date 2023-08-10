@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش محصول</h5>

            <form method="post" action="{{route('product_update',['id'=>$product->id])}}" enctype="multipart/form-data">
                @csrf
                <label class="form-group has-float-label">
                    <input  type="text" name="title" value="{{$product->title}}" class="form-control" />
                    <span>عنوان</span>
                </label>
                <label>دسته بندی</label>
                <select class="form-control " data-width="100%" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id==$product->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                <label class="mt-2">برند</label>
                <select class="form-control " data-width="100%" name="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" @if($brand->id==$product->$brand_id) selected @endif>{{$brand->name}}</option>
                    @endforeach
                </select>
                <label>تصویر</label>
                <br>
                <img src="{{asset($product->file)}}" width="25px" height="25px"/>
                <input type="file" name="file">
                <label class="form-group has-float-label">
                    <input  type="number" name="price" value="{{$product->price}}" class="form-control" />
                    <span>قیمت</span>
                </label>
                <label class="form-group has-float-label">
                    <input  type="text" name="color" value="{{$product->color}}" class="form-control" />
                    <span>رنگ</span>
                </label>
                <label class="form-group has-float-label">
                    <input type="text" name="description" value="{{$product->description}}" class="form-control" />
                    <span>توضیحات</span>
                </label>
                <button class="btn btn-primary" type="submit">ثبت</button>
            </form>
        </div>
    </div>

@endsection

