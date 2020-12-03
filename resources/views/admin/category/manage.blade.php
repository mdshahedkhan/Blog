@extends('admin.app.app')
@section('title')
    Manage Category
@endsection
@section('content')
    <div class="m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Manage All Category Form</h3>
                <a href="{{ route('admin.category.add-category') }}" class="btn btn-primary float-right">Add new category</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-hover">
                    <tr>
                        <th>Si</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th width="100px">Status</th>
                        <th width="180px">Action</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td><input type="checkbox" data-toggle="toggle" id="CategoryStatus" data-id="{{ $category->id }}" data-on="Active" data-size="small" data-offstyle="warning" data-off="Inactive" {{ $category->status == 'active' ? 'checked':'' }}></td>
                            <td>
                                <a href="{{ route('admin.category.view', $category->id) }}" class="btn btn-info btn-sm float-left mr-1">View</a>
                                <a href="{{ route('admin.category.edit-show', $category->id) }}" class="btn btn-warning btn-sm float-left mr-1">Edit</a>
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $categories->links() }}
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
