@extends('master')


@section('title', 'Insert evento')

@section('sidebar')
@parent


@endsection

@section('content')



<!-- Large modal -->
<div id="novo_evento" style="display: none">
    @include('modal_evento')
</div>

@endsection