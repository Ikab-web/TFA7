@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="eyebrow">Customer accounts</div>
<h1 class="heading">Edit customer</h1>
<p class="lede">Update {{ $customer->full_name }}'s contact details.</p>
<form class="form-card" method="POST" action="{{ route('customers.update', $customer) }}">
    @csrf
    @method('PUT')
    <div class="field"><label for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name) }}" required maxlength="100" autocomplete="name">@error('full_name')<div class="error">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="email">Email address</label><input id="email" name="email" type="email" value="{{ old('email', $customer->email) }}" required maxlength="100" autocomplete="email">@error('email')<div class="error">{{ $message }}</div>@enderror</div>
    <div class="field"><label for="phone">Phone</label><input id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" maxlength="20" autocomplete="tel">@error('phone')<div class="error">{{ $message }}</div>@enderror</div>
    <button class="button" type="submit">Save changes</button>
</form>
<a class="back-link" href="{{ route('customers.index') }}">Back to customers</a>
@endsection
