@extends('insert_personaggio')


@section('title', 'Modifica Personaggio')

@section('sidebar')
    @parent


@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-success" style=""
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
                                <tbody id="lista_maschera_edit_eventi">
                                @foreach($data['personaggi'] as $personaggio)
                                    <tr id="personaggio_{{$personaggio->id}}" onclick="open_form_personaggio(this)"
                                        class="select_row_genitori">
                                        <td>{{$personaggio->id}}</td>
                                        <td>{{$personaggio->cognome}}</td>
                                        <td>{{$personaggio->nome}}</td>
                                        <td>{{$personaggio->dinastia}}</td>
                                    </tr>
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

    <div class="container">
        @yield('content_personaggio')
    </div>

    <div class="container">
        @include('personaggio')
    </div>

    <!-- Large modal -->
    <div id="novo_evento" style="display: none">
        @include('modal_evento')
    </div>

@endsection