@extends('admin.app.app')
@section('title')
    Manage Category
@endsection
@section('content')
    <div class="m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Manage All Post Form</h3>
                <a href="{{ route('admin.post.add') }}" class="btn btn-primary float-right">Add new Post</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-hover">
                    <tr>
                        <th>Si</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Description</th>
                        <th width="100px">Image</th>
                        <th width="50px">Status</th>
                        <th width="180px">Action</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ substr($post->title, 0, 10) }}</td>
                            <td>{{ substr($post->sub_title, 0, 20) }}</td>
                            <td>{{ substr($post->description, 0, 40) }}</td>
                            <td><img src="{{ asset('/upload/Post/'.$post->image) }}" width="80px" height="50px" alt="{{ substr($post->title, 0, 10) }}"></td>
                            <td><input type="checkbox" data-toggle="toggle" id="PostStatus" data-id="{{ $post->id }}" data-on="Active" data-size="normal" data-offstyle="warning" data-off="Inactive" {{ $post->status == 'active' ? 'checked':'' }}></td>
                            <td>
                                <a href="{{ route('admin.category.view', $post->id) }}" class="btn btn-info btn-sm float-left mr-1">View</a>
                                <a href="{{ route('admin.category.edit-show', $post->id) }}" class="btn btn-warning btn-sm float-left mr-1">Edit</a>
                                <form action="{{ route('admin.category.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $posts->links() }}
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
