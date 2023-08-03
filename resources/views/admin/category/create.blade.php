@extends('admin.index')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-4">Create Category</h5>

            <form method="post" action="/admin/category/save">
                @csrf
                <label class="form-group has-float-label">
                    <input name="title" class="form-control" />
                    <span>name</span>
                </label>

                <button class="btn btn-primary" type="submit">Add</button>
            </form>
        </div>
    </div>

@endsection
