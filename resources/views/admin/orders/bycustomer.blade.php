@extends('layouts.default')

@section('content')

<table>
    <thead>
        <tr>
            <th>Order Date</th>
            <th>Status</th>
            <th>Items</th>
            <th>Notes</th>
            <th>Guests</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $d)
        <tr>
            <td><a href="{{ url('orders/' . $d->id) }}">{{ $d->created_at }}</a></td>
            <td><a href="{{ url('orders/' . $d->id) }}">{{ $d->status }}</a></td>
            <td><a href="{{ url('orders/' . $d->id . "/items") }}">{{ count($d->items) }}</a></td>
            <td><a href="{{ url('orders/' . $d->id . "/notes") }}">{{ count($d->notes) }}</a></td>
            <td><a href="{{ url('orders/' . $d->id . "/guests") }}">{{ count($d->guests) }}</a></td>
        </tr>
        @empty
        is empty
        @endforelse
    </tbody>
</table>

@endsection