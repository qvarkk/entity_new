@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary">Add &plus;</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a class="fas fa-eye"
                                                   href="{{ route('admin.category.show', $category->id) }}"></a>
                                                <a class="ml-2 fas fa-pen text-success"
                                                   href="{{ route('admin.category.edit', $category->id) }}"></a>
                                                <form class="ml-2 d-inline" action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 bg-transparent" type="submit">
                                                        <a class="fas fa-trash text-danger" role="button"></a>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row mx-auto">
                    {{ $categories->links('pagination.admin') }}
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
