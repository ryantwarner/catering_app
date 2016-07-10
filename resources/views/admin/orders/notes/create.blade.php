@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.orders.title') }}</small>
    </h1>
@endsection

@section('content')

<h1>{{ trans("orders.edit") }}</h1>
{!! Form::model($data, ['url' => 'admin/orders/'.$data->order_id.'/notes', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('note', 'Note') !!}
    {!! Form::textarea('note', $data->note) !!}
</div>
{!! Form::submit() !!}
{!! Form::close() !!}

@endsection