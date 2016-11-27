@extends('master')


@section('title', 'Insert evento')

@section('sidebar')
    @parent


@endsection

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
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

                    <div id="alert_insert_evento" class="alert alert-success alert_raf fade in" role="alert"
                         style="display: none;">
                        Evento
                        inserito
                    </div>
                    <div id="nuovo_evento">
                        @include('modal_evento')
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">

                <div id="nuovo_personaggio" style="display: none">
                    @include('personaggio')
                </div>


                <div id="nuovo_luogo" style="display: none">
                    @include('modal_luoghi')
                </div>
            </div>
        </div>

    </div>
@endsection