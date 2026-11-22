@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
<div class="eyebrow">Account directory</div>
<h1 class="heading">Customer Accounts</h1>
<p class="lede">A quick look at the people who shop with your store.</p>
<div class="table-wrap"><table>
    <thead><tr><th>Full name</th><th>Email address</th><th>Phone</th></tr></thead>
    <tbody>
    @foreach ($customers as $customer)
        <tr><td class="person">{{ $customer->full_name }}</td><td>{{ $customer->email }}</td><td>{{ $customer->phone }}</td></tr>
    @endforeach
    @if ($customers->isEmpty())
        <tr><td colspan="3">No customers found.</td></tr>
    @endif
    </tbody>
</table></div>
<p class="note">Customer records: {{ count($customers) }}</p>
@endsection
