

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
                    <div class="alert alert-success alert_raf fade in" role="alert" style="display: none;">Luogo
                        inserito
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

</form>