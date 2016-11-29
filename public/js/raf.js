/**
 * Created by raffaeleschiavone on 21/10/16.
 */

flag_init = 0

function remove_personaggio(element) {

    personaggio = element.getAttribute('personaggio')
    id_to_remove = element.getAttribute('toRemove')
    if (confirm('Sicuro di eliminare il personaggio ' + personaggio + '?')) {
        $.ajax({
            url: 'remove_personaggio',
            type: "POST",
            data: {
                remove_id: id_to_remove
            },
            success: function (data) {
                successHtml = '<div class="alert alert-success"><ul>';


                successHtml += '<li> Personaggio rimosso </li>'; //showing only the first error.

                successHtml += '</ul></di>';

                $('#form_success').html(successHtml); //appending to a <div id="form-errors"></div> inside form

                $("#form_success").fadeTo(5000, 500).slideUp(500, function () {
                    $("#form_success").slideUp(500);
                });
                goToByScroll("form_success")
                $('#lista_personaggi tr#tr_personaggio_' + id_to_remove).remove();

            }
        });
    }
}
function remove_evento(element) {

    evento = element.getAttribute('evento')
    id_to_remove = element.getAttribute('toRemove')
    if (confirm('Sicuro di eliminare l\'evento ' + evento + '?')) {
        $.ajax({
            url: 'remove_evento',
            type: "POST",
            data: {
                remove_id: id_to_remove
            },
            success: function (data) {
                successHtml = '<div class="alert alert-success"><ul>';


                successHtml += '<li> Evento rimosso </li>'; //showing only the first error.

                successHtml += '</ul></di>';

                $('#form_success').html(successHtml); //appending to a <div id="form-errors"></div> inside form

                $("#form_success").fadeTo(5000, 500).slideUp(500, function () {
                    $("#form_success").slideUp(500);
                });
                goToByScroll("form_success")
                $('#corpo_lista_eventi tr#tr_evento_' + id_to_remove).remove();

            }
        });
    }
}

function remove_luogo(element) {

    luogo = element.getAttribute('luogo')
    id_to_remove = element.getAttribute('toRemove')
    if (confirm('Sicuro di eliminare il luogo ' + luogo + '?')) {
        $.ajax({
            url: 'remove_luogo',
            type: "POST",
            data: {
                remove_id: id_to_remove
            },
            success: function (data) {
                successHtml = '<div class="alert alert-success"><ul>';


                successHtml += '<li> Luogo rimosso </li>'; //showing only the first error.

                successHtml += '</ul></di>';

                $('#form_success').html(successHtml); //appending to a <div id="form-errors"></div> inside form

                $("#form_success").fadeTo(5000, 500).slideUp(500, function () {
                    $("#form_success").slideUp(500);
                });
                goToByScroll("form_success")
                $('#id_table_luoghi tr#tr_luogo_' + id_to_remove).remove();

            }
        });
    }
}

function load_dinastia(formData) {


    document.getElementById("mySavedModel").innerHTML = ""

    $.ajax({
        type: "post",
        url: "get_dinastia",
        data: formData,
        dataType: 'text',
        success: function (data) {

            dinastia = data //'{"class": "go.TreeModel","nodeDataArray":[{"key":"2", "name":"sasa Raf", "title": "padre", "parent":"7"},{"key":"9", "name":"Trimarco Pasquale", "title": "padre", "parent":"7"},{"key":"7", "name":"Trimarco Vincenzo", "title": "padre", "parent":"22"},{"key":"22", "name" :"qqqqqnome:qqqqqqqqqq", "title": "padre"}]}'
            document.getElementById("mySavedModel").innerHTML = dinastia
            if (flag_init == 0) {
                init()
                flag_init = 1
            }
            else {
                load()
            }

        },
        error: function (data) {
            console.log('Error:', data);
        }


    });

}

function show_hide_module_with_scroll(id_show, id_hide, id_scroll) {
    show_hide_module(id_show, id_hide)
    goToByScroll(id_scroll)

}
function add_tipo(idInput, idSelect) {
    newTipo = $("#" + idInput).val()
    opt = "<option>" + newTipo + "</option>"
    $('#' + idSelect)
        .prepend($("<option selected></option>")
            .attr("value", newTipo)
            .text(newTipo));


    $('#' + idInput).val('')

}
function check(value) {

    if (value == null)
        return ""
    else
        return value

}
function set_form_personaggio(personaggio) {


    //Reset Form e table eventi ed eventi ass
    document.getElementById("id_form_personaggio").reset();
    $("#corpo_lista_eventi").empty();
    $("#corpo_lista_eventi_personaggio").empty();


    $("#idPersonaggio").val(check(personaggio['anagrafica']['id']))

    $("#idNome").val(check(personaggio['anagrafica']['nome']))
    $("#idCognome").val(check(personaggio['anagrafica']['cognome']))

    $("#idDinastia").val(check(personaggio['anagrafica']['dinastia']))
    if (personaggio['luogo_nascita'] != "" && personaggio['luogo_nascita'] != null) {
        $("#label_idLuogoNascita").val(check(personaggio['luogo_nascita']['denominazione_luogo']))
        $("#idLuogoNascita").val(check(personaggio['luogo_nascita']['id']))

    }
    if (personaggio['luogo_morte'] != "" && personaggio['luogo_morte'] != null) {

        $("#label_idLuogoMorte").val(check(personaggio['luogo_morte']['denominazione_luogo']))
        $("#idLuogoMorte").val(check(personaggio['luogo_morte']['id']))

    }

    if (personaggio['dinastia'][0]['padre'] != "" && personaggio['dinastia'][0]['padre'] != null) {

        nomePadre = check(personaggio['dinastia'][0]['padre']['cognome']) + " " + check(personaggio['dinastia'][0]['padre']['nome'])
        $("#label_idPadre").val(check(nomePadre))
        $("#idPadre").val(check(personaggio['anagrafica']['padre_id']))

    }
    if (personaggio['dinastia'][0]['madre'] != "" && personaggio['dinastia'][0]['madre'] != null) {

        nomeMadre = check(personaggio['dinastia'][0]['madre']['cognome']) + " " + check(personaggio['dinastia'][0]['madre']['nome'])
        $("#label_idMadre").val(check(nomeMadre))
        $("#idMadre").val(check(personaggio['anagrafica']['madre_id']))

    }

    if (personaggio['dinastia'][0]['coniuge1'] != "" && personaggio['dinastia'][0]['coniuge1'] != null) {

        $("#label_idConiuge1").val(check(personaggio['coniuge1_id']))
        $("#idConiuge1").val(check(personaggio['anagrafica']['coniuge1_id']))


    }
    if (personaggio['dinastia'][0]['coniuge2'] != "" && personaggio['dinastia'][0]['coniuge2'] != null) {

        $("#label_idConiuge2").val(check(personaggio['coniuge2_id']))
        $("#idConiuge2").val(check(personaggio['anagrafica']['coniuge2_id']))


    }
    if (personaggio['dinastia'][0]['coniuge3'] != "" && personaggio['dinastia'][0]['coniuge3'] != null) {
        $("#label_idConiuge3").val(check(personaggio['coniuge3_id']))
        $("#idConiuge3").val(check(personaggio['anagrafica']['coniuge3_id']))

    }


    $("#idDescrizione").val(check(personaggio['anagrafica']['descrizione']))

    $("#idTipo").val(check(personaggio['anagrafica']['tipo']))

    $("#idNascita").val(check(personaggio['anagrafica']['data_nascita']))
    $("#idMorte").val(check(personaggio['anagrafica']['data_morte']))


    eventi_non_ass = personaggio['eventi_non_associati']
    eventi_ass = personaggio['eventi_associati']

    for (i = 0; i < eventi_non_ass.length; i++) {
        create_row_event(eventi_non_ass[i], "corpo_lista_eventi")
    }
    for (i = 0; i < eventi_ass.length; i++) {
        create_row_event(eventi_ass[i], "corpo_lista_eventi_personaggio")

    }
}

function get_info_personaggio(id_personaggio) {
    var type = "POST"; //for creating new resource
    var formData = {
        id: id_personaggio,

    }
    url = "get_personaggio"
    $.ajax({

        type: type,
        url: url,
        data: formData,
        dataType: 'text',
        success: function (data) {
            data = JSON.parse(data);

            set_form_personaggio(data)

        },
        error: function (data) {


            if (data.status === 422) {

            } else {
                /// do some thing else
            }

            console.log('Error:', data);
        }
    });

    load_dinastia(formData)

}

function get_evento_db(id_evento) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var type = "POST"; //for creating new resource
    var formData = {
        id: id_evento,

    }
    console.log(formData)
    var url = "get_evento"
    $.ajax({
        type: type,
        url: url,
        data: formData,
        dataType: 'text',
        success: function (data) {
            data = JSON.parse(data);

            set_form_eventi(data)

        },
        error: function (data) {

            if (data.status === 422) {

            } else {
                /// do some thing else
            }

            console.log('Error:', data);
        }
    });

}

function set_form_luoghi(luogo) {

    $("#lista_personaggi").empty();
    $("#corpo_lista_eventi").empty();

    $('#id_luogo').val(luogo['id'])

    $('#denominazione_luogo').val(luogo['denominazione_luogo'])
    $('#anno_costruzione').val(luogo['anno_costruzione'])

    $('#localizzazione_luogo').val(luogo['localizzazione_luogo'])

    $('#id_tipo_luoghi').val(luogo['tipo_luogo'])
    $('#id_sub_luoghi').val(luogo['tipo_sub_luogo'])
    $('#ulteriore_caratterizzazione').val(luogo['ulteriore_caratterizzazione'])
    $('#descrizione_monumento').val(luogo['descrizione_monumento'])

    personaggi_ass = luogo['personaggi']

    for (i = 0; i < personaggi_ass.length; i++) {
        create_row_personaggi_luoghi(personaggi_ass[i], "lista_personaggi")
    }

    eventi_ass = luogo['eventi']

    for (i = 0; i < eventi_ass.length; i++) {
        create_row_event_luoghi(eventi_ass[i], "corpo_lista_eventi")
    }

}

function create_row_event_luoghi(eventi, id_table) {

    nome = eventi['denominazione_evento']
    desc = eventi['descrizione_evento']
    id_evento = eventi['id']


    tr = "<tr id='" + id_evento + "'>  " +
        "<td><span class='replaceme'></span>" + id_evento + "</td>" +
        " <td>" + nome + "</td>" +
        "<td>" + desc + "</td>"

    $('#' + id_table + '').prepend(tr);


}

function create_row_personaggi_luoghi(personaggi, id_table) {

    nome = personaggi['nome']
    cognome = personaggi['cognome']
    id_personaggio = personaggi['id']

    tr = "<tr id='" + id_personaggio + "'>  " +
        "<td>" + id_personaggio + " </td>" +
        " <td>" + cognome + "</td>" +
        "<td>" + nome + "</td>"


    $('#' + id_table + '').prepend(tr);


}

function set_form_eventi(evento) {

    $("#lista_personaggi").empty();
    $("#lista_personaggi_associati").empty();

    $('#id_evento').val(evento['id'])

    $('#id_denominazione_evento').val(evento['denominazione_evento'])
    $('#idTipoEvento').val(evento['tipo_evento'])

    $('#label_id_denominazione_luogo').val(evento['vecchio_luogo'])

    $('#id_denominazione_luogo').val(evento['origine_luogo_id'])
    $('#id_anno_costruzione').val(evento['anno_evento'])
    $('#id_ulteriore_caratterizzazione').val(evento['ulteriore_caratterizzazione'])
    $('#idDescrizioneEvento').val(evento['descrizione_evento'])
    $('#id_anno_costruzione').val(evento['anno_evento'])

    $('#label_id_nuova_denominazione_luogo').val(evento['nuovo_luogo'])
    $('#id_nuova_denominazione_luogo').val(evento['nuovo_luogo_id'])
    $('#id_descrizione_movimento_opera').val(evento['descrizione_movimento_opera'])
    show_hide_module('id_form_nuovo_evento', 'vuota')


    personaggi_non_ass = evento['personaggi_non_associati']
    personaggi_ass = evento['personaggi_associati']

    for (i = 0; i < personaggi_non_ass.length; i++) {
        create_row_personaggio(personaggi_non_ass[i], "lista_personaggi")
    }
    for (i = 0; i < personaggi_ass.length; i++) {
        create_row_personaggio(personaggi_ass[i], "lista_personaggi_associati")

    }

}

function open_form_luogo(element) {
    id_tr = element.id
    id = id_tr.substr(6, id_tr.length)
    get_luogo_db(id)
}
function open_form_evento(element) {
    id_tr = element.id
    id = id_tr.substr(7, id_tr.length)
    get_evento_db(id)

}

function open_form_personaggio(element) {
    id_tr = element.id
    id = id_tr.substr(12, id_tr.length)
    personaggio = get_info_personaggio(id)


}

function show_hide_module(list_show, list_hide) {

    l_show = list_show.split(",");
    l_hide = list_hide.split(",");

    if (list_show != "vuota") {
        for (var i = l_show.length - 1; i >= 0; i--) {
            document.getElementById(l_show[i]).style.display = "block";
        }

    }
    if (list_hide != "vuota") {
        for (var i = l_hide.length - 1; i >= 0; i--) {
            document.getElementById(l_hide[i]).style.display = "none";
        }

    }
}

function get_luogo_db(id_luogo) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var type = "POST"; //for creating new resource
    var formData = {
        id: id_luogo,

    }
    console.log(formData)
    var url = "get_luogo"
    $.ajax({
        type: type,
        url: url,
        data: formData,
        dataType: 'text',
        success: function (data) {
            data = JSON.parse(data);

            set_form_luoghi(data)

        },
        error: function (data) {

            if (data.status === 422) {

            } else {
                /// do some thing else
            }

            console.log('Error:', data);
        }
    });

}
function get_info_evento() {


    tipo_evento = $("#idTipoEvento").val()
    sub_tipo_evento = $("#idTipoSubEvento").val()

    json_evento = {
        denominazione_evento: document.getElementById("id_denominazione_evento").value,
        tipo_evento: tipo_evento,
        sub_tipo_evento: sub_tipo_evento,
        descrizione_evento: document.getElementById("idDescrizioneEvento").value,
        denominazione_luogo: document.getElementById("id_denominazione_luogo").value,
        anno_di_costruzione: document.getElementById("id_anno_costruzione").value,
//        "descrizione_monumento": document.getElementById("id_descrizione_monumento").value,
        ulteriore_caratterizzazione: document.getElementById("id_ulteriore_caratterizzazione").value,
//        "nuova_denominazione_luogo": document.getElementById("id_nuova_denominazione_luogo").value,
        descrizione_movimento_opera: document.getElementById("id_descrizione_movimento_opera").value,
        nuova_localizzazione: document.getElementById("id_nuova_denominazione_luogo").value,

    }
    return json_evento;
}
function insert_Evento() {

    json_evento = get_info_evento();
    var type = "POST"; //for creating new resource
    url = "insert_evento"
    $.ajax({

        type: type,
        url: url,
        data: json_evento,
        dataType: 'text',
        success: function (data) {


            data = JSON.parse(data);

            id_table = "corpo_lista_eventi"


            create_row_event(data, id_table)
            $('#novo_evento').hide()
//            $('#alert_insert_evento').css("display","block")
            $("#alert_insert_evento").fadeTo(2000, 500).slideUp(500, function () {
                $("#alert_insert_evento").slideUp(500);
            });
        },
        error: function (data) {

            if (data.status === 422) {
                //process validation errors here.
                errors = data.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g

                errors = JSON.parse(data['responseText'])

                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></di>';

                $('#form_errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

                $("#form_errors").fadeTo(5000, 500).slideUp(500, function () {
                    $("#form_errors").slideUp(500);
                });
            } else {
                /// do some thing else
            }

            console.log('Error:', data);
        }
    });

}

function insert_personaggio() {

    var json_personaggio = get_value_from_form_personaggio();
    console.log(json_personaggio);

    var type = "POST"; //for creating new resource
    url = "store"
    $.ajax({

        type: type,
        url: url,
        data: json_personaggio,
        dataType: 'text',
        success: function (data) {
            data = JSON.parse(data);

            id_table = "lista_personaggi"


            create_row_personaggio(data, id_table)
            $('#nuovo_personaggio').hide()
//            $('#alert_insert_evento').css("display","block")
            $("#alert_insert_personaggio").fadeTo(2000, 500).slideUp(500, function () {
                $("#alert_insert_personaggio").slideUp(500);
            });
        },
        error: function (data) {

            if (data.status === 422) {
                //process validation errors here.
                errors = data.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g

                errors = JSON.parse(data['responseText'])

                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></di>';

                $('#form_errors_personaggio').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

                $("#form_errors_personaggio").fadeTo(5000, 500).slideUp(500, function () {
                    $("#form_errors_personaggio").slideUp(500);
                });
            } else {
                /// do some thing else
            }

            console.log('Error:', data);
        }
    });

}

function get_value_from_form_personaggio() {

    nome = document.getElementById("idNome").value;
    cognome = document.getElementById("idCognome").value;
    data_nascita = document.getElementById("idNascita").value;
    luogo_nascita = document.getElementById("idLuogoNascita").value;
    data_morte = document.getElementById("idMorte").value;
    luogo_morte = document.getElementById("idLuogoMorte").value;
    padre = document.getElementById("idPadre").value; //
    madre = document.getElementById("idMadre").value; //
    coniuge1 = document.getElementById("idConiuge1").value; //
    coniuge2 = document.getElementById("idConiuge2").value; //
    coniuge3 = document.getElementById("idConiuge3").value; //

    descrizione = document.getElementById("idDescrizione").value;
    tipo = document.getElementById("idTipo").value;
    nome_dinastia = "Rafilucc"

    var json_personaggio = {
        "nome": nome,
        "cognome": cognome,
        "data_nascita": data_nascita,
        "luogo_nascita": luogo_nascita,
        "luogo_morte": luogo_morte,
        "padre": padre,
        "madre": madre,
        "coniuge1": coniuge1,
        "coniuge2": coniuge2,
        "coniuge3": coniuge2,
        "data_morte": data_morte,
        "descrizione": descrizione,
        "tipo": tipo,
        "nome_dinastia": nome_dinastia
    }

    return json_personaggio;
}

function create_row_personaggio(data, id_table) {
    nome = data['nome']
    cognome = data['cognome']
    id_personaggio = data['id']

    if (id_table == "lista_personaggi_associati") {
        tr = "<tr id='" + id_personaggio + "'>  " +
            "<td><input name='personaggi[]' value= personaggio_" + id_personaggio + "> </td>" +
            " <td>" + nome + "</td>" +
            "<td>" + cognome + "</td>" +
            " <td><button type='button' id='" + id_personaggio + "' class='sposta' value='ee' onclick='sposta_row_personaggio(this)'> sposta</button> </td></tr>"

        $('#' + id_table + '').prepend(tr);
    }
    else {
        tr = "<tr id='" + id_personaggio + "'>  " +
            "<td><span class='replaceme'></span>" + id_personaggio + "</td>" +
            " <td>" + nome + "</td>" +
            "<td>" + cognome + "</td>" +
            " <td><button type='button' id='" + id_personaggio + "' class='sposta' value='ee' onclick='sposta_row_personaggio(this)'> sposta</button> </td></tr>"

        $('#' + id_table + '').prepend(tr);
    }
}

function create_row_event(data, id_table) {
    nome = data['denominazione_evento']
    desc = data['descrizione_evento']
    id_evento = "evento_" + data['id']

    if (id_table == "corpo_lista_eventi_personaggio") {
        tr = "<tr id='" + id_evento + "'>  " +
            "<td><input name='eventi[]' value= " + id_evento + "> </td>" +
            " <td>" + nome + "</td>" +
            "<td>" + desc + "</td>" +
            " <td><button type='button' id='" + id_evento + "' class='sposta' value='ee' onclick='sposta_row(this)'> sposta</button> </td></tr>"

        $('#' + id_table + '').prepend(tr);
    }
    else {
        tr = "<tr id='" + id_evento + "'>  " +
            "<td><span class='replaceme'></span>" + id_evento + "</td>" +
            " <td>" + nome + "</td>" +
            "<td>" + desc + "</td>" +
            " <td><button type='button' id='" + id_evento + "' class='sposta' value='ee' onclick='sposta_row(this)'> sposta</button> </td></tr>"

        $('#' + id_table + '').prepend(tr);
    }
}

function set_modal_value(idModal, id_value) {
    document.getElementById(idModal).setAttribute("value_call", id_value)

}
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    //Se li è cheked allora unchecked
    if (document.getElementById(ev.target.id).getAttribute("checked") == "true") {
        document.getElementById(ev.target.id).setAttribute("checked", "false")
        document.getElementById(ev.target.id).setAttribute("style", "background:white;")

        return
    }
    $('.pers_dinastia').each(function () {
        $(this).attr("checked", "false")
        $(this).attr("style", "background:white;")
    })
    document.getElementById(ev.target.id).setAttribute("checked", "true")
    document.getElementById(ev.target.id).setAttribute("style", "background:#f7e49d;")

}
function remove_pers(id_casella) {

    //controllo se la casella ha un elemento

    if ($('#' + id_casella).find('a').length != 0) {
        a = $("#" + id_casella).find('a')
        $("#id_personaggi_dinastia").append(a)
        return;
    }
}

function drop(id_casella) {
    //controllo se la casella ha un elemento

    if ($('#' + id_casella).find('a').length != 0) {
        alert("Personaggio inserito")
        return;
    }
    //se è stato selezionato un persaggio
    a = $("a[checked='true']")
    if (a.text() == "") {
        alert("Non hai selezionato un personaggio")
        return;
    }
    // spostare personaggio nella casella
    a.attr("checked", "false")
    a.attr("style", "background:white;")

    $('#' + id_casella).append(a)
}

function sposta_row(ele) {

    idTr = (ele.parentNode.parentNode).id
    var tr = $("#" + idTr).clone();
    if ($('#corpo_lista_eventi').find('#' + idTr).length > 0) {
        cell2 = tr.find('td').eq(0).text()
        tr.find("td").eq(0).html("<input name='eventi[]' value='" + cell2 + "'>")
        $("#corpo_lista_eventi_personaggio").append(tr);
        $('#corpo_lista_eventi').find('#' + idTr).remove()
    } else {
        tr.find("td").eq(0).html(idTr)
        $("#corpo_lista_eventi").append(tr);
        $('#corpo_lista_eventi_personaggio').find('#' + idTr).remove()

    }
}


function sposta_row_personaggio(ele) {

    var idTr = (ele.parentNode.parentNode).id
    var tr = $("#" + idTr).clone();
    if ($('#lista_personaggi').find('#' + idTr).length > 0) {
        var cell2 = tr.find('td').eq(0).text()

        //  cell2 = cell2.replace("personaggio_", "");

        tr.find("td").eq(0).html("<input name='personaggi[]' value='personaggio_" + cell2 + "'>")
        $("#lista_personaggi_associati").append(tr);
        $('#lista_personaggi').find('#' + idTr).remove()
    } else {
        tr.find("td").eq(0).html(idTr)
        $("#lista_personaggi").append(tr);
        $('#lista_personaggi_associati').find('#' + idTr).remove()

    }
}

// This is a functions that scrolls to #{blah}link
function goToByScroll(id) {
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top
    }, 'slow');
}

function click_row_luogo() {
    $("#id_table_luoghi tr").click(function (event) {
        id_label_input_luogo = document.getElementById("modalLuoghi").getAttribute("value_call")
        id_input_luogo = id_label_input_luogo.substr(6, id_label_input_luogo.length)


        id_luogo = $(event.target).parent().attr('id').substr(6, 7)
        denominazione = $(event.target).parent().find('td:eq(1)').html()
        $("#" + id_label_input_luogo).val(denominazione)
        $("#" + id_input_luogo).val(id_luogo)

        $('#modalLuoghi').modal('hide')
    })
}
$(document).ready(function () {

    $(".clickable-row").click(function (e) {
        // Prevent a page reload when a link is pressed
        e.preventDefault();
        // Call the scroll function
        goToByScroll("id_form_personaggio");
    });


    $("#id_load_dinastia").click(function () {

        dinastia = $("#id_dinastia").val()
        if (dinastia == "Scegli Dinastia") {
            dinastia = ""
        }

        $("input[name=dinastia]").val(dinastia);

        personaggio = $("#idCognome").val() + " " + $("#idNome").val()

        if ($("#padre_casella").find("a").length > 0) {
            padre = $("#padre_casella").find("a").html()
            id_padre = ($("#padre_casella").find("a").attr("id")).substr(15)
            $("input[name=label_padre]").val(padre);
            $("input[name=padre]").val(id_padre);

            var formData = {
                nome: $("#idCognome").val(),
                cognome: $("#idNome").val(),
                padre_id: id_padre // perhè l'id è din3233
            }
            load_dinastia(formData)
        }
        if ($("#madre_casella").find("a").length > 0) {

            madre = $("#madre_casella").find("a").html()
            id_madre = ($("#madre_casella").find("a").attr("id")).substr(15)
            $("input[name=label_madre]").val(madre);
            $("input[name=madre]").val(id_madre);

        }

        if ($("#coniuge1_casella").find("a").length > 0) {

            coniuge1 = $("#coniuge1_casella").find("a").html()
            id_coniuge1 = ($("#coniuge1_casella").find("a").attr("id")).substr(15)

            $("input[name=label_coniuge1]").val(coniuge1);
            $("input[name=coniuge1]").val(id_coniuge1);
        }
        if ($("#coniuge2_casella").find("a").length > 0) {

            coniuge2 = $("#coniuge2_casella").find("a").html()
            id_coniuge2 = ($("#coniuge2_casella").find("a").attr("id")).substr(15)
            $("input[name=label_coniuge2]").val(coniuge2);
            $("input[name=coniuge2]").val(id_coniuge2);
        }
        if ($("#coniuge3_casella").find("a").length > 0) {

            coniuge3 = $("#coniuge3_casella").find("a").html()
            id_coniuge3 = ($("#coniuge3_casella").find("a").attr("id")).substr(15)
            $("input[name=label_coniuge3]").val(coniuge3);
            $("input[name=coniuge3]").val(id_coniuge3);

        }

        $("#modalDinastia").modal("hide")

    })

    $("#id_search_personaggio").keyup(function () {
        $("#lista_personaggi tr td:nth-child(2)").each(function () {
            if ($(this).text().toLowerCase().indexOf($("#id_search_personaggio").val()) >= 0) {
                $(this).closest('tr').show()
            }
            else {
                $(this).closest('tr').hide()

            }
            //alert($(this).text());

        });
    });

    $("#id_search_evento").keyup(function () {
        $("#corpo_lista_eventi tr td:nth-child(2)").each(function () {
            if ($(this).text().toLowerCase().indexOf($("#id_search_evento").val()) >= 0) {
                $(this).closest('tr').show()
            }
            else {
                $(this).closest('tr').hide()

            }
            //alert($(this).text());

        });
    });

    $("#id_search_luogo").keyup(function () {
        $("#id_table_luoghi tr td:nth-child(2)").each(function () {
            if ($(this).text().toLowerCase().indexOf($("#id_search_luogo").val()) >= 0) {
                $(this).closest('tr').show()
            }
            else {
                $(this).closest('tr').hide()

            }
            //alert($(this).text());

        });
    });

    $("#id_search_personaggio").keyup(function () {
        $("#id_table_personaggi tr td:nth-child(2)").each(function () {
            if ($(this).text().toLowerCase().indexOf($("#id_search_luogo").val()) >= 0) {
                $(this).closest('a').show()
            }
            else {
                $(this).closest('a').hide()

            }

        });
    });


    $("#idTipoEvento").change(function () {
        //document.getElementById("col_sub_luogo1").style.visibility = "visible";
        //document.getElementById("col_sub_luogo2").style.visibility = "visible";
        document.getElementById("id_nuovo_tipo_evento").value = ""
        document.getElementById("id_nuovo_sub_tipo_evento").value = ""


        var my_url = "get_sub_eventi";
        var type = "POST"; //for creating new resource
        var formData = {
            tipo_evento: $("#idTipoEvento").val()
        }
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'text',
            success: function (data) {
                select = document.getElementById("idTipoSubEvento")
                options = ""
                data = JSON.parse(data);

                for (i = 0; i < data.length; i++) {

                    options = options + "<option>" + data[i]['tipo_sub_evento'] + "</option>"

                }
                select.innerHTML = options
                //alert(JSON.stringify(data))
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    });


    $("#id_tipo_luoghi").change(function () {
        document.getElementById("col_sub_luogo1").style.visibility = "visible";
        document.getElementById("col_sub_luogo2").style.visibility = "visible";
        var formData = {
            tipo_sub_luogo: $("#id_tipo_luoghi").val(),
        }
        var my_url = "get_sub_luoghi";
        var type = "POST"; //for creating new resource

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'text',
            success: function (data) {
                select = document.getElementById("id_sub_luoghi")
                options = ""
                data = JSON.parse(data);

                for (i = 0; i < data.length; i++) {

                    options = options + "<option>" + data[i]['tipo_sub_luogo'] + "</option>"

                }
                select.innerHTML = options
                //alert(JSON.stringify(data))
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    });

    $("#idSaveLuogo").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var tipo_luogo = $("#id_tipo_luoghi").val()

        var tipo_sub_luogo = $("#id_sub_luoghi").val()

        if (tipo_luogo == "Scegli tipo luogo") {
            tipo_luogo = ""
            tipo_sub_luogo = ""
        }
        else {
            if (tipo_sub_luogo == "Scegli sub tipo luogo" || tipo_sub_luogo == "") {
                tipo_sub_luogo = ""
            }
        }

        var formData = {
            denominazione_luogo: $('#denominazione_luogo').val(),
            anno_costruzione: $('#anno_costruzione').val(),
            descrizione_monumento: $('#descrizione_monumento').val(),
            tipo_luogo: tipo_luogo,
            localizzazione_luogo: $('#localizzazione_luogo').val(),
            ulteriore_caratterizzazione: $('#ulteriore_caratterizzazione').val(),
            tipo_sub_luogo: tipo_sub_luogo,
        }


        var type = "POST"; //for creating new resource
        var my_url = "luogo";

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'text',
            success: function (data) {
                data = JSON.parse(data);
                id = data['id']
                den_luogo = data['denominazione_luogo']
                loc = data['localizzazione_luogo']
                tipo = data['tipo_luogo']
                tr = document.createElement("tr");
                tr.setAttribute('id', 'luogo_' + id);
                tr.setAttribute('checked', 'false')
                tr.setAttribute('onclick', 'click_row_luogo()')

                tr.setAttribute('class', 'select_row_genitori')
                cells = "<td style='visibility: hidden;'>" + id + "</td><td>" + den_luogo + "</td><td>" + loc + "</td><td>" + tipo + "</td>"
                tr.innerHTML = cells
                table = document.getElementById("id_table_luoghi")
                table.insertBefore(tr, table.firstChild);
                document.getElementById("form_luogo").reset();

                successHtml = '<div class="alert alert-success"><ul>';

                successHtml += '<li> Luogo inserito con successo </li>'
                successHtml += '</ul></div>'

                $('#form_success_luogo').html(successHtml); //appending to a <div id="form-errors"></div> inside form

                $("#form_success_luogo").fadeTo(5000, 500).slideUp(500, function () {
                    $("#form_success_luogo").slideUp(500);
                });
                //alert(JSON.stringify(data))
            },
            error: function (data) {
                if (data.status === 422) {
                    //process validation errors here.
                    errors = data.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g

                    errors = JSON.parse(data['responseText'])

                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each(errors, function (key, value) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';

                    $('#form_errors_luogo').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form

                    $("#form_errors_luogo").fadeTo(5000, 500).slideUp(500, function () {
                        $("#form_errors_luogo").slideUp(500);
                    });
                } else {
                    /// do some thing else
                }


                console.log('Error:', data);
            }
        });
    });
});