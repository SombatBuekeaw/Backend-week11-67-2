@extends('admin.layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <div class="row">
                <div class="col-lg-9">
                    <h5 class="mb-0">Category List</h5>
                </div>

                <div class="col-lg-3 d-flex justify-content-start justify-content-lg-end mb-3 mb-lg-0">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-light btn-sm text-primary">
                        <i class="fa-solid fa-plus"></i> Create New Category
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 50) }}</td>
                                <td>
                                    <a href="{{ asset('uploads/categories/' . $category->image) }}" target="_blank">
                                        <img src="{{ asset('uploads/categories/' . $category->image) }}" alt="{{ $category->name }}" width="50" height="50" class="rounded-circle">
                                    </a>
                                </td>
                                <td>
                                    <span class="badge 
                                        @if ($category->status === 'Active') bg-success 
                                        @elseif ($category->status === 'Inactive') bg-warning 
                                        @else bg-danger 
                                        @endif">
                                        {{ $category->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning btn-sm text-white">
                                        <i class="fa-regular fa-pen-to-square"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
