$(document).on("ready",function () {
    //FUNCIONAMIENTO DEL MODAL
    $("body").on("click ontouchend",".modalButton", function (event) {
        event.stopPropagation();
        event.preventDefault();
        $(".resultado").html("").addClass("hidden");
        $("#modalContent").html("<div class='loader_azul_muy_grande' style='margin: auto;display: block'></div>");
        //setea el tamaño del modal
        $(".modal-dialog").removeClass("modal-sm modal-lg").addClass($(this).attr("size"));
        if(typeof $(this).attr("size") !== typeof undefined && $(this).attr("size") !== false){
            if($(this).attr("size") == "modal-sm") $(".modal-body").css("padding","20px 0px");
        }
        //pide confirmacion si esta seteado
        var confirmar = true;
        if(typeof $(this).attr("confirm") !== typeof undefined && $(this).attr("confirm") !== false){
            confirmar = confirm("Esta seguro que borrar el item?");
        }
        $(".modal-header > h1, .modal-header > h2, .modal-header > h3").html($(this).attr("title"));
        $("#modal").modal("show");
        //alert($(this).attr("value"));
        //carga en el modalContent la pagina.
        // LOS DATOS SE PASAN A TRAVES DE LA URL
        if(confirmar){
            $.ajax({
                url: $(this).attr("value"),
                type: "get",
                //data: data,
                processData: false,
                contentType: false,
            }).done (function (response){
                if(!response || response.length === 0){
                    $(".resultado").html("<span style='font-size: 16px;margin:auto' class='glyphicon glyphicon-ok' aria-hidden='true'></span> Accion realizada.");
                    setTimeout(function(){
                        $("#modal").modal("hide");
                        $(".resultado").html("").addClass("hidden");
                        //Si esta seteado el id del gridview lo recarga con el pjax
                        if ( typeof $("#id_gridview").html() !== "undefined"  )
                            $.pjax.reload({container:"#id_gridview"});
                        if(window.location.pathname == "/partido/fixture"){ window.location.reload(); }
                    }, 2000);
                }
                else{
                    $(".resultado").html("<span class='glyphicon glyphicon-cog' aria-hidden='true' style='padding-right: 10px'></span>"+response).css({"width":"90  %","text-align":"center"});
                    $("#modalContent").html(response);
                    /*setTimeout(function(){
                        $("#modal").modal("hide");
                        $("#modalContent").html("").addClass("hidden");
                        //Si esta seteado el id del gridview lo recarga con el pjax
                        if ( typeof $("#id_gridview").html() !== "undefined"  ){
                            $.pjax.reload({container:"#id_gridview"});
                        }
                    }, 2000);*/
                }
            }).fail(function (xhr, ajaxOptions, thrownError){
                $(".resultado").html("");
                console.log("LOG -> status: "+xhr.status+" thrownError: "+thrownError);
            });
        }
        return false;
    });

    //FUNCIONAMIENTO DEL formulario con AJAX
    $("body").on("beforeSubmit", "form#id_form", function () {
        var form = $(this);
        $(".resultado").removeClass("hidden").html("<div class='loader_tricolor_chico' style='margin: auto;display: block'></div>");

        $.ajax({
            url: form.attr("action"),
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
        }).done (function (response){
            if(!response || response.length === 0){
                $(".resultado").html("<span style='font-size: 16px;margin:auto' class='glyphicon glyphicon-ok' aria-hidden='true'></span> Accion realizada.");
                setTimeout(function(){
                    $("#modal").modal("hide");
                    $(".resultado").html("").addClass("hidden");
                    //Si esta seteado el id del gridview lo recarga con el pjax
                    if ( typeof $("#id_gridview").html() !== "undefined"  )
                        $.pjax.reload({container:"#id_gridview"});

                    if(window.location.pathname == "/partido/fixture"){ window.location.reload(); }
                }, 2000);
            }
            else{
                $(".resultado").html("<span class='glyphicon glyphicon-ok-sign' aria-hidden='true' style='padding-right: 10px'></span>"+response).css({"width":"90  %","text-align":"center"});
                setTimeout(function(){
                    //$("#modal").modal("hide");
                    $(".resultado").html("").addClass("hidden");
                    //Si esta seteado el id del gridview lo recarga con el pjax
                    //if ( typeof $("#id_gridview").html() !== "undefined"  ) $.pjax.reload({container:"#id_gridview"});
                }, 2000);
            }
        }).fail(function (xhr, ajaxOptions, thrownError){
            $(".resultado").html("");
            console.log("LOG -> status: "+xhr.status+" thrownError: "+thrownError);
        });
        return false;
    });
    //PARA LA CONFIRMACION DE LA ASISTENCIA
    //FUNCIONAMIENTO DEL formulario con AJAX PARA LA CONFIRMACION DE LA ASISTENCIA
    $("body").on("beforeSubmit", "form#id_form_confirmar", function () {
        var form = $(this);
        $(".resultado").show().removeClass("hidden").html("<div class='loader_tricolor_chico' style='margin: auto;display: block'></div>");

        $.ajax({
            url: form.attr("action"),
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
        }).done (function (response){
            if(!response || response.length === 0){
                $(".resultado").html("<span style='font-size: 16px;margin:auto' class='glyphicon glyphicon-ok' aria-hidden='true'></span> Accion realizada.");
                setTimeout(function(){
                    $("#modal").modal("hide");
                    $(".resultado").html("").addClass("hidden");
                    //Si esta seteado el id del gridview lo recarga con el pjax
                    if ( typeof $("#id_gridview").html() !== "undefined"  )
                        $.pjax.reload({container:"#id_gridview"});
                    //if(window.location.pathname == "/partido/fixture"){ window.location.reload(); }
                }, 2000);
            }
            else{
                $(".resultado").html("<span class='glyphicon glyphicon-ok-sign' aria-hidden='true' style='padding-right: 10px'></span>"+response).css({"width":"90  %","text-align":"center"});
                setTimeout(function(){ $(".resultado").fadeOut(2000); }, 2000);
            }
        }).fail(function (xhr, ajaxOptions, thrownError){
            $(".resultado").html("");
            console.log("LOG -> status: "+xhr.status+" thrownError: "+thrownError);
        });
        return false;
    });
    if(window.location.pathname != "/") {
        $($(".big_container div")[0]).css("color", "black").css("margin", "30px");
    }

    //setInterval(setHora, 60000);
    setBtnModal();
})

$(document).on('pjax:success', function() {
    setBtnModal()
});

function setBtnModal(){
    $("a[title='Save As New']").each(function (index) {
        $(this).attr('value',$(this).attr('href')).addClass('modalButton');
    });
    $("a[title=Ver]").each(function (index) {
        $(this).attr('value',$(this).attr('href')).addClass('modalButton');
    });
    $("a[title=View]").each(function (index) {
        $(this).attr('value',$(this).attr('href')).attr('size', 'modal-lg').addClass('modalButton');
    });
    $("a[title=Actualizar]").each(function (index) {
        $(this).attr('value',$(this).attr('href')).addClass('modalButton');
    });
    $("a[title=Update]").each(function (index) {
        $(this).attr('value',$(this).attr('href')).addClass('modalButton');
    });
}



