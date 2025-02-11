@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a>
                            </li>
                            <li class="breadcrumb-item active">Create Post</li>
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
                    <form action="{{ route('admin.post.store') }}" method="post" class="col-12" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-4">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Post title" value="{{ old('title')  }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 w-100">
                            <label for="summernote">Content</label>
                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Add Preview Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image" value="{{ old('preview_image') }}">
                                    <label class="custom-file-label">Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Select Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? ' selected' : '' }}
                                    >{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Select Tags</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                    {{ ( is_array( old('tag_ids') ) && in_array( $tag->id, old('tag_ids')) ) ? ' selected' : '' }}
                                    >{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <input type="submit" class="btn btn-primary" value="Add &plus;">
                        </div>
                    </form>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
