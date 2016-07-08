@extends('layouts.default')

@section('content')

<h1>{{ trans("orders.edit") }}</h1>
{!! Form::model($data, ['url' => 'orders/'.$data->order_id.'/notes', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('note', 'Note') !!}
    {!! Form::textarea('note', $data->note) !!}
</div>
{!! Form::submit() !!}
{!! Form::close() !!}

@endsection