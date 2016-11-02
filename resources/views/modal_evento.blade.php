<div class="row">

    <div class="col-xs-12 col-md-12">
        <div class="panel panel-success"
             id="id_eventi">
            <div class="panel-heading">
                <h3 class="panel-title">Nuovo Evento</h3>
            </div>
            <div class="panel-body" id="new_evento">
                <div class="row">
                    <div class="col-xs-6 col-md-6"
                         id="id_form_eventi">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Denominazione Evento</label>
                            <input type="text" class="form-control"
                                   id="id_denominazione_evento" placeholder="Denominazione evento">

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <label for="exampleInputEmail1">Tipo Evento</label>
                                    <select class="form-control" id="idTipoEvento">
                                        <option value="" disabled selected>Seleziona tipo evento</option>

                                        @foreach($data['tipo_eventi'] as $tipo)
                                            <option> {{$tipo->tipo_evento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-6 col-md-6">

                                    <label for="exampleInputEmail1">Add</label>

                                    <input class="form-control" type="text" id="id_nuovo_tipo_evento"
                                           placeholder="Nuovo tipo evento"/></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Denominazione luogo</label>
                            <input type="text" class="form-control" data-toggle="modal" data-target="#modalLuoghi"
                                   id="label_id_denominazione_luogo" placeholder="Denominazione"
                                   readonly onclick="set_modal_value('modalLuoghi',this.id)">
                            <input type="text" class="form-control input_hidden"
                                   readonly id="id_denominazione_luogo"
                                   placeholder="Denominazione ID">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Anno di Costruzione</label>
                            <input class="form-control" type="number" min="0" step="1" id="id_anno_costruzione"
                                   placeholder="Anno costruzione"/>

                        </div>
                        <div class="form-group">
                            <label for="comment">Descrizione</label>
                            <textarea class="form-control" rows="5"
                                      placeholder="Descrizione" id="idDescrizioneEvento"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-6">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrizione
                                monumento</label> <input type="text" class="form-control"
                                                         id="id_descrizione_monumento"
                                                         placeholder="Descrizione">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <label for="exampleInputEmail1"> Tipo Sub Evento</label>
                                    <select class="form-control" id="idTipoSubEvento">
                                        <option value="" disabled selected>Seleziona tipo sub evento</option>
                                        <option> Tipo 2</option>

                                    </select>

                                </div>
                                <div class="col-xs-6 col-md-6">

                                    <label for="exampleInputEmail1">Add</label>

                                    <input class="form-control" type="text" id="id_nuovo_sub_tipo_evento"
                                           placeholder="Nuovo sub evento"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ulteriore
                                caratterizzazione</label> <textarea type="text" class="form-control"
                                                                    id="id_ulteriore_caratterizzazione" rows="5"
                                                                    placeholder="Caratterizzazione"></textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                Stessa posizione - Si
                                <input type="radio"
                                       onclick="show_hide_module('vuota','id_form_nuovo_evento')"
                                       name="posizione" checked="true">
                                No
                                <input type="radio"
                                       onclick="show_hide_module('id_form_nuovo_evento','vuota')"
                                       name="posizione">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12" style="display: none" id="id_form_nuovo_evento">
                    <div class="col-xs-6 col-md-6">

                        <div class="list-group">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nuova Denominazione luogo</label>
                                <input type="text" class="form-control"
                                       readonly id="label_id_nuova_denominazione_luogo" data-toggle="modal"
                                       data-target="#modalLuoghi"
                                       onclick="set_modal_value('modalLuoghi',this.id)" placeholder="Denominazione">
                                <input type="text" class="form-control input_hidden"
                                       readonly id="id_nuova_denominazione_luogo"
                                       placeholder="Denominazione ID">
                            </div>
                            <!--<div class="form-group">
                                <label for="exampleInputEmail1">Nuovo Anno di Costruzione</label>
                                <input type="text" class="form-control"
                                       id="id_nuovo_anno_costruzione" placeholder="Anno costruzione">
                            </div>-->



                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrizione movimento opera ?
                            </label> <textarea type="text" class="form-control"
                                               id="id_descrizione_movimento_opera"
                                               placeholder="Descrizione" rows="5fti"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" onclick="insert_Evento()"
                    class="btn btn-default">Salva Evento
            </button>
        </div>

    </div>
</div>

