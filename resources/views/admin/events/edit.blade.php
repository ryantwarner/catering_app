@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.events.title') }}</small>
    </h1>
@endsection

@section('content')

<h1>{{ trans("events.edit") }}</h1>
{!! Form::model($data, ['url' => 'admin/events/'.$data->id, 'method' => 'put']) !!}
<div class="form-group">
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', App\Customer::all()->lists('name', 'id'), $data->customer_id) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Event Status') !!}
    {!! Form::select('status', array(
        'open' => 'Open', 'closed' => 'Closed', 'cancelled' => 'Cancelled',
        'in_progress' => 'In Progress', 'complete' => 'Complete', 'invoiced' => 'Invoiced',
        'paid' => 'Paid', 'arrears' => 'Arrears'
    ), $data->status) !!}
</div>
{!! Form::submit() !!}
{!! Form::close() !!}

@endsection