@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.events.title') }}</small>
    </h1>
@endsection

@section('content')
{!! Form::model($data, ['url' => 'admin/events/'.$data['id'], 'method' => 'delete']) !!}
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width='1%'></th>
            <th>Event Date</th>
            <th>Status</th>
            <th>Items</th>
            <th>Notes</th>
            <th>Guests</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data['events'] as $d)
        <tr>
            <td>{!! Form::checkbox('delete[]', $d->id) !!}</td>
            <td><a href="{{ url('admin/events/' . $d->id) }}">{{ $d->created_at }}</a></td>
            <td><a href="{{ url('admin/events/' . $d->id) }}">{{ $d->status }}</a></td>
            <td><a href="{{ url('admin/events/' . $d->id . "/items") }}">{{ count($d->items) }}</a></td>
            <td><a href="{{ url('admin/events/' . $d->id . "/notes") }}">{{ count($d->notes) }}</a></td>
            <td><a href="{{ url('admin/events/' . $d->id . "/guests") }}">{{ count($d->guests) }}</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No events, make some?</td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="row-fluid">
    <div class="pull-left">
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    </div>
    <div class="pull-right">
        <a href="{{ url('admin/events/customer/1/create') }}" class="btn btn-primary">New Event</a>
    </div>
</div>
{!! Form::close() !!}
@endsection