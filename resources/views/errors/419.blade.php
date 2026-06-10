@extends('errors::minimal')

@section('title', __('Sesión expirada'))
@section('code', '419')
@section('message', __('Error: Tu sesión expiró por seguridad. Recarga la página e intenta nuevamente.'))
@section('theme', 'error-419')
@section('image', asset('images/errors/419-sesion-expirada.png'))