@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit {{ $user->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a></li>
                            <li class="breadcrumb-item active">Edit {{ $user->name }}</li>
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
                    <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="col-4">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="User name" value="{{ old('name', $user->name) }}">
                        </div>
                        @error('name')
                            <div class="text-danger pb-3">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="User email"
                                   value="{{ old('email', $user->email) }}">
                        </div>
                        @error('email')
                        <div class="text-danger pb-3">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Select Role</label>
                            <select class="form-control" name="role">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == old('role', $user->role) ? ' selected' : '' }}
                                    >{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                        <div class="text-danger pb-3">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
