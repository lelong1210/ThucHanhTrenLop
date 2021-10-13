$(document).ready(function () {
    $("#reLoad").click(function (e) { 
        $.post("./ajax/showAllStudent",{},function(data){
            $("#con").html(data);
        });
    });
    $("#An").click(function (e) { 
        $("#con").html("An");
    });
    $("#Hien").click(function (e) { 
        $.post("./ajax/showAllStudent",{},function(data){
            $("#con").html(data);
        });
    });


    /*******************THEM***********************/
    $("#showinputThem").click(function (e) { 
        $("#inputSV").slideDown();
    });
    $("#them").click(function (e) { 
        var tenthisinh = $("#tenthisinhthem").val();
        var ngaysinh = $("#ngaysinhthem").val();	
        var quequan	= $("#quequanthem").val();
        var tongdiem = $("#tongdiemthem").val();
        if(tenthisinh == "" || ngaysinh == "" || quequan == "" || tongdiem == ""){
            alert("cac o khong duoc de trong");
        }else{
            $.post("./ajax/addStudents",{tenthisinh:tenthisinh,ngaysinh:ngaysinh,quequan:quequan,tongdiem:tongdiem},function(data){
                if(data){
                    alert("da them");
                    $("#inputSV").slideUp();
                    $.post("./ajax/showAllStudent",{},function(data){
                        $("#con").html(data);
                    });
                    $("#tenthisinhthem").val("");
                    $("#ngaysinhthem").val("");	
                    $("#quequanthem").val("");
                    $("#tongdiemthem").val("");
                    $("#khoathem").val("");
                    $("#trangthaithem").val("");
                }else{
                    alert("that bai");
                    $("#inputSV").slideUp();
                }
            });
        }
    });
    /*******************XOA***********************/
    $("#showinputXoa").click(function (e) { 
        $("#inputXoa").slideDown();
    });
    $("#xoa").click(function (e) { 
        var masv = $("#mathisinhxoa").val();
        $.post("./ajax/deleteStudent",{masv:masv},function(data){
            if(data){
                alert("da xoa");
                $("#inputXoa").slideUp();
                $("#idxoa").val("");
                $.post("./ajax/showAllStudent",{},function(data){
                    $("#con").html(data);
                });
            }else{
                alert("that bai");
                $("#inputXoa").slideUp();
            }
        });
    });
    /*******************SUA***********************/
    $("#showinputSua").click(function (e) { 
        $("#inputSua").slideDown();
        // alert("ooo");
    });
    $("#suaWhere").click(function (e) { 
        var masv = $("#suaTai").val();
        $.post("./ajax/selectOneStudents",{masv:masv},function(data){
            if(data){
                $("#formSua").html(data);
                $("#sua").click(function (e) { 
                    Update(masv);
                });
            }else{
                alert("khong ton taiiiiiiiiiiiii");
            }
        });
    });
    function Update(masv){
        var tenthisinh = $("#tenthisinhsua").val();
        var ngaysinh = $("#ngaysinhsua").val();	
        var quequan	= $("#quequansua").val();
        var tongdiem = $("#tongdiemsua").val();
        if(tenthisinh == "" || ngaysinh == "" || quequan == "" || tongdiem == ""){
            alert("cac o khong duoc de trong");
        }else{
            // alert(tenthisinh + ngaysinh + quequan + tongdiem + khoa + trangthai);
            $.post("./ajax/updateStudents",{masv:masv,tenthisinh:tenthisinh,ngaysinh:ngaysinh,quequan:quequan,tongdiem:tongdiem},function(data){
                if(data){
                    alert("da sua");
                    $("#inputSua").slideUp();
                    $.post("./ajax/showAllStudent",{},function(data){
                        $("#con").html(data);
                    });
                    $("#tenthisinhsua").val("");
                    $("#ngaysinhsua").val("");	
                    $("#quequansua").val("");
                    $("#tongdiemsua").val("");

                    $("#formSua").html("");
                }else{
                    alert("that bai");
                    $("#inputSua").slideUp();
                }
            });
        }
    }
     /*******************TIM KIEM***********************/
    $("#showinputTimKiem").click(function (e) { 
        $("#inputTimKiem").slideDown();
    });
    $("#timkiem").click(function (e) { 
        var timkiem = $("#timkiemWhere").val();
        $.post("./ajax/selectOneStudentsWhereTongDiem",{tongdiemtim:timkiem},function(data){
            if(data){
                $("#con").html(data);
                $("#inputTimKiem").slideUp();
                $("#timkiemWhere").val("");
            }else{
                alert("khong ton tai that bai");
                $("#inputTimKiem").slideUp();
            }
        });
    });
});