@extends('master')


@section('title', 'Insert evento')

@section('sidebar')
    @parent


@endsection

@section('content')




    <form method="POST" action="insert_evento">
        {{ csrf_field() }}
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="form_errors"></div>

        <div id="alert_insert_evento" class="alert alert-success alert_raf fade in" role="alert" style="display: none;">
            Evento
            inserito
        </div>
        <div id="nuovo_evento">
            @include('modal_evento')
        </div>
        <div id="nuovo_personaggio" style="display: block">
            @include('personaggio')
        </div>


        <div id="nuovo_luogo" style="display: none">
            @include('modal_luoghi')
        </div>

    </form>
@endsection