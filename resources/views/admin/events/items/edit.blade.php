@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.events.title') }}</small>
    </h1>
@endsection

@section('content')

<div class='box box-success'>
    <div class='box-header'>
        <h1>{{ trans("events.items.edit") }}</h1>
    </div>
    <div class='box-body'>
        {!! Form::model($data, ['url' => 'admin/events/'.$data->event_id.'/items/'.$data->id, 'method' => 'put', 'class' => 'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('guest_id', 'Guest', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-10'>
                {!! Form::select('guest_id', collect(['Please select a guest'])->merge($data->event()->with(['customer', 'customer.guests', 'customer.guests.contact', 'customer.guests.contact.contact'])->first()->customer->guests->lists('contact.contact.full_name', 'id')), $data->guest_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('menu_item_id', 'Menu Item', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-10'>
                {!! Form::select('menu_item_id', App\Menu\Item::all()->lists('name_price', 'id'), $data->menu_item_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('note', 'Notes', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-10'>
                {!! Form::textarea('note', $data->note, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class='box-footer'>
        <a href='{{ url ('admin/events/'.$data->event_id) }}' class='pull-left btn btn-default btn-xs'>Back</a>
        {!! Form::submit('Save', ['class' => 'pull-right btn btn-primary btn-xs']) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection