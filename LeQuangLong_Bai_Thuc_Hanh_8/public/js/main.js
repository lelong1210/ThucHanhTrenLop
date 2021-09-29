$(document).ready(function(){
    $("#btn_DK").click(function (e) {
        var fullqr = $("#fullname").val();
        var userqr = $("#username").val();
        var passqr = $("#password").val();
        var emailqr = $("#email").val();
        var repas = $("#repassword").val();
        if(fullqr == "" || userqr == "" || passqr == "" || emailqr == "" || repas == ""){
            alert("các ô không được để trống");
        }else{
            $.post("./ajax/InsertInto",{full:fullqr,user:userqr,pass:passqr,email:emailqr},function(data){
                if(data){
                    $.post("./ajax/changDB",{ND:1},function (data){});
                    alert("DANG KY THANH CONG");
                    $("#Noficatification_Login_Register").slideToggle("slow");
                    $("#formDK").hide();
                }else{
                    alert("DANG KY THAT BAI");
                }
            });
        }
    });
    $("#username").keyup(function (e) {
        var user = $("#username").val(); 
        $.post("./ajax/CheckUser",{username:user},function(data){
            if(data){
                $("#sp_username").html("Đã có người dùng");
            }
            else{
                $("#sp_username").html("");
            }
        });
    });
    $("#repassword").keyup(function(){
        if($("#repassword").val() != $("#password").val() ){
            $("#sp_repassword").html("Mật Khẩu Không Khớp");
        }else{
            $("#sp_repassword").html("");
        }
    });
    $("#btn_DN").click(function (e) { 
        var userqr = $("#usernamelg").val();
        var passqr = $("#passwordlg").val();
        $.post("./ajax/CheckAcount",{user:userqr,pass:passqr},function(data){
            if(data){
                location.replace("./editpass");
            }else{
                alert("DANG NHẬP THAT BAI");
            }
        });
    });
    $("#btn_home").click(function (e) { 
        $.post("ajax/GetAll",{},function(e){
            $("#showTable").html(e);
        });
        setInterval(() => {
            $.post("ajax/CheckChangeDB",{},function (data){
                if(data == 1){
                    alert("data da thay doi => " + data);
                    $.post("ajax/GetAll",{},function(e){
                        $("#showTable").html(e);
                    });
                    $.post("ajax/changDB",{ND:0},function (){});
                }
            });        
        }, 5000);
    });

    // edit pass 
    var chophep = 0 ;
    $("#btn_ChangePass").click(function (e) { 
        if(chophep == 1){
            var passj = $("#passwordnew").val();
            $.post("./ajax/ChangePass",{pass:passj},function(data){
                if(data){
                    alert("đổi mật khẩu thành công");
                    $("#passwordnew").val("");
                    $("#passwordrenew").val("");
                    $("#passwordold").val("");
                }else{
                }
            });
        }else{
            alert("không thể thực hiện lỗi trên màn hình");
        }
    });
    $("#passwordrenew").keyup(function(){
        if($("#passwordrenew").val() != $("#passwordnew").val() ){
            $("#sp_passwordrenew").html("Mật Khẩu Không Khớp");
            chophep = 0 ;
        }else{
            $("#sp_passwordrenew").html("");
            chophep = 1 ;
        }
    });
    $("#passwordold").keyup(function (e) {
        var passj = $("#passwordold").val();
        $.post("./ajax/checkPass",{pass:passj},function(data){
            if(data){
                $("#sp_passwordold").html("");
                chophep = 1 ;
            }
            else{
                $("#sp_passwordold").html("Mật Khẩu Cũ Không Khớp");
                chophep = 0 ;
            }
        });
    });
});