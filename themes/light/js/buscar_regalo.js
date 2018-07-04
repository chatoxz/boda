
setInterval(controlInput, 1000);

function controlInput(){
    if ($("#tbSearch").val() !=  ""){
        $(".wrap_regalo").addClass("hidden");
        $(".wrap_regalo").each(function () {
            if(parseInt($(this).attr("value")) <= parseInt($("#tbSearch").val())){
                $(this).removeClass("hidden");
            }
        });
    }
}