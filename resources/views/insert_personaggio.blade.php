@extends('master')


@section('title', 'Insert personaggio')

@section('sidebar')
    @parent


@endsection

@section('content')

    <div class="container">
    @include('personaggio')

    <!-- Large modal -->
        <div id="novo_evento" style="display: none">
            @include('modal_evento')
        </div>
    </div>

@endsection