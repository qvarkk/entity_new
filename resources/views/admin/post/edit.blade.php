@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post #{{ $post->id }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.show', $post->id) }}">Post #{{ $post->id }}</a></li>
                            <li class="breadcrumb-item active">Edit Post #{{ $post->id }}</li>
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
                    <form action="{{ route('admin.post.update', $post->id) }}" method="post" class="col-12" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-4">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Post title" value="{{ old('title', $post->title)  }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 w-100">
                            <label for="summernote">Content</label>
                            <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Edit Preview Image</label>
                            <div class="mb-3">
                                <img class="w-100" src="{{ url('storage/' . $post->preview_image) }}" alt="Preview Image">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
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
                                        {{ $category->id == old('category_id', $post->category_id) ? ' selected' : '' }}
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
                                        {{ is_array( old('tag_ids', $post->tags->pluck('id')->toArray()) ) && in_array( $tag->id, old('tag_ids', $post->tags->pluck('id')->toArray()) ) ? ' selected' : '' }}
                                    >{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
