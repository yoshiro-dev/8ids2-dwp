@extends('errors::minimal')

@section('title', __('Error del servidor'))
@section('code', '500')
@section('message', __('Error: Ocurrió un problema inesperado. Estamos trabajando para solucionarlo.'))
@section('theme', 'error-500')
@section('image', asset('images/errors/500-windows-error-fix.png'))