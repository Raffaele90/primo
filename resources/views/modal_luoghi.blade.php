<form id="form_luogo">

    <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalLuoghi" value_call="" role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <h4 class="modal-title">Scelta Luogo per</h4>

                            </div>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" id="id_search_luogo">

                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success alert_raf fade in" role="alert" style="display: none;">Luogo
                        inserito
                    </div>
                </div>


                <div class="modal-body">

                    <div class="panel panel-default scroll_table" style="display: block;">
                        <div class="panel-heading">Luoghi
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Denominazione Luogo</th>
                                <th>Localizzazione Luogo</th>
                                <th>Tipo luogo</th>

                            </tr>
                            </thead>
                            <tbody id="id_table_luoghi">
                            @foreach($data['luoghi'] as $luogo)

                                <tr class="select_row_genitori" onclick="click_row_luogo()" id="luogo_{{$luogo->id}}">
                                    <td style="visibility: hidden">{{$luogo->idLuogo}}</td>
                                    <td>{{$luogo->denominazione_luogo}}</td>
                                    <td>{{$luogo->localizzazione_luogo}}</td>
                                    <td>{{$luogo->tipo_luogo}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <p></p>

                    </div>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseOne"
                                       aria-expanded="false" aria-controls="collapseOne">
                                        Inserisci nuovo luogo
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="panel-body">


                                        <div class="row">
                                            <div id="form_errors_luogo"></div>
                                            <div id="form_success_luogo"></div>


                                            <div class="col-xs-5 col-md-5">

                                                <div class="form-group">
                                                    <label for="email">Denominazione luogo</label>
                                                    <input type="text" class="form-control" name="denominazione_luogo"
                                                           id="denominazione_luogo">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-4">

                                                <div class="form-group">
                                                    <label for="pwd">Anno costruzione</label>
                                                    <input type="text" class="form-control" name="anno_costruzione"
                                                           id="anno_costruzione">
                                                </div>
                                            </div>
                                            <div class="col-xs-1 col-md-1">
                                                <div class="form-group">
                                                    <div class="radio">

                                                        <label>
                                                            <input name="ac_dc" type="radio" value="ac">
                                                            <span>a.C.</span>
                                                            <input name="ac_dc" type="radio" value="dc">
                                                            <span>d.C.</span>
                                                        </label>
                                                    </div>
                                                </div><!-- /input-group -->
                                            </div>
                                            <!--<div class="col-xs-3 col-md-3">

                                                <div class="form-group">
                                                    <label for="pwd">Dinastia appartenenza</label>
                                                    <select type="text" class="form-control" name="dinastia_appartenenza"
                                                            id="id_dinastia_appartenenza">

                                                    </select>
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-5 col-md-5">
                                                <div class="form-group">
                                                    <label for="pwd"> Regione</label>
                                                    <select type="text" class="form-control" name="regione"
                                                            id="id_regione">
                                                        <option selected disabled> - Regioni - </option>

                                                    @foreach($data['regioni'] as $regione)

                                                            <option>{{$regione->nome}}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-xs-2 col-md-2">
                                                <div class="form-group">
                                                    <label for="pwd"> Provincia</label>
                                                    <select type="text" class="form-control" name="provincia"
                                                            id="id_provincia"></select>
                                                </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5">
                                                <div class="form-group">
                                                    <label for="pwd"> Comune</label>
                                                    <select type="text" class="form-control" name="comune"
                                                            id="id_comune"></select>
                                                </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5">
                                                <div class="form-group">
                                                    <label for="pwd"> Indirizzo</label>
                                                    <input type="text" class="form-control" name="indirizzo"
                                                           id="id_indirizzo">
                                                </div>
                                            </div>
                                            <div class="col-xs-2 col-md-2">
                                                <div class="form-group">
                                                    <label for="pwd"> CAP</label>
                                                    <input type="text" class="form-control" name="cap"
                                                           id="id_cap">
                                                </div>
                                            </div>
                                            <div class="col-xs-5 col-md-5">
                                                <div class="form-group">
                                                    <label for="pwd"> Localizzazione</label>
                                                    <input type="text" class="form-control" name="localizzazione_luogo"
                                                           id="localizzazione_luogo">
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-md-3">

                                                <div class="form-group">
                                                    <label for="sel1">Tipo luogo</label>
                                                    <select class="form-control" name="tipo_luogo" id="id_tipo_luoghi">
                                                        <option> Scegli tipo luogo</option>
                                                        @foreach($data['tipo_luoghi'] as $tipo)
                                                            <option>{{$tipo->tipo_luogo}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-md-3">

                                                <div class="form-group">
                                                    <label for="sel1">Nuovo Tipo luogo</label>

                                                    <input type="text" class="form-control" name="nuovo_tipo_luogo"
                                                           id="tipo_luogo">
                                                    <button type="button" id=""
                                                            onclick="add_tipo('tipo_luogo','id_tipo_luoghi')"> +
                                                    </button>
                                                </div>

                                            </div>


                                            <div class="col-xs-3 col-md-3" id="col_sub_luogo1">

                                                <div class="form-group">
                                                    <label for="sel1">Sub luogo:</label>
                                                    <select class="form-control" name="tipo_sub_luogo"
                                                            id="id_sub_luoghi">
                                                        <option> Scegli sub tipo luogo</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-md-3" id="col_sub_luogo2">

                                                <div class="form-group">
                                                    <label for="sel1">Nuovo Tipo sub luogo</label>

                                                    <input type="text" class="form-control" name="nuovo_sub_tipo_luogo"
                                                           id="nuovo_sub_tipo_luogo">
                                                    <button type="button" id=""
                                                            onclick="add_tipo('nuovo_sub_tipo_luogo','id_sub_luoghi')">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Descrizione luogo</label>
                                                    <textarea rows="10" type="text" class="form-control"
                                                              name="descrizione_monumento"
                                                              id="descrizione_monumento"></textarea>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Ulteriore caratterizzazione </label>
                                                    <textarea rows="10" type="text" class="form-control"
                                                              name="ulteriore_caratterizzazione"
                                                              id="ulteriore_caratterizzazione"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <!--<div class="row">

                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Attualmente ospita </label>
                                                    <textarea rows="10" type="text" class="form-control"
                                                              id="id_attuale_destinazione"
                                                              name="attuale_destinazione"></textarea>
                                                </div>
                                            </div>

                                        </div>-->

                                    </div>
                                    <button type="button" id="idSaveLuogo" class="btn btn-default">Salva luogo
                                    </button>
                                    <meta name="_token" content="{!! csrf_token() !!}"/>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
        </script>
    </div>
</form>

