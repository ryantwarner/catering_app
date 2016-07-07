@extends('layouts.default')

@section('content')
Welcome to catering app. Edit an order <a href="{{ url("/orders/1/edit") }}">here</a>.
@endsection