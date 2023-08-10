@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">افزودن برند</h5>

            <form method="post" action="/admin/brand/save" enctype="multipart/form-data">
                @csrf
                <label class="form-group has-float-label">
                    <input  type="text" name="name" class="form-control" />
                    <span>نام</span>
                </label>
                <label class="mt-2">تصویر</label><br>
                <input type="file" name="file">
                <br>
                <button class="btn btn-primary mt-5" type="submit">افزودن</button>
            </form>
        </div>
    </div>

@endsection

