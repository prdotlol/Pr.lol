@extends('layouts.app')

@section('toodle')
1`2
@endsection

@section('content')
<div class="post-create">
    <div class="feed-container">
        <div class="feed-header">
            <div class="title">Share something...</div>
        </div>
        <div class="feed">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" class="form-control">
                        <option value="">1</option>
                    </select>
                    <small id="contentlHelp" class="form-text text-muted">Pick the most relevant type for this post.</small>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">{{ __('Image') }}</label>
                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>
                    <small id="contentlHelp" class="form-text text-muted">Select an image related to this post.</small>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">{{ __('Content') }}</label>
                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required></textarea>
                    <small id="contentlHelp" class="form-text text-muted">This is the main body of the post.</small>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Creat Post') }}
                    </button>
                </div>
            </form>

        </div>
        <div class="feed-sidebar">
            <div class="post-create-tips">
                <div class="header">
                    <i class="icon" data-feather="help-circle"></i>
                    <div class="sidebar-title">Tips for Post</div>
                </div>
                <ul class="list">
                    <li>Use a non-clickbaity title</li>
                    <li>Select the right type for your posts</li>
                    <li>Add upto three relevant tags for your posts</li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
