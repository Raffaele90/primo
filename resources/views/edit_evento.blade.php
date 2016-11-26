@extends('master')


@section('title', 'Insert evento')

@section('sidebar')
    @parent


@endsection

@section('content')


    {{ csrf_field() }}
    <span>Ciao</span>
    <div class="">
        <div class="row">
            <div class="col-xs-12 col-md-12">
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
                                        <tr id="evento_{{$evento->id}}" onclick="open_form_evento(this),show_hide_module_with_scroll('id_scheda_personaggio','vuota','id_scheda_personaggio')"
                                            class="select_row_genitori" >
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
    </div>
    <div id="id_scheda_personaggio" style="display: none">

        <form method="POST" action="update_evento">
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
            <input type="text" name="id" id="id_evento">
            @include('modal_evento')

        </form>

    </div>

@endsection