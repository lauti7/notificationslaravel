@extends('layouts.app')
@section('content')
    <h1>Mensaje</h1>
    <p>{{ $message->body }}</p>
    <small>{{ $message->user->name }}</small>
@endsection
