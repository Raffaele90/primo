<div class="modal-content">

    <div class="row ">

        <div class="col-xs-12 col-md-12">
            <div class="panel panel-success"
                 id="id_eventi">
                <div class="panel-heading">
                    <h3 class="panel-title">Nuovo Evento</h3>
                </div>
                <div class="panel-body" id="new_evento">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <label for="exampleInputEmail1">Tipologia</label>
                                <select class="form-control" id="id_tipologia" name="tipologia">
                                    <option selected disabled>Seleziona tipologia</option>
                                    <option>EVENTO</option>
                                    <option>OPERA</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="id_nuova_tipologia" style="display:none;">
                        <p></p>
                        <div class="row">
                            <div class="col-xs-6 col-md-6"
                                 id="id_form_eventi">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Denominazione Evento</label>
                                    <input type="text" class="form-control"
                                           id="id_denominazione_evento" placeholder="Denominazione evento"
                                           name="denominazione_evento">

                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <label for="exampleInputEmail1">Tipo Evento</label>
                                            <select class="form-control" id="idTipoEvento" name="tipo_evento">
                                                <option disabled selected>Seleziona tipo evento</option>

                                                @foreach($data['tipo_eventi'] as $tipo)
                                                    <option> {{$tipo->tipo_evento}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-6 col-md-6">

                                            <label for="exampleInputEmail1">Add</label>

                                            <input class="form-control" type="text" id="id_nuovo_tipo_evento"
                                                   placeholder="Nuovo tipo evento"/>
                                            <button type="button" id=""
                                                    onclick="add_tipo('id_nuovo_tipo_evento','idTipoEvento')"> +
                                            </button>

                                        </div>


                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Denominazione luogo</label>
                                    <input type="text" class="form-control" data-toggle="modal"
                                           data-target="#modalLuoghi"
                                           id="label_id_denominazione_luogo_evento" placeholder="Denominazione"
                                           readonly onclick="set_modal_value('modalLuoghi',this.id)">
                                    <input type="text" class="form-control input_hidden"
                                           readonly id="id_denominazione_luogo_evento"
                                           placeholder="Denominazione ID" name="origine_luogo_id">
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-4 col-md-4">
                                        <label for="exampleInputEmail1">Giorno</label>
                                        <input class="form-control" type="number" min="1" max="31" step="1"
                                               id="id_data_giorno"
                                               placeholder="giorno" name="giorno"/>

                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <label for="exampleInputEmail1">Mese</label>
                                        <input class="form-control" type="number" min="0" max="12" step="1"
                                               id="id_data_mese"
                                               placeholder="mese" name="mese"/>

                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <label for="exampleInputEmail1">Anno</label>
                                        <input class="form-control" type="number" min="0" max="5000" step="1"
                                               id="id_data_anno"
                                               placeholder="anno" name="anno"/>

                                    </div>


                                </div>
                                <div class="form-group">
                                    <label for="comment">Descrizione</label>
                                    <textarea class="form-control" rows="5" name="descrizione_evento"
                                              placeholder="Descrizione" id="idDescrizioneEvento"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">

                                        <div class="form-group field_opera">
                                            <label for="exampleInputEmail1">Importanza</label>
                                            <select class="form-control" name="importanza_evento"
                                                    id="id_importanza_evento">
                                                <option selected></option>
                                                <option>Opera di maggiore rilevanza</option>
                                                <option>Opera di minore rilevanza</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">

                                        <div class="form-group field_opera">
                                            <label for="exampleInputEmail1">Stato</label>
                                            <select class="form-control" name="stato" id="id_stato">
                                                <option selected></option>
                                                <option>Pubblica</option>
                                                <option>Privata</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <label for="exampleInputEmail1"> Tipo Sub Evento</label>
                                            <select class="form-control" name="tipo_sub_evento" id="idTipoSubEvento">
                                                <option disabled selected>Seleziona tipo sub evento</option>

                                            </select>

                                        </div>
                                        <div class="col-xs-6 col-md-6">

                                            <label for="exampleInputEmail1">Add</label>

                                            <input class="form-control" type="text" id="id_nuovo_sub_tipo_evento"
                                                   placeholder="Nuovo sub evento"/>
                                            <button type="button" id="id_add_btn_tipo"
                                                    onclick="add_tipo('id_nuovo_sub_tipo_evento','idTipoSubEvento')"> +
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ulteriore
                                        caratterizzazione</label> <textarea type="text" class="form-control"
                                                                            name="ulteriore_caratterizzazione_evento"
                                                                            id="id_ulteriore_caratterizzazione_evento"
                                                                            rows="5"
                                                                            placeholder="Caratterizzazione"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="col-xs-12 col-md-12 field_opera" style="" id="id_form_nuovo_evento">
                            <div class="col-xs-6 col-md-6">

                                <div class="list-group ">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nuova Denominazione luogo</label>
                                        <input type="text" class="form-control"
                                               readonly id="label_id_nuova_denominazione_luogo_evento"
                                               data-toggle="modal"
                                               data-target="#modalLuoghi"
                                               onclick="set_modal_value('modalLuoghi',this.id)"
                                               placeholder="Denominazione">
                                        <input type="text" class="form-control input_hidden"
                                               readonly id="id_nuova_denominazione_luogo_evento"
                                               placeholder="Denominazione ID" name="nuovo_luogo_id_evento">
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="exampleInputEmail1">Nuovo Anno di Costruzione</label>
                                        <input type="text" class="form-control"
                                               id="id_nuovo_anno_costruzione" name="anno_evento" placeholder="Anno costruzione">
                                    </div>-->


                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrizione movimento opera
                                    </label> <textarea type="text" class="form-control"
                                                       id="id_descrizione_movimento_opera"
                                                       placeholder="Descrizione" rows="5fti"
                                                       name="descrizione_movimento_opera"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 field_opera">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                ASSOCIA DINASTIE
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="id_dinastie" style="display: block;">
                                            <textarea id="id_json_dinastie" name="dinastie_periodi"
                                                      class="form-control input_hidden">{ "dinastie" : []}</textarea>
                                                <div class="row" id="id_collega_dinastie">
                                                    <div class="col-xs-12 col-md-12">
                                                        <div class="panel panel-warning scroll_table">
                                                            <div class="panel-heading">
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-md-12">
                                                                        <h3 class="panel-title"> Collega Dinastie </h3>
                                                                    </div>
                                                                    <div class="col-xs-12 col-md-12">


                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="panel-body">


                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="input_hidden">#</th>
                                                                        <th>Nome</th>
                                                                        <th> Dal</th>
                                                                        <th> Periodo</th>
                                                                        <th> Al</th>
                                                                        <th> Periodo</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="lista_dinastie">


                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                        @if(Request::path() == 'insert_evento' or Request::path() == 'edit_evento')

                                                            <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-toggle="modal" data-target="#modal_dinastie">
                                                                + Add Dinastia
                                                            </button>
                                                            <p></p>
                                                        @endif

                                                    </div>


                                                    @if (Request::path() =='insert_personaggio' or Request::path() =='edit_personaggio')

                                                        <button type="button" onclick="insert_Evento() "
                                                                class="btn btn-danger btn_update_raf">Aggiungi Evento
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                               aria-controls="collapseTwo">
                                                ASSOCIA PERSONAGGI
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div id="id_personaggi" style="display: block;">
                                                <div class="row" id="id_collega_eventi">
                                                    <div class="col-xs-6 col-md-6">
                                                        <div class="panel panel-info scroll_table">
                                                            <div class="panel-heading">
                                                                <div class="row">
                                                                    <div class="col-xs-6 col-md-6">
                                                                        <h3 class="panel-title"> Collega
                                                                            Personaggi </h3>
                                                                    </div>
                                                                    <div class="col-xs-6 col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="Search"
                                                                               id="id_search_personaggio">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="panel-body">


                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="input_hidden">#</th>
                                                                        <th>Nome</th>
                                                                        <th>Cognome</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="lista_personaggi">

                                                                    @if(Request::path() == 'insert_evento' or Request::path() == 'insert_personaggio' or Request::path() == 'edit_personaggio')
                                                                        @foreach($data['personaggi'] as $personaggio)
                                                                            <tr id="personaggio_{{$personaggio->id}}">

                                                                                <td class="input_hidden"><span
                                                                                            class="replaceme"></span>{{$personaggio->id}}
                                                                                </td>

                                                                                <td>{{$personaggio->nome}}</td>
                                                                                <td>{{$personaggio->cognome}}</td>
                                                                                <td>
                                                                                    <button type="button" class="sposta"
                                                                                            value="ee"
                                                                                            onclick="sposta_row_personaggio(this)">
                                                                                        sposta
                                                                                    </button>
                                                                                </td>


                                                                            </tr>

                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                        </div>
                                                        @if(Request::path() == 'insert_evento' or Request::path() == 'edit_evento')

                                                            <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    onclick="show_hide_module('nuovo_personaggio','vuota'), goToByScroll('nuovo_personaggio')">
                                                                +
                                                                Add Personaggio
                                                            </button>
                                                        @endif

                                                    </div>

                                                    <div class="col-xs-6 col-md-6">
                                                        <div class="panel panel-info scroll_table">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"> Personaggi associati </h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="input_hidden">#</th>
                                                                        <th>Nome</th>
                                                                        <th>Cognome</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="lista_personaggi_associati"
                                                                           ondrop="drop(event)"
                                                                           ondragover="allowDrop(event)">


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @if (Request::path() =='insert_personaggio' or Request::path() =='edit_personaggio')

                            <button type="button" onclick="insert_Evento() "
                                    class="btn btn-danger btn_update_raf">Aggiungi Evento
                            </button>
                        @endif
                        @if (Request::path() =='edit_evento')
                            <p></p>
                            <button type="submit" class="btn btn-danger btn_update_raf">Aggiorna Evento</button>
                        @endif
                        @if (Request::path() =='insert_evento')

                            <button type="submit" class="btn btn-default">Salva Evento
                            </button>
                            <button type="button"
                                    onclick="show_hide_module('id_personaggi','vuota'),goToByScroll('id_personaggi')"
                                    class="btn btn-default">Collega Personaggi
                            </button>

                        @endif
                    </div>
                </div>


            </div>

        </div>


    </div>


</div>
</div>
<div id="form_errors_personaggio"></div>
<div id="alert_insert_personaggio" class="alert alert-success alert_raf fade in" role="alert" style="display: none;">
    Personaggio Inserito
</div>

<!-- Large modal Per selezione luogo-->
@include('modal_luoghi')

<div id="modal_dinastie" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Associa Dinastia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <label  for="exampleInputEmail1">Dinastie</label>
                        <select class="form-control" id="id_select_dinastia">
                            <option selected disabled>Seleziona tipologia</option>
                            @foreach($data['dinastie'] as $dinastia)
                                <option id_dinastia="{{$dinastia['id']}}">{{$dinastia['nome_dinastia']}}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <label for="exampleInputEmail1">Nuova Dinastia</label>
                        <input class="form-control" type="text" id="id_nuova_dinastia"
                               placeholder="Nuovo tipo evento"/>
                        <button type="button" id=""
                                onclick="add_tipo('id_nuova_dinastia','id_select_dinastia')"> +
                        </button>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-xs-3 col-md-3">

                        <label for="exampleInputEmail1">Dal</label>
                        <input id="id_input_dal" type="number" class="form-control">
                    </div>
                    <div class="col-xs-1 col-md-1">
                        <div class="radio">

                            <input class="form-control" name="ac_dc_periodo_din" type="radio" value="ac">
                            <span>a.C.</span>
                            <input class="form-control" name="ac_dc_periodo_din" type="radio" value="dc">
                            <span>d.C.</span>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-xs-3 col-md-3">

                        <label for="exampleInputEmail1">Al</label>
                        <input id="id_input_al" type="number" class="form-control">
                    </div>
                    <div class="col-xs-1 col-md-1">
                        <div class="radio">

                            <input class="form-control" name="ac_dc2_periodo_din" type="radio" value="ac">
                            <span>a.C.</span>
                            <input class="form-control" name="ac_dc2_periodo_din" type="radio" value="dc">
                            <span>d.C.</span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_row_dinastia()">Associa</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->