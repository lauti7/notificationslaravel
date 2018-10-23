@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar mensaje</div>
                <form class="" action="{{ route('messages.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group">
                            <select  name="recipient_id" class="form-control" >
                                <option> Seleciona el usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                {!! $errors->first('recipient_id', "<span class=help-block>:message</span>") !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea  name="body" class="form-control" placeholder="Enviar mensaje.."></textarea>
                            {!! $errors->first('body', "<span class=help-block>:message</span>") !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width:100%; margin-top:15px;">Enviar mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
