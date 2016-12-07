@extends('master')


@section('title', 'Luoghi')

@section('sidebar')
    @parent


@endsection

@section('content')




    <form id="form_luogo" method="post" action="update_luogo">

        {{ csrf_field() }}
        <div id="form_success">
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($success)&&$success==1)
            <div class="alert alert-success">Luogo Aggiornato</div>
        @endif
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group">
                            <h4 class="modal-title">Selezionare luogo</h4>

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

                            <tr class="select_row_genitori" id="tr_luogo_{{$luogo->id}}">
                                <td>{{$luogo->id}}</td>
                                <td>{{$luogo->denominazione_luogo}}</td>
                                <td>{{$luogo->localizzazione_luogo}}</td>
                                <td>{{$luogo->tipo_luogo}}</td>
                                <td>
                                    <button type="button" class="btn btn-default"
                                            id="luogo_{{$luogo->id}}"
                                            onclick="open_form_luogo(this),show_hide_module_with_scroll('id_form_luogo','vuota','id_form_luogo')"
                                            data-href="id_form_luogo/">
                                                    <span class="glyphicon glyphicon-cog"
                                                          aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default"
                                            luogo="{{$luogo->denominazione_luogo}}"
                                            toRemove="{{$luogo->id}}"
                                            onclick="remove_luogo(this)" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-trash"
                                                          aria-hidden="true"></span>
                                    </button>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <p></p>

                </div>

                <input id="id_luogo" name="id" class="input_hidden">
                <div id="id_form_luogo" style="display:none;">
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


                                    <div class="row">
                                        <div id="form_errors_luogo"></div>
                                        <div id="form_success_luogo"></div>


                                        <div class="col-xs-6 col-md-6">

                                            <div class="form-group">
                                                <label for="email">Denominazione luogo</label>
                                                <input type="text" class="form-control" name="denominazione_luogo"
                                                       id="denominazione_luogo">
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-md-2">

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
                                        <div class="col-xs-3 col-md-3">

                                            <div class="form-group">
                                                <label for="pwd">Dinastia appartenenza</label>
                                                <select type="text" class="form-control" name="dinastia_appartenenza"
                                                        id="id_dinastia_appartenenza">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label for="email">Descrizione monumento</label>
                                                <textarea rows="10" type="text" class="form-control"
                                                          name="descrizione_monumento"
                                                          id="descrizione_monumento"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12">
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
                                                        onclick="add_tipo('nuovo_sub_tipo_luogo','id_sub_luoghi')"> +
                                                </button>
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
                                    <div class="row">

                                        <div class="col-xs-12 col-md-12">
                                            <div class="form-group">
                                                <label for="email">Attualmente ospita </label>
                                                <textarea rows="10" type="text" class="form-control"
                                                          id="id_attuale_destinazione" name="attuale_destinazione"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <meta name="_token" content="{!! csrf_token() !!}"/>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div id="id_personaggi">
                            <div class="row" id="id_collega_eventi">
                                <div class="col-xs-6 col-md-6">
                                    <div class="panel panel-info scroll_table">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <h3 class="panel-title"> Personaggi associati</h3>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <input type="text" class="form-control" placeholder="Search"
                                                           id="id_search_personaggio">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-body">


                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome</th>
                                                    <th>Cognome</th>
                                                </tr>
                                                </thead>
                                                <tbody id="lista_personaggi">


                                                </tbody>
                                            </table>

                                        </div>

                                    </div>


                                </div>

                                <div class="col-xs-6 col-md-6">
                                    <div class="panel panel-info scroll_table">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-6 col-md-6">
                                                    <h3 class="panel-title"> Eventi associati </h3>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <input type="text" class="form-control" placeholder="Search"
                                                           id="id_search_evento">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-body">


                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                </tr>
                                                </thead>
                                                <tbody id="corpo_lista_eventi">

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-danger btn_update_raf">Aggiorna Luogo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
        </script>

    </form>



@endsection