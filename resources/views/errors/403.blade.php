@extends('errors::minimal')

@section('title', __('Acceso prohibido'))
@section('code', '403')
@section('message', __('Error: No tienes permisos para acceder a esta sección.'))
@section('theme', 'error-403')
@section('image', asset('images/errors/403-prohibido.png'))