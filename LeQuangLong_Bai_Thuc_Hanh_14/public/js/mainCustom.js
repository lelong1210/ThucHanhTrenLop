/*****************CUSTOM************************/
$(document).ready(function () {
    // ==> gui mail 
    $("#sendMail").click(function (e) { 
        var diachigui = $("#diachimail").val();
        var tieude = $("#tieude").val();
        var bodyconten = $("#noidung").val();
        var linkanh = uploadImg();
        if(linkanh){
            if(guiMail(tieude,diachigui,bodyconten,linkanh)){
                alert("đã gửi mail");
            }else{
                alert("gửi mail thất bại");
            }
        }else{
            alert("gửi mail thất bại");
        }

        
    });
    // function support 
    function uploadImg(){
        var fd = new FormData();
        var files = $('#linkduongdananh')[0].files[0];
        fd.append('file', files);
        var result = "";
        $.ajax({
            url: "./ajax/uploadfile",
            type: 'post',
            async:false,
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                result = response;
            },
        });
        return result;
    }
    function guiMail(tieude,diachigui,bodyconten,linkanh){
        var result = "";
        $.ajax({
            type: "post",
            async:false,
            url: "./ajax/GuiMail",
            data: {tieude:tieude, 
                diachigui:diachigui,
                bodyconten:bodyconten,
                linkanh:linkanh
            },
            success: function (response) {
                result = response;
            }
        });
        return result;
    }
});




/*        $.each(arr, function (indexInArray, valueOfElement) {
             alert(JSON.stringify(valueOfElement));
        });*/
