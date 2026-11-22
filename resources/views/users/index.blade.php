@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
<div class="eyebrow">Team directory</div>
<h1 class="heading">User Accounts</h1>
<p class="lede">A list of POS staff accounts and usernames.</p>
<div class="toolbar"><span class="note">Manage staff accounts and profile pictures.</span><a class="button" href="{{ route('users.create') }}">Add user</a></div>
<div class="table-wrap"><table>
    <thead><tr><th>Avatar</th><th>Full name</th><th>Username</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach ($users as $user)
        <tr><td><img class="avatar" src="{{ $user->avatar ? \Illuminate\Support\Facades\Storage::disk('public')->url($user->avatar) : asset('images/avatar-placeholder.svg') }}" alt="{{ $user->full_name }} avatar"></td><td class="person">{{ $user->full_name }}</td><td>{{ $user->username }}</td><td><a href="{{ route('users.edit', $user) }}">Edit</a></td></tr>
    @endforeach
    @if ($users->isEmpty())
        <tr><td colspan="4">No users found.</td></tr>
    @endif
    </tbody>
</table></div>
<p class="note">User records: {{ count($users) }}</p>
@endsection
