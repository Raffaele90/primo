@extends('master')


@section('title', 'Insert evento')

@section('sidebar')
    @parent


@endsection

@section('content')


    {{ csrf_field() }}
    @if(Session::has('success'))
        <div class="alert alert-success">
            <ul>

                <li> Evento Aggiornato</li>

            </ul>
        </div>
    @endif

    <div class="modal-content">
        <div class="row">

            <div class="col-xs-12 col-md-12">
                <div id="form_success">
                </div>
                <div class="panel panel-success scroll_table" style="">
                    <div class="modal-header">

                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <h3 class="panel-title">Eventi </h3>
                                </div>
                                <div class="col-xs-6 col-md-6">

                                    <input type="text" class="form-control" placeholder="Search"
                                           id="id_search_evento">
                                </div>
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
                                <tbody id="corpo_lista_eventi">
                                @foreach($data['eventi'] as $evento)

                                    <a href="#id_form_evento">
                                        <tr id="tr_evento_{{$evento->id}}"

                                            class="select_row_genitori">
                                            <td>{{$evento->id}}</td>
                                            <td>{{$evento->denominazione_evento}}</td>
                                            <td>{{$evento->tipo_evento}}</td>
                                            <td>{{$evento->descrizione_evento}}</td>
                                            <td>
                                                <button type="button" class="btn btn-default"
                                                        id="evento_{{$evento->id}}"
                                                        onclick="open_form_evento(this),show_hide_module_with_scroll('id_scheda_personaggio','vuota','id_scheda_personaggio')"
                                                        data-href="id_form_evento/">
                                                    <span class="glyphicon glyphicon-cog"
                                                          aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-default"
                                                        evento="{{$evento->denominazione_evento}}"
                                                        toRemove="{{$evento->id}}"
                                                        onclick="remove_evento(this)" aria-label="Left Align">
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
    <div id="id_scheda_personaggio" style="display: none">

        <form method="POST" id="id_form_evento" action="update_evento">
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

        <!-- Large modal -->
            <input type="text" name="id" class="input_hidden" id="id_evento">
            <p></p>
            @include('modal_evento')
            <div id="nuovo_personaggio" style="display: none">
                @include('personaggio')
            </div>
        </form>

    </div>
    </div>


@endsection