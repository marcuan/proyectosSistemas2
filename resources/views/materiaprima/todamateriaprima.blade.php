@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>Materia Prima Disponible</p>
    @foreach($materiaprima as $dato)
        <p>{{ $dato->nombre }}</p>
    @endforeach
@endsection