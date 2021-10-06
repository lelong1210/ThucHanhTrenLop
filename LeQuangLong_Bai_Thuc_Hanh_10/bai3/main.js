$(document).ready(function () {
    $("#test").click(function (e) { 
        var x = 3 ;
        $.post("./solannhap.php",{solannhap:x},function(data){
            alert(data);
        });
    });
});