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
           <div data-react-render="post-form"></div>
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
