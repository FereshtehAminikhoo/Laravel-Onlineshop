@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش دسته بندی</h5>

            <form method="post" enctype="multipart/form-data" action="{{route('category_update',['id'=>$category->id])}}">
                @csrf
                <label class="form-group has-float-label">
                    <input name="name" class="form-control" value="{{old('name',$category->name)}}" />
                    <span>نام</span>
                </label>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label>دسته بندی والد</label>
                <select class="form-control " data-width="100%" name="parent_id">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(old('parent_id',$category->parent_id)==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                <label class="mt-3">تصویر</label>
                <br>
                <img src="{{asset($category->file)}}" width="25px" height="25px"/>
                <input type="file" name="file">
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <button class="mt-5 btn btn-primary" type="submit">ثبت</button>
            </form>
        </div>
    </div>
@endsection
