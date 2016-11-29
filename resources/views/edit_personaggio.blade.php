@extends('insert_personaggio')


@section('title', 'Modifica Personaggio')

@section('sidebar')
    @parent


@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="form_success">
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <ul>

                            <li> Personaggio Aggiornato</li>

                        </ul>
                    </div>
                @endif
            </div>
            <div class="panel panel-success scroll_table" style=""
                 id="id_dinastia">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <h3 class="panel-title">Personaggi </h3>
                        </div>
                        <div class="col-xs-6 col-md-6">

                            <input type="text" class="form-control" placeholder="Search"
                                   id="id_search_personaggio">
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
                                <th>Cognome</th>
                                <th>nome</th>
                                <th>Dinastia</th>
                            </tr>
                            </thead>
                            <tbody id="lista_personaggi">
                            @foreach($data['personaggi'] as $personaggio)

                                <a href="#id_form_personaggio">
                                    <tr  id="tr_personaggio_{{$personaggio->id}}"
                                            class="select_row_genitori clickable-row">
                                        <td>{{$personaggio->id}}</td>
                                        <td>{{$personaggio->cognome}}</td>
                                        <td>{{$personaggio->nome}}</td>
                                        <td>{{$personaggio->dinastia}}</td>
                                        <td>
                                            <button type="button" class="btn btn-default"
                                                    id="personaggio_{{$personaggio->id}}"
                                                    onclick="open_form_personaggio(this),show_hide_module('id_form_personaggi','vuota'),goToByScroll('id_form_personaggi')"
                                                    data-href="id_form_personaggio/">
                                                    <span class="glyphicon glyphicon-cog"
                                                          aria-hidden="true"></span>
                                            </button>
                                            <button type="button" class="btn btn-default"
                                                    personaggio="{{$personaggio->cognome.' '.$personaggio->nome}}"
                                                    toRemove="{{$personaggio->id}}"
                                                    onclick="remove_personaggio(this)" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-trash"
                                                          aria-hidden="true"></span>
                                            </button>

                                        </td>
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



    <div class="container" id="id_form_personaggi" style="display: none;">
        @include('personaggio')
    </div>

    <!-- Large modal -->
    <div id="novo_evento" style="display: none">
        @include('modal_evento')
    </div>


    <!-- Small modal Delete Personaggio -->

    <div class="modal fade" id="modalRemovePersonaggio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Elimina Personaggio</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" toReomve="" onclick="remove_personaggio(this)" class="btn btn-primary">
                        Elimina
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection