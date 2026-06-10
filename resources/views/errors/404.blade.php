@extends('errors::minimal')

@section('title', __('Página no encontrada'))
@section('code', '404')
@section('message', __('Error: La página que buscas no existe o fue movida.'))
@section('theme', 'error-404')
@section('image', asset('images/errors/404-ufo.png'))
