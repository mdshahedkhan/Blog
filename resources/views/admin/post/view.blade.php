@extends('admin.app.app')
@section('title')
    Manage Category
@endsection
@section('content')
    <div class="m-auto" style="min-height: 568px">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">View Data</h3>
                <a href="{{ route('admin.category.manage-category') }}" class="btn btn-primary float-right">Manage
                    category</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <td>{{ $data->name }}</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
