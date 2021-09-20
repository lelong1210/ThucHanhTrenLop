$(document).ready(function () { 
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
      }
    $("#btn_AddProduct").click(function (e) { 
        var maspj = $("#masp").val();
        var soluongj = $("#soluong").val();
        var tenspj =$("#tensp").val();
        $.post("../ajax/AddProduct",{masp:maspj,soluong:soluongj,tensp:tenspj},function(data){ 
            if(data){
                alert("Thêm Sản Phẩm Thành Công");
            }else{
                alert("Thêm Sản Phẩm Thất Bại");
            }
        });
    });
    $("#btn_deleteProduct").click(function (e) { 
        var maspj = $("#maspdl").val();
        $.post("../ajax/deleteProduct",{masp:maspj},function(data){
            alert(data);
        });
    });
    $("#btn_checkProduct").click(function (e) { 
        var maspj = $("#maspcheck").val();
        $.post("../ajax/CheckProduct",{maspup:maspj},function (data) {
            if(data){
                const obj = JSON.parse(data);
                $("#FormUpdate").slideDown();
                $("#formCheckUpdate").hide();

                $("#maspup").val(obj[0].masp);
                $("#tenspup").val(obj[0].tensp);
                $("#soluongup").val(obj[0].soluong);
    
                $("#btn_updateProduct").click(function (e) {
                    var maspupj = $("#maspup").val();
                    var tenspupj = $("#tenspup").val();
                    var soluongupj = $("#soluongup").val();                  
                    $.post("../ajax/updateProduct",{maspup:maspj,maspchangup:maspupj,tenspup:tenspupj,soluongup:soluongupj},function(data){
                        if(data){
                            maspj = maspupj ;
                            alert("Đã Cập Nhật");
                        }else{
                            alert("Cập Nhật Thất Bại");
                        }
                    });
                });
            }else{
                alert("Khonge ton tai");
            }
        });
    });
    $("#btn_SellcheckProduct").click(function (e) { 
        var spckj = $("#maspSellcheck").val()
        var ck = [] ;
        var arrMain = [];
        var Tien = [];
        var soluongban = [];
        var soluonggoc = [];
        $.post("../ajax/SellProduct",{spcheck:spckj},function(data){
            if(data){
                $("#NutThanhToan").slideDown();
                $("#formCheckSell").hide();
                $.post("../ajax/GetIdCbx",{},function(data){
                    const arr = JSON.parse(data);
                    arrMain = arr ;
                    for (let i = 0; i < arr.length; i++) {
                        ck[i] = 0;
                    }
                    $(":checkbox").click(function (e) {
                        var idx = $(this).attr('id');
                        for (let i = 0; i < arr.length; i++) {
                            if(arr[i] == idx && ck[i] == 0){
                                ck[i] = 1 ;
                            }
                            else if(arr[i] == idx && ck[i] == 1){
                                alert("Bỏ Chọn Mã Sản Phẩm : "+idx);
                                ck[i] = 0 ;
                            }
                        }
                    });
                    $(":text").keyup(function (e) {
                        var idx = $(this).attr('id');
                        for (let i = 0; i < arr.length; i++) {
                            var x = arr[i]+"soluong";
                            if(x == idx){
                                var idthanhtien = "#"+arr[i]+"thanhtien";
                                var idsp = "#"+arr[i]+"sp";
                                var ndspan = $("#"+arr[i]+"soluong").val();
                                if(isNaN(ndspan)){
                                    $(idsp).html("Vui Lòng Nhập Số");
                                }else{
                                    $(idsp).html("");
                                    $.post("../ajax/GetSoluong",{maspSL:arr[i]},function(data){
                                        const obj = JSON.parse(data);
                                        ndspan = parseInt(ndspan);
                                        if(ndspan > obj[0].soluong){
                                            $(idsp).html("Không Đủ Số Lượng Chỉ Còn Lại "+obj[0].soluong+" Sản Phẩm");
                                            $(idthanhtien).html("");
                                            
                                        }else{
                                            soluongban[i] = ndspan;
                                            $(idsp).html("");
                                            const number = formatNumber(ndspan*1000)
                                            $(idthanhtien).html(formatNumber(ndspan*1000) +" vnd");
                                            Tien[i] = ndspan*1000;
                                            soluonggoc[i] = obj[0].soluong;
                                        }
                                    });
                                }
                            }
                        }                        
                    });
                });
                $("#taheee").html(data);
                $("#thanhtoan").click(function (e) { 
                   var TongTien = 0 ;
                   for (let i = 0; i < ck.length; i++) {
                       if(ck[i] == 1){
                            var maspsej = arrMain[i];
                            var slbansej = soluongban[i];
                            var dongiasej = Tien[i];
                            TongTien = TongTien + parseInt(Tien[i]) ;
                            $.post("../ajax/InsertIntoHd",{maspse:maspsej,slbanse:slbansej,dongiase:dongiasej},function(data){});
                            if(slbansej <= soluonggoc[i]){
                                var soluongupj = soluonggoc[i] - slbansej;
                                $.post("../ajax/updateProductex",{maspupt:maspsej,soluongupt:soluongupj},function(data){
                                    $(":text").val("");
                                });
                            }                            
                       }                   
                   }
                   TongTien = TongTien*1000;
                   var Tong = formatNumber(TongTien);
                   alert("Tong Tien Thanh Toan La : =>"+Tong+" vnd");
                });
            }else{
                alert("Không Tồn Tại Sản Phẩm");
            }
        });
    });

});
