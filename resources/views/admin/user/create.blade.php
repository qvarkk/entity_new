@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a>
                            </li>
                            <li class="breadcrumb-item active">Create User</li>
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
                    <form action="{{ route('admin.user.store') }}" method="post" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="User name"
                                   value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <div class="text-danger pb-3">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="User email"
                                   value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <div class="text-danger pb-3">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Select Role</label>
                            <select class="form-control" name="role">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == old('role', 1) ? ' selected' : '' }}
                                    >{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                        <div class="text-danger pb-3">{{ $message }}</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Add &plus;">
                    </form>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
