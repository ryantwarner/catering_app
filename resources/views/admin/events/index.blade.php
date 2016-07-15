@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.events.title') }}</small>
    </h1>
@endsection

@section('content')
<div class="box">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Event Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $d)
        <tr>
            <td><a href="{{ url('admin/events/customer/' . $d->customer_id) }}">{{ $d->customer()->first()->name }}</a></td>
            <td><a href="{{ url('admin/events/customer/' . $d->customer_id) }}">{{ $d->created_at }}</a></td>
        </tr>
        @empty
        <tr>
            <td colspan='2'>
                There are no customers who have any events. Make some?
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
<div class='container'>
    <a href="{{ url('admin/events/create') }}" class="btn btn-primary pull-right">Create New Event</a>
</div>

@endsection