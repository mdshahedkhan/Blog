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
                <h3 class="float-left">Add Category Form</h3>
                <a href="{{ route('admin.category.manage-category') }}" class="btn btn-primary float-right">Manage All Category</a>
            </div>
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" value="active" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" value="inactive" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <input type="submit" class="btn btn-primary" value="Add New Category">
                </div>
            </form>
        </div>
    </div>
@endsection
