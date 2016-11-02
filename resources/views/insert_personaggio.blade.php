@extends('master')


@section('title', 'Page Title')

@section('sidebar')
    @parent


@endsection

@section('content')

    <div class="container">
        @yield('content_personaggio')
    </div>

    <!-- Large modal -->
    <div id="novo_evento" style="display: none">
        @include('modal_evento')
    </div>

@endsection