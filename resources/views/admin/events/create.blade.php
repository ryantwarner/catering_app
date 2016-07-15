@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.events.title') }}</small>
    </h1>
@endsection

@section('content')

<h1>{{ trans("strings.admin.events.create") }}</h1>
{!! Form::model($data, ['url' => 'admin/events/'.$data->id, 'method' => 'post', 'class' => 'form-horizontal']) !!}
<div class="form-group">
    {!! Form::label('customer_id', 'Customer', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
        {!! Form::select('customer_id', collect('Select Customer')->merge(App\Customer::all()->lists('name', 'id')), $data->customer_id, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Event Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
        {!! Form::text('name', $data->name, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('status', 'Event Status', ['class' => 'col-sm-2 control-label']) !!}
    <div class='col-sm-10'>
    {!! Form::select('status', array(
        'Select Status', 'open' => 'Open', 'closed' => 'Closed', 'cancelled' => 'Cancelled',
        'in_progress' => 'In Progress', 'complete' => 'Complete', 'invoiced' => 'Invoiced',
        'paid' => 'Paid', 'arrears' => 'Arrears'
    ), $data->status, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row-fluid">
    <a href='{{ URL::previous() }}' class='pull-left btn btn-default'>Back</a>
{!! Form::submit('Create', ['class' => 'pull-right btn btn-primary']) !!}
</div>
{!! Form::close() !!}

@endsection