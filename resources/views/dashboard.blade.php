@extends('layouts.default')

@section('content')
<ul>
    <li><a href="{{ url('recipes') }}">Manage Recipes</a></li>
    <li><a href="{{ url('sources') }}">Manage Sources (aka Vendors)</a></li>
    <li><a href="{{ url('orders') }}">Manage Orders (aka Events)</a></li>
    <li><a href="{{ url('menus') }}">Manage Menus</a></li>
    <li><a href="{{ url('inventories') }}">Manage Inventories</a></li>
    <li><a href="{{ url('customers') }}">Manage Customers (aka PPL who make orders / events)</a></li>
    <li><a href="{{ url('contacts') }}">Manage Contacts (vendor / customer / guest / everyone)</a></li>
</ul>
@endsection