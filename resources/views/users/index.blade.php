@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
<div class="eyebrow">Team directory</div>
<h1 class="heading">User Accounts</h1>
<p class="lede">A list of POS staff accounts and usernames.</p>
<div class="table-wrap"><table>
    <thead><tr><th>Full name</th><th>Username</th></tr></thead>
    <tbody>
    @foreach ($users as $user)
        <tr><td class="person">{{ $user->full_name }}</td><td>{{ $user->username }}</td></tr>
    @endforeach
    @if ($users->isEmpty())
        <tr><td colspan="2">No users found.</td></tr>
    @endif
    </tbody>
</table></div>
<p class="note">User records: {{ count($users) }}</p>
@endsection
