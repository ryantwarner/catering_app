@extends('layouts.default')

@section('content')

<h1>{{ trans("orders.edit") }}</h1>
{!! Form::model($data, ['url' => 'orders/'.$data->order_id.'/items', 'method' => 'post']) !!}
<div class="form-group">
    {!! Form::label('guest_id', 'Guest') !!}
    {!! Form::select('guest_id', $data->order()->with(['customer', 'customer.guests', 'customer.guests.contact', 'customer.guests.contact.contact'])->first()->customer->guests->lists('contact.contact.full_name', 'id'), $data->guest_id) !!}
</div>
<div class="form-group">
    {!! Form::label('menu_item_id', 'Menu Item') !!}
    {!! Form::select('menu_item_id', App\Menu\Item::all()->lists('name', 'id'), $data->menu_item_id) !!}
</div>
<div class="form-group">
    {!! Form::label('note', 'Notes') !!}
    {!! Form::textarea('note', $data->note) !!}
</div>
{!! Form::submit() !!}
{!! Form::close() !!}

@endsection