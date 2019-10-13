@extends('layouts.app')

@section('content')
<div class="post-create">
    <div class="feed-container">
        <div class="feed-header">
            <div data-react-render="post" data-slug="{{ $post->slug }}">{{ $post->title }}</div>
        </div>
    </div>
</div>
@endsection
