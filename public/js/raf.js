/**
 * Created by raffaeleschiavone on 21/10/16.
 */

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
function get_info_evento() {

    tipo_evento = $("#id_nuovo_tipo_evento").val()
    sub_tipo_evento = $("#id_nuovo_sub_tipo_evento").val()

    if (tipo_evento == "") {
        tipo_evento = $("#idTipoEvento").val()
        if (sub_tipo_evento == "") {
            sub_tipo_evento = $("#idTipoSubEvento").val()
        }
    }
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
            alert((data))

            nome = data['denominazione_evento']
            desc = data['descrizione_evento']

            tr = "<tr >  " +
                "<td><span class='replaceme'></span>11</td>" +
                " <td>" + nome + "</td>" +
                "<td>" + desc + "</td>" +
                "<td>sss</td>" +
                " <td><button type='button' id='s' class='sposta' value='ee' onclick='sposta_row(this)'> sposta</button> </td></tr>"

            $('#corpo_lista_eventi').prepend(tr);
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


function set_modal_value(idModal, id_value) {
    document.getElementById(idModal).setAttribute("value_call", id_value)

}
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    alert(data + " " + ev.target.id)
    document.getElementById(ev.target.id).appendChild(document.getElementById(data));


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
        tr.find("td").eq(0).html(idTr.substr(7, 8))
        $("#corpo_lista_eventi").append(tr);
        $('#corpo_lista_eventi_personaggio').find('#' + idTr).remove()

    }
}


$(document).ready(function () {


    $("#id_table_luoghi tr").click(function (event) {
        id_label_input_luogo = document.getElementById("modalLuoghi").getAttribute("value_call")
        id_input_luogo = id_label_input_luogo.substr(6, id_label_input_luogo.length)


        id_luogo = $(event.target).parent().attr('id').substr(6, 7)
        denominazione = $(event.target).parent().find('td:eq(1)').html()
        $("#" + id_label_input_luogo).val(denominazione)
        $("#" + id_input_luogo).val(id_luogo)


    })


    $("#id_load_dinastia").click(function () {
        personaggio = $("#idCognome").val() + " " + $("#idNome").val()
        padre = $("#padre_casella").find("a").html()
        id_padre = ($("#padre_casella").find("a").attr("id")).substr(12, 13)

        madre = $("#madre_casella").find("a").html()
        id_madre = ($("#madre_casella").find("a").attr("id")).substr(12, 13)

        coniuge1 = $("#coniuge1_casella").find("a").html()
        id_coniuge1 = ($("#coniuge1_casella").find("a").attr("id")).substr(12, 13)

        coniuge2 = $("#coniuge2_casella").find("a").html()
        id_coniuge2 = ($("#coniuge2_casella").find("a").attr("id")).substr(12, 13)

        coniuge3 = $("#coniuge3_casella").find("a").html()
        id_coniuge3 = ($("#coniuge3_casella").find("a").attr("id")).substr(12, 13)

        dinastia = '{"class": "go.TreeModel","nodeDataArray": [{"key":"1", "name":"' + padre + '"},{"key":"2", "name":"' + madre + '"},{"key":"3", "name":"' + personaggio + '", "coniuge1":"' + coniuge1 + '", "coniuge1":"' + coniuge2 + '", "coniuge1":"' + coniuge3 + '","parent":"1","parent":"2"}]}'


        $("input[name=label_padre]").val(padre);
        $("input[name=padre]").val(id_padre);


        $("input[name=label_madre]").val(madre);
        $("input[name=madre]").val(id_madre);


        $("input[name=label_coniuge1]").val(coniuge1);
        $("input[name=coniuge1]").val(id_coniuge1);

        $("input[name=label_coniuge2]").val(coniuge2);
        $("input[name=coniuge2]").val(id_coniuge2);

        $("input[name=label_coniuge3]").val(coniuge3);
        $("input[name=coniuge3]").val(id_coniuge3);


        document.getElementById("mySavedModel").innerHTML = dinastia
        init()
        load()
    })

    $("#id_search_personaggio").keyup(function () {
        $("#lista_maschera_edit_eventi tr td:nth-child(2)").each(function () {
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
            //alert($(this).text());

        });
    });


    $("#idTipoEvento").change(function () {
        //document.getElementById("col_sub_luogo1").style.visibility = "visible";
        //document.getElementById("col_sub_luogo2").style.visibility = "visible";
        document.getElementById("id_nuovo_tipo_evento").value = ""
        document.getElementById("id_nuovo_sub_tipo_evento").value = ""

        var formData = {
            "tipo_evento": $("#idTipoEvento").val(),
        }
        var my_url = "get_sub_eventi";
        var type = "POST"; //for creating new resource

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

    $("#tipo_luogo").keyup(function () {
        //alert("'"+ $("#id_tipo_luoghi").val()+"'")
        text = $("#tipo_luogo").val()
        if (text.length == 0) {
            if ($("#id_tipo_luoghi").val() == "Scegli tipo luogo") {
                document.getElementById("col_sub_luogo1").style.visibility = "hidden";
                document.getElementById("col_sub_luogo2").style.visibility = "hidden";
            }
        }
        else {
            document.getElementById("col_sub_luogo1").style.visibility = "visible";
            document.getElementById("col_sub_luogo2").style.visibility = "visible";
        }
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


        select_tipo_luogo = $("#id_tipo_luoghi").val()
        nuovo_tipo_luogo = $("#tipo_luogo").val()
        var tipo_luogo = ((nuovo_tipo_luogo.length > 0) ? nuovo_tipo_luogo : select_tipo_luogo);

        select_tipo_sub_luogo = $("#id_sub_luoghi").val()
        nuovo_tipo_sub_luogo = $("#nuovo_sub_tipo_luogo").val()

        var tipo_sub_luogo = ((nuovo_tipo_sub_luogo.length > 0) ? nuovo_tipo_sub_luogo : select_tipo_sub_luogo);

        alert(tipo_luogo + " " + tipo_sub_luogo)
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
                id = data['idLuogo']
                den_luogo = data['denominazione_luogo']
                loc = data['localizzazione_luogo']
                tipo = data['tipo_luogo']
                tr = document.createElement("tr");
                tr.setAttribute('id', "");
                tr.setAttribute('checked', 'false')
                tr.setAttribute('class', 'select_row_genitori')
                cells = "<td style='visibility: hidden;'>" + id + "</td><td>" + den_luogo + "</td><td>" + loc + "</td><td>" + tipo + "</td>"
                tr.innerHTML = cells
                table = document.getElementById("id_table_luoghi")
                table.insertBefore(tr, table.firstChild);
                document.getElementById("form_luogo").reset();

                //alert(JSON.stringify(data))
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});