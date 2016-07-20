@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.admin.events.title') }}</small>
    </h1>
@endsection

@section('content')

<h1>{{ trans("events.show") }}</h1>
{{ Form::open(['url' => 'admin/events/'.$data->id, 'method' => 'delete']) }}
<div class="box box-success">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-2"><strong>Customer:</strong></div>
            <div class="col-sm-4">{!! App\Customer::find($data->customer_id)->name !!}</div>
            <div class="col-sm-2"><strong>Status:</strong></div>
            <div class="col-sm-4">{!! $data->status !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-2"><strong>Event Name:</strong></div>
            <div class="col-sm-10">{!! $data->name !!}</div>
        </div>
    </div>
    <div class="box-footer">
        {{ Form::submit('Delete This Event', ['class' => 'pull-left btn btn-xs btn-danger']) }}
        <a class='pull-right btn btn-xs btn-primary' href="{!! url('admin/events/'.$data->id.'/edit') !!}">Edit Event</a>
    </div>
</div>
{{ Form::close() }}
<h2>Items:</h2>
{{ Form::open(['url' => 'admin/events/'.$data->id.'/items/', 'method' => 'delete']) }}
<div class="box box-success">
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="1%"></th>
                    <th>Guest</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data->items as $item)
                <?php $url = "admin/events/".$data->id."/items/".$item->id."/edit"; ?>
                <tr>
                    <td>{{ Form::checkbox('delete[]', $item->id) }}
                    <td><a href="{{ url($url) }}">{{ !is_null($item->guest) ? $item->guest->contact->contact->first_name . " " .$item->guest->contact->contact->last_name : '' }}</a></td>
                    <td><a href="{{ url($url) }}">{{ $item->menu_item->name }}</a></td>
                    <td><a href="{{ url($url) }}">{{ '$' . $item->menu_item->price }}</a></td>
                    <td><a href="{{ url($url) }}">{{ $item->menu_item->description }}</a></td>
                    <td><a href="{{ url($url) }}">{{ $item->note }}</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No items, add some?</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        {{ Form::submit('Delete', ['class' => 'pull-left btn btn-xs btn-danger']) }}
        <a class='pull-right btn btn-xs btn-success' href="{{ url('admin/events/' . $data->id . "/items/create") }}">Add Item</a>
    </div>
</div>
{{ Form::close() }}
{{ Form::open(['url' => 'admin/events/'.$data->id.'/notes/', 'method' => 'delete']) }}
<h2>Notes</h2>
<div class="box box-success">
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="1%"></th>
                    <th>Note</th>
                    <th width="15%">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data->notes as $note)
                <tr>
                    <td>{{ Form::checkbox('delete[]', $note->id) }}
                    <td>{{ $note->note }}</td>
                    <td>{{ $note->created_at }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No notes</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        {{ Form::submit('Delete', ['class' => 'pull-left btn btn-xs btn-danger']) }}
        <a class='pull-right btn btn-xs btn-success' href="{{ url('admin/events/' . $data->id . "/items/create") }}">Add Note</a>
    </div>
</div>


@endsection