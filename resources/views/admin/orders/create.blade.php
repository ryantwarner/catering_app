@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.orders.title') }}</small>
    </h1>
@endsection

@section('content')

<h1>{{ trans("strings.admin.orders.create") }}</h1>
{!! Form::model($data, ['url' => 'admin/orders/'.$data->id, 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', collect('Select Customer')->merge(App\Customer::all()->lists('name', 'id')), $data->customer_id) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Order Status') !!}
    {!! Form::select('status', array(
        'Select Status', 'open' => 'Open', 'closed' => 'Closed', 'cancelled' => 'Cancelled',
        'in_progress' => 'In Progress', 'complete' => 'Complete', 'invoiced' => 'Invoiced',
        'paid' => 'Paid', 'arrears' => 'Arrears'
    ), $data->status) !!}
</div>
{!! Form::submit() !!}
{!! Form::close() !!}

@endsection