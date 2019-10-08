@extends('layouts.app')

@section('content')
<div class="profile">
    <div class="feed-container">
        <div class="feed-header">
            <div class="profile-shadow">Community member</div>
            <div class="profile-header">
                <div class="name">{{ $user->name }}</div>
            </div>
            <div class="profile-subheader">
                <div class="item"><i class="icon" data-feather="at-sign"></i>{{ $user->username }}</div>
                <div class="item"><i class="icon" data-feather="anchor"></i>Joined {{ $user->created_at->diffForHumans() }}</div>
            </div>
            <div class="profile-bio">
                {{ $user->bio }}
            </div>
        </div>

        <div class="feed">
            Posts will be populated here.
        </div>

        <div class="feed-sidebar">
            Content sidebar goes here.
        </div>
    </div>
</div>
@endsection
