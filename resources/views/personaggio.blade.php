@extends('insert_personaggio')

@section('title', 'Page Title')

@section('sidebar')
    @parent


@endsection

@section('content_personaggio')


    <form action="store" method="post">


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

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">NUOVO PERSONAGGIO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input
                                            type="text" class="form-control" name="nome" id="idNome"
                                            placeholder="Nome">

                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Cognome</label> <input
                                            type="text" class="form-control" name="cognome" id="idCognome"
                                            placeholder="Cognome">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Luogo di nascita</label> <input
                                            type="text" class="form-control" data-target="#modalLuoghi"
                                            data-toggle="modal"
                                            name="label_luogo_nascita" onclick="set_modal_value('modalLuoghi',this.id)"
                                            id="label_idLuogoNascita"
                                            placeholder="Luogo">
                                    <input
                                            type="text" class="form-control input_hidden" data-target="#modalLuoghi"
                                            data-toggle="modal"
                                            name="luogo_nascita" id="idLuogoNascita"
                                            placeholder="id luogo">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data nascita</label> <input
                                            type="date" class="form-control" name="data_nascita" id="idNascita"
                                            placeholder="Data di nascita">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Luogo di morte</label> <input
                                            type="text" class="form-control" data-target="#modalLuoghi"
                                            data-toggle="modal"
                                            name="label_luogo_morte" id="label_idLuogoMorte"
                                            onclick="set_modal_value('modalLuoghi',this.id)"
                                            placeholder="Luogo">
                                    <input
                                            type="text" class="form-control input_hidden" data-target="#modalLuoghi"
                                            data-toggle="modal"
                                            name="luogo_morte" id="idLuogoMorte"
                                            placeholder="id luogo">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data morte</label> <input
                                            type="date" class="form-control" name="data_morte" id="idMorte"
                                            value="2012/11/25" placeholder="Data di morte">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-10 col-md-10">

                                            <label for="exampleInputEmail1">padre</label>

                                            <input
                                                    type="text" class="form-control input_hidden" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="label_idPadre"
                                                    placeholder="Padre"
                                                    name="label_padre">
                                            <input
                                                    type="text" class="form-control" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="idPadre"
                                                    placeholder="ID Padre"
                                                    name="padre">
                                            <label for="exampleInputEmail1">Madre</label>

                                            <input
                                                    type="text" class="form-control input_hidden" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="label_idPadre"
                                                    placeholder="Madre"
                                                    name="label_madre">
                                            <input
                                                    type="text" class="form-control" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="idMadre"
                                                    placeholder="ID madre"
                                                    name="madre">
                                            <label for="exampleInputEmail1">Coniuge1</label>

                                            <input
                                                    type="text" class="form-control input_hidden" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="label_idConiuge1"
                                                    placeholder="Coniuge1"
                                                    name="label_coniuge1">
                                            <input
                                                    type="text" class="form-control" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="idConiuge1"
                                                    placeholder="ID coniuge1"
                                                    name="coniuge1">
                                            <label for="exampleInputEmail1">Coniuge2</label>

                                            <input
                                                    type="text" class="form-control input_hidden" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="label_idConiuge2"
                                                    placeholder="Coniuge2"
                                                    name="label_coniuge2">
                                            <input
                                                    type="text" class="form-control" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="idConiuge2"
                                                    placeholder="ID coniuge2"
                                                    name="coniuge2">
                                            <label for="exampleInputEmail1">Coniuge3</label>

                                            <input
                                                    type="text" class="form-control input_hidden" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="label_idConiuge3"
                                                    placeholder="Coniuge3"
                                                    name="label_coniuge3">
                                            <input
                                                    type="text" class="form-control" data-toggle="modal"
                                                    data-target="#modalDinastia" readonly id="idConiuge3"
                                                    placeholder="ID coniuge3"
                                                    name="coniuge3">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <label for="exampleInputEmail1">Dinastia</label>

                                <div id="sample">
                                    <div id="myDiagramDiv"
                                         style="background-color: #696969; border: solid 1px black; height: 50%">

                                    </div>
                                    <div>
                                        <div id="myInspector">


                                        </div>
                                    </div>

                                    <div>
                                        <div>

                                    <textarea id="mySavedModel"
                                              style=" display:none; width:100%;height:250px">
                                    </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-md-12">

                                <div class="form-group">
                                    <label for="comment">Descrizione</label>
                                    <textarea class="form-control" rows="5"
                                              placeholder="Descrizione" name="descrizione"
                                              id="idDescrizione"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo personaggio</label> <input
                                            type="text" class="form-control" name="tipo" id="idTipo"
                                            placeholder="Tipo">
                                </div>

                                <!--<div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">-->

                                <button type="submit"
                                        class="btn btn-default">Salva Personaggio
                                </button>
                                <button type="button" id="id_btn_collega_evento" onclick="show_hide_module('id_collega_eventi','vuota')" class="btn btn-primary">Collega Evento
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </form>

    <!-- Large modal Per selezione luogo-->
    @include('modal_luoghi')



    <!-- Large modal Per selezione DINASTIA-->


    <form id="form_dinastia">
        <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalDinastia" role="dialog"
             aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <h4 class="modal-title">Scelta Dinastia</h4>

                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search"
                                           id="id_search_personaggio">

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="list-group">

                                    <a href="#" class="list-group-item active">
                                        Padre
                                    </a>

                                    <div class="list-group-item panel_dinastia" id="padre_casella"
                                         ondrop="drop(event)"
                                         ondragover="allowDrop(event)">
                                        Drop here

                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="panel panel-default">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            Madre
                                        </a>
                                        <div class="list-group-item panel_dinastia" id="madre_casella"
                                             ondrop="drop(event)"
                                             ondragover="allowDrop(event)">
                                            Drop here

                                        </div>


                                    </div>
                                </div>

                            </div>

                            <p></p>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="panel panel-default">
                                    <div class="list-group" ondrop="drop(event)" ondragover="allowDrop(event)">
                                        <a href="#" class="list-group-item active">
                                            Personaggi
                                        </a>
                                        @foreach($data['personaggi'] as $personaggio)

                                            <a id="personaggio_{{$personaggio->idPersonaggio}}" name="pippo"
                                               class="list-group-item"
                                               draggable="true"
                                               ondragstart="drag(event)">{{$personaggio->cognome}} {{$personaggio->nome}}  </a>
                                            @endforeach
                                            </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            Coniuge 1
                                        </a>
                                        <div class="list-group-item panel_dinastia" id="coniuge1_casella"
                                             ondrop="drop(event)"
                                             ondragover="allowDrop(event)">
                                            Drop here

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            Coniuge 2
                                        </a>
                                        <div class="list-group-item panel_dinastia" id="coniuge2_casella"
                                             ondrop="drop(event)"
                                             ondragover="allowDrop(event)">
                                            Drop here

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            Coniuge 3
                                        </a>
                                        <div class="list-group-item panel_dinastia" id="coniuge3_casella"
                                             ondrop="drop(event)"
                                             ondragover="allowDrop(event)">
                                            Drop here

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <ul class="list-group">
                            <li id="id_load_dinastia" class="list-group-item">
                                Salva Dinastia
                            </li>
                        </ul>

                        <meta name="_token" content="{!! csrf_token() !!}"/>


                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">

        </div>
        <div class="row" id="id_collega_eventi" style="display:none;">


            <div class="col-xs-6 col-md-6">
                <div class="panel panel-info scroll_table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <h3 class="panel-title"> Collega Eventi </h3>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <input type="text" class="form-control" placeholder="Search" id="id_search_evento">

                            </div>
                        </div>

                    </div>
                    <div class="panel-body">


                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo evento</th>
                                <th>Descrizione</th>
                                <th>Stessa posizione</th>
                            </tr>
                            </thead>
                            <tbody id="corpo_lista_eventi">

                            @foreach($data['eventi'] as $evento)
                                <tr id="evento_{{$evento->id}}">

                                    <td><span class="replaceme"></span>{{$evento->id}}</td>
                                    <td>{{$evento->tipo_evento}}</td>
                                    <td>{{$evento->tipo_evento}}</td>
                                    <td>{{$evento->tipo_evento}}</td>
                                    <td>
                                        <button type="button" id="s" class="sposta" value="ee"
                                                onclick="sposta_row(this)"> sposta
                                        </button>
                                    </td>


                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <button type="button" class="btn btn-primary dropdown-toggle"
                        onclick="show_hide_module('novo_evento','vuota')"><a style="color:white;" href="#new_evento">
                        Nuovo
                        Evento</a></button>
            </div>

            <div class="col-xs-6 col-md-6">
                <div class="panel panel-info scroll_table">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Eventi Personaggio </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo evento</th>
                                <th>Descrizione</th>
                                <th>Stessa posizione</th>
                            </tr>
                            </thead>
                            <tbody id="corpo_lista_eventi_personaggio" ondrop="drop(event)"
                                   ondragover="allowDrop(event)">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="form_errors"></div>
    <div id="alert_insert_evento" class="alert alert-success alert_raf fade in" role="alert" style="display: none;">
        Evento
        inserito
    </div>




@endsection

