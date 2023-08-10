@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">ویرایش برند</h5>

            <form method="post" action="{{route('brand_update',['id'=>$brand->id])}}" enctype="multipart/form-data">
                @csrf
                <label class="form-group has-float-label">
                    <input  type="text" name="name" value="{{$brand->name}}" class="form-control" />
                    <span>نام</span>
                </label>
                <label>تصویر</label>
                <br>
                <img src="{{asset($brand->file)}}" width="25px" height="25px"/>
                <input type="file" name="file">
                <br>
                <button class="btn btn-primary mt-5" type="submit">ثبت</button>
            </form>
        </div>
    </div>

@endsection

