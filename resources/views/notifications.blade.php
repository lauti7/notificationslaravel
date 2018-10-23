@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Notificaciones</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>No leidas</h2>
                <ul class="list-group">
                    @foreach ($unreadNotifications as $unreadNotification)
                        <li class="list-group-item">
                            <a href="{{ $unreadNotification->data['link'] }}">{{ $unreadNotification->data['text'] }}</a>
                            <form class="pull-right" action="{{route('notifications.read', $unreadNotification->id)}}" method="post">
                                {{ method_field('PATCH')}}
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-xs">
                                    X
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-6">
                <h2>Leidas</h2>
                <ul class="list-group">
                    @foreach ($readNotifications as $readNotification)
                        <li class="list-group-item">
                            <a href="{{ $readNotification->data['link'] }}">{{ $readNotification->data['text'] }}</a>
                            <form class="pull-right" action="{{route('notifications.delete', $readNotification->id)}}" method="post">
                                {{ method_field('DELETE')}}
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-xs">
                                    Eliminar
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
