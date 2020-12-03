@extends('admin.app.app')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="container col-md-8" style="min-height: 567px">
        @if(session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Add Post Form</h3>
                <a href="{{ route('admin.post.manage') }}" class="btn btn-primary float-right">Manage All Post</a>
            </div>
            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="categories" class="form-control @error('categories') is-invalid @enderror" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $loop->iteration .' - '. $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Post TITLE</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Post Title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" id="sub_title" name="sub_title" value="{{ old('sub_title') }}" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Enter Sub Title">
                        @error('sub_title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <textarea type="text" id="summernote"  name="description" placeholder="Post Description" class="form-control summernote @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="custom-file col-sm-4 mb-3">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="image">Post Images</label>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" value="active" class="custom-control-input @error('status') is-invalid @enderror ">
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" value="inactive" class="custom-control-input @error('status') is-invalid @enderror ">
                            <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <input type="submit" class="btn btn-primary" value="Add New Post">
                </div>
            </form>
        </div>
    </div>
@endsection
