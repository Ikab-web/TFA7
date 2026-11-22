@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="eyebrow">User accounts</div>
<h1 class="heading">Add user</h1>
<p class="lede">Create a POS staff account. You can add a profile picture after saving.</p>
<form class="form-card" method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="field"><label for="username">Username</label><input id="username" name="username" value="{{ old('username') }}" required maxlength="50" autocomplete="username">@error('username')<div class="error">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name') }}" required maxlength="100" autocomplete="name">@error('full_name')<div class="error">{{ $message }}</div>@enderror</div>
    <button class="button" type="submit">Save user</button>
</form>
<a class="back-link" href="{{ route('users.index') }}">Back to users</a>
@endsection
