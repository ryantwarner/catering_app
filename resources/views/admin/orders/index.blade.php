@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.orders.title') }}</small>
    </h1>
@endsection

@section('content')
<a href="{{ url('admin/orders/create') }}" class="btn btn-primary">Create New Order</a>
<table class="table table-bordered table-striped">
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
@endsection