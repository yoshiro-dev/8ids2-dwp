@extends('errors::minimal')

@section('title', __('No autorizado'))
@section('code', '401')
@section('message', __('Error: Debes iniciar sesión para acceder a esta página.'))
@section('theme', 'error-401')
@section('image', asset('images/errors/401-icono-usuario.png'))