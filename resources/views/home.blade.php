@extends('adminlte::page')

@section('title', 'home')

@section('content_header')
    <h1>Home</h1>
@stop

@section('content')
    <p>Yoshiro Pablo Armando Riaño Ishiwara</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop