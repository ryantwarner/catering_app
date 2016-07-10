@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.orders.title') }}</small>
    </h1>
@endsection

@section('content')

<h1>{{ trans("orders.show") }}</h1>

Customer: {!! App\Customer::find($data->customer_id)->name !!}<br />
Status: {!! $data->status !!}<br />
<br />
Items:
<ul>
@forelse ($data->items as $item)
<li>
    {{ !is_null($item->guest) ? $item->guest->contact->contact->first_name . " " .$item->guest->contact->contact->last_name : '' }}<br />
    {{ $item->menu_item->name . ' - $' . $item->menu_item->price }}<br />
    {{ $item->menu_item->description }}
    {{ $item->note }}
</li>
@empty
<li>No items</li>
@endforelse
<li><a class='btn btn-default' href="{{ url('admin/orders/' . $data->id . "/items/create") }}">Add Item</a></li>
</ul>
Notes:
<ul>
@forelse ($data->notes as $note)
<li>
    {{ $note->note }}
</li>
@empty
<li>No notes</li>
@endforelse
<li><a class='btn btn-default' href="{{ url('admin/orders/' . $data->id . '/notes/create') }}">Add Note</a></li>
</ul>

<a class='btn btn-primary' href="{!! url('admin/orders/'.$data->id.'/edit') !!}">Edit Order</a>


@endsection