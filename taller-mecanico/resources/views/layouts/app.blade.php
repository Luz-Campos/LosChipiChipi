@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>{{ __('Dashboard') }}</h1>
@stop

@section('content')
@yield('content')
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
