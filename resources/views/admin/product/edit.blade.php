@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش محصول</h5>

            <form method="post" action="{{route('product_update',['id'=>$product->id])}}">
                @csrf
                <label class="form-group has-float-label">
                    <input  type="text" name="title" value="{{$product->title}}" class="form-control" />
                    <span>عنوان</span>
                </label>
                <label>دسته بندی</label>
                <select class="form-control " data-width="100%" name="category_id" value="{{$product->category_id}}>
                    <option value=""></option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <label>تصویر</label>
                <br>
                <input type="file" name="file value="{{$product->file}}">
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

