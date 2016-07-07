@extends('layouts.default')

@section('content')

<h1>{{ trans("orders.edit") }}</h1>

Customer: {!! App\Customer::find($data->customer_id)->name !!}<br />
Status: {!! $data->status !!}<br />
<br />
Items:
<ul>
@forelse ($data->items as $item)
<li>
    {{ !is_null($item->guest) ? $item->guest->contact->contact->first_name . " " .$item->guest->contact->contact->last_name . '<br />' : '' }}
    {{ $item->menu_item->name }}<br />
    {{ $item->menu_item->description }}
</li>
@empty
<li>No items</li>
@endforelse
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
</ul>

<a href="{!! url('orders/'.$data->id.'/edit') !!}">Edit Order</a>


@endsection