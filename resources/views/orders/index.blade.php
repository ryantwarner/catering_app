@extends('layouts.default')

@section('content')

<table>
    <thead>
        <tr>
            <th>Customer</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $d)
        <tr>
            <td><a href="{{ url('orders/customer/' . $d->customer_id) }}">{{ $d->customer()->first()->name }}</a></td>
            <td><a href="{{ url('orders/customer/' . $d->customer_id) }}">{{ $d->created_at }}</a></td>
        </tr>
        @empty
        <tr>
            <td colspan='2'>
                is empty
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
<a href="{{ url('orders/create') }}">New</a>

@endsection