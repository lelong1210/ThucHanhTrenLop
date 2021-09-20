$(document).ready(function(){
    $("#repassword").keyup(function(){
        var us  = $(this).val();
        var uss = $("#password").val();
        if(us != uss){
            $("span").html("mat khau khong khop");
        }else{
            $("span").html("");
        }
    });

});