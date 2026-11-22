@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="eyebrow">User accounts</div>
<h1 class="heading">Edit user</h1>
<p class="lede">Update {{ $user->full_name }}'s account and profile picture.</p>
<form class="form-card" method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="field"><label for="username">Username</label><input id="username" name="username" value="{{ old('username', $user->username) }}" required maxlength="50" autocomplete="username">@error('username')<div class="error">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" required maxlength="100" autocomplete="name">@error('full_name')<div class="error">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="avatar">Profile picture</label><input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/webp">@error('avatar')<div class="error">{{ $message }}</div>@enderror<small>JPG, PNG, or WebP. Maximum 2 MB. Images are resized to fit within 512 × 512 pixels.</small></div>
    @if ($user->avatar)<p><img class="avatar" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($user->avatar) }}" alt="Current profile picture">Current profile picture</p>@endif
    <button class="button" type="submit">Save changes</button>
</form>
<a class="back-link" href="{{ route('users.index') }}">Back to users</a>
@endsection
