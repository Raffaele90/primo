<form action="{{ Request::path()=='insert_personaggio' ? 'store' : 'update' }}" method="post" id="id_form_personaggio">

    <input id="idPersonaggio" class="input_hidden" name="id" value="">
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
    <div class="modal-content">

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="modal-header">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Nuovo Personaggio</h3>
                </div>
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
                                                type="text" class="form-control" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="label_idPadre"
                                                placeholder="Padre"
                                                name="label_padre">
                                        <input
                                                type="text" class="form-control input_hidden" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="idPadre"
                                                placeholder="ID Padre"
                                                name="padre">
                                        <label for="exampleInputEmail1">Madre</label>

                                        <input
                                                type="text" class="form-control" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="label_idMadre"
                                                placeholder="Madre"
                                                name="label_madre">
                                        <input
                                                type="text" class="form-control input_hidden" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="idMadre"
                                                placeholder="ID madre"
                                                name="madre">
                                        <label for="exampleInputEmail1">Coniuge1</label>

                                        <input
                                                type="text" class="form-control" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="label_idConiuge1"
                                                placeholder="Coniuge1"
                                                name="label_coniuge1">
                                        <input
                                                type="text" class="form-control input_hidden" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="idConiuge1"
                                                placeholder="ID coniuge1"
                                                name="coniuge1">
                                        <label for="exampleInputEmail1">Coniuge2</label>

                                        <input
                                                type="text" class="form-control" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="label_idConiuge2"
                                                placeholder="Coniuge2"
                                                name="label_coniuge2">
                                        <input
                                                type="text" class="form-control input_hidden" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="idConiuge2"
                                                placeholder="ID coniuge2"
                                                name="coniuge2">
                                        <label for="exampleInputEmail1">Coniuge3</label>

                                        <input
                                                type="text" class="form-control" data-toggle="modal"
                                                data-target="#modalDinastia" readonly id="label_idConiuge3"
                                                placeholder="Coniuge3"
                                                name="label_coniuge3">
                                        <input
                                                type="text" class="form-control input_hidden" data-toggle="modal"
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

                            @if(Request::path() == 'insert_personaggio')
                                <button type="submit"
                                        class="btn btn-default">Salva Personaggio
                                </button>
                                <button type="button" id="id_btn_collega_evento"
                                        onclick="show_hide_module('id_collega_eventi','vuota')" class="btn btn-primary">
                                    Collega Evento

                                </button>
                            @elseif (Request::path() == 'edit_personaggio')
                                <button type="submit"
                                        class="btn btn-default">Aggiorna Personaggio
                                </button>
                                <button type="button" id="id_btn_collega_evento"
                                        onclick="show_hide_module('id_collega_eventi','vuota'),goToByScroll('corpo_lista_eventi')"
                                        class="btn btn-primary">
                                    Visualizza Eventi

                                </button>
                            @elseif (Request::path() == 'insert_evento')
                                <button type="button" onclick="insert_personaggio()"
                                        class="btn btn-default">Salva Personaggio
                                </button>
                                <button type="button" id="id_btn_collega_evento"
                                        onclick="show_hide_module('id_collega_eventi','vuota')"
                                        class="btn btn-primary">
                                    Collega Evento

                                </button>
                            @endif


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="row {{ Request::path()=='insert_personaggio' ? 'input_hidden' : '' }}" id="id_collega_eventi">


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
                            <th>Nome evento</th>
                            <th>Descrizione</th>
                        </tr>
                        </thead>
                        <tbody id="corpo_lista_eventi">

                        @if(Request::path() == 'insert_personaggio' or Request::path() == 'insert_evento')
                            @foreach($data['eventi'] as $evento)
                                <tr id="evento_{{$evento->id}}">

                                    <td><span class="replaceme"></span>{{$evento->id}}</td>
                                    <td>{{$evento->denominazione_evento}}</td>
                                    <td>{{$evento->descrizione_evento}}</td>
                                    <td>
                                        <button type="button" id="s" class="sposta" value="ee"
                                                onclick="sposta_row(this)"> sposta
                                        </button>
                                    </td>


                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>

            </div>
            @if(Request::path() == 'insert_personaggio')

                <button type="button" class="btn btn-primary dropdown-toggle"
                        onclick="show_hide_module('novo_evento','vuota'), goToByScroll('new_evento')">+ Add evento
                </button>
            @endif
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
                            <th>Nome evento</th>
                            <th>Descrizione</th>
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
                            <div class="col-xs-12 col-md-12">
                                <div class="list-group">

                                    <label> Dinastia </label>
                                    <select id="id_dinastia" name="dinastia">
                                        @foreach($data['dinastia'] as $dinastia)
                                            <option> {{$dinastia['dinastia']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p></p>
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

                                            <a id="personaggio_{{$personaggio->id}}" name="pippo"
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
                            <div class="col-xs-4 col-md-4">
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
                            <div class="col-xs-4 col-md-4">
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

                        <ul class="list-group">
                            <li id="id_load_dinastia" class="list-group-item">
                                Carica Dinastia
                            </li>
                        </ul>

                        <meta name="_token" content="{!! csrf_token() !!}"/>


                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">

        </div>

    </form>
        </div>
</form>

<!-- Large modal Per selezione luogo-->
@include('modal_luoghi')



<!-- Large modal Per selezione DINASTIA-->

<div id="form_errors"></div>
<div id="alert_insert_evento" class="alert alert-success alert_raf fade in" role="alert" style="display: none;">
    Evento
    inserito
</div>





