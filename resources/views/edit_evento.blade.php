@extends('master')


@section('title', 'Insert evento')

@section('sidebar')
    @parent


@endsection

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-success" style="">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <h3 class="panel-title">Eventi </h3>
                            </div>
                            <div class="col-xs-6 col-md-6">

                                <input type="text" class="form-control" placeholder="Search"
                                       id="id_search_eventi">
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">


                        <div class="panel panel-default"
                             style="">
                            <div class="panel-heading"> Table
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Tipo evento</th>
                                    <th>Descrizione</th>
                                </tr>
                                </thead>
                                <tbody id="lista_personaggi">
                                @foreach($data['eventi'] as $evento)

                                    <a href="#id_form_evento">
                                        <tr id="evento_{{$evento->id}}" onclick="open_form_evento(this)" data-href="id_form_evento/"
                                            class="select_row_genitori clickable-row">
                                            <td>{{$evento->id}}</td>
                                            <td>{{$evento->denominazione_evento}}</td>
                                            <td>{{$evento->tipo_evento}}</td>
                                            <td>{{$evento->descrizione_evento}}</td>
                                        </tr>
                                    </a>
                                @endforeach
                                </tbody>
                            </table>
                            <p></p>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>



    <!-- Large modal -->
    <div id="novo_evento" style="display: block">
        @include('modal_evento')
    </div>

@endsection