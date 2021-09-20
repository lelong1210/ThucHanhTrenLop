$(document).ready(function () {
    XuLy() ;
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
      }
    $("#btn_ThemSanPham").click(function (e) { 
        var maspj = $("#input_ThemSanPham").val();
        $.post("../ajax/KiemTraVaLayThongTin",{maspgh:maspj},function (data) {
            if(data){
                const obj = JSON.parse(data);
                var tenspj = obj[0].tensp;
                var soluongj = 1;
                var donggiaj = Math.floor(Math.random() * 10000) + 1000 ;
                    $.post("../ajax/SelectGioHang",{masp:maspj},function(data){
                        if(data.length > 2){
                            const obj = JSON.parse(data);
                            soluongj = parseInt(obj[0].soluong) + 1 ;
                            $.post("../ajax/CapNhatGioHang",{masp:maspj,soluong:soluongj},function(data){});
                            XuLy();
                        }else{
                            $.post("../ajax/ThamSanPhamGioHang",{masp:maspj,tensp:tenspj,soluong:soluongj,dongia:donggiaj},function(data){});
                            XuLy();
                        }
                    })
            }else{
                alert("khong ton tai");
            }
        });
    });

    function XuLy() {
        $.post("../ajax/SelectAllGioHang",{},function(data){
            $("#content").html(data);
            $.post("../ajax/GetIdCbxGioHang",{},function(data){
                var ckbox = [];
                let arr = JSON.parse(data);
                for (let i = 0; i < arr.length; i++) {
                    ckbox[i] = 0 ;
                }
                $(":checkbox").click(function (e) {
                    var IdCheckBox = $(this).attr('id');
                    for (let i = 0; i < arr.length; i++) {
                        var IdCK = arr[i];
                        if(IdCheckBox == IdCK){ 
                            if(ckbox[i] == 0){
                                ckbox[i] = 1 ;
                            }
                            else if(ckbox[i] == 1){
                                ckbox[i] = 0 ;
                            }
                        }
                    }
                });
                $("input").keyup(function (e) {
                    var id = $(this).attr('id'); 
                    if($(this).val() == '' || $(this).val() == '0'){
                        $(this).val(1);
                    }else{
                        for (let i = 0; i < arr.length; i++) {
                            if(id == (arr[i]+"Valuesoluong")){
                                var dongia = parseInt($("#"+arr[i]+"dongia").html());
                                var masp = arr[i];
                                var soluong = parseInt($(this).val());
                                var idspan = arr[i]+"loisoluong";
                                KiemTraSoLuongKhaThiT(masp,soluong,idspan,dongia);
                            }
                        }
                    }
                });
                $("button").click(function() {
                    var buttonClick = $(this).attr('id');
                    for (let i = 0; i < arr.length; i++) {
                        var dongia = $("#"+arr[i]+"dongia").html();
                        var valuebtnT = arr[i]+"tang" ;
                        var valuebtnG = arr[i]+"giam" ;
                        if(buttonClick == valuebtnT){
                            var valueSoluong = $("#"+arr[i]+"Valuesoluong").val();
                            valueSoluong = parseInt(valueSoluong) + 1 ;
                            KiemTraSoLuongKhaThiT(arr[i],valueSoluong,arr[i]+"loisoluong",dongia);                       
                        }
                        if(buttonClick == valuebtnG){
                            var valueSoluong = $("#"+arr[i]+"Valuesoluong").val();
                            valueSoluong = parseInt(valueSoluong) - 1 ;
                            if(valueSoluong <= 0){
                                var r = confirm("Sản Phẩm Sẽ Bị Xóa");
                                if (r == true) {
                                    $("#"+arr[i]+"Row").remove();
                                    $.post("../ajax/XoaSanPhamGioHang",{masp:arr[i]},function(data){});
                                    ckbox[i] = 0 ;
                                } else {

                                }
                            }else{
                                $("#"+arr[i]+"Valuesoluong").val(valueSoluong);
                                var ThanhTienvalueSoluong = parseInt(valueSoluong)*parseInt(dongia);
                                $("#"+arr[i]+"thanhtien").html(ThanhTienvalueSoluong+" vnd"); 
                                $.post("../ajax/CapNhatGioHang",{masp:arr[i],soluong:valueSoluong},function(data){});
                            }                  
                        }
                    }
                });
                $("span").click(function (e) {
                    var idSpanXoa = $(this).attr('id');
                    for (let i = 0; i < arr.length; i++) {
                        var idSpanDL = arr[i]+"xoa";
                        if(idSpanXoa == idSpanDL){
                            $("#"+arr[i]+"Row").remove();
                            $.post("../ajax/XoaSanPhamGioHang",{masp:arr[i]},function(data){});
                            ckbox[i] = 0 ;
                        }
                    }
                });
                $("#btn_ThanhToan").click(function (e) { 
                    var TongTien = 0 ;
                    for (let i = 0; i < arr.length; i++) {
                        if(ckbox[i] == 1){
                            var valueSoluong = $("#"+arr[i]+"Valuesoluong").val();
                            valueSoluong = parseInt(valueSoluong);
                            var dongia = $("#"+arr[i]+"thanhtien").html();
                            dongia = parseInt(dongia);
                            TongTien = TongTien + dongia ;
                            //alert("quyet dinh mua san cac san pham "+arr[i]+" so luong = "+valueSoluong +" thanh tien "+dongia);
                            $.post("../ajax/InsertIntoHd",{maspse:arr[i],slbanse:valueSoluong,dongiase:dongia},function (data) {
                                if(data){
                                    $("#"+arr[i]+"Row").remove();
                                    $.post("../ajax/XoaSanPhamGioHang",{masp:arr[i]},function(data){});
                                    ckbox[i] = 0 ;
                                    CapNhapSanPham(arr[i],valueSoluong);
                                }else{
                                    alert("Vui Long Thu Lai");
                                }
                            });
                        }
                    }
                    alert("Cảm Ơn Bạn Đã Mua Hàng Tổng Số Tiền Là : "+formatNumber(TongTien)+" vnd");
                });
            });
        });
    }
    function KiemTraSoLuongKhaThiT(masp,soluong,idpsan,dongia){
        $.post("../ajax/GetSoluong",{maspSL:masp},function(data){
            const obj = JSON.parse(data);
            soluong = parseInt(soluong);
            soluongGoc= parseInt(obj[0].soluong);
            if(soluong > soluongGoc){
                $("#"+idpsan).html("<br>Không Đủ Số Lượng Chỉ Còn Lại "+obj[0].soluong+" Sản Phẩm");               
            }else{
                $("#"+idpsan).html("");
                $("#"+masp+"Valuesoluong").val(soluong);
                var ThanhTienvalueSoluong = parseInt(soluong)*parseInt(dongia);
                $("#"+masp+"thanhtien").html(ThanhTienvalueSoluong+" vnd");  
                $.post("../ajax/CapNhatGioHang",{masp:masp,soluong:soluong},function(data){}); 
            }
        });
    }
    function CapNhapSanPham(masp,soluong){
        $.post("../ajax/GetSoluong",{maspSL:masp},function(data){
            const obj = JSON.parse(data);
            soluong = parseInt(soluong);
            soluongGoc= parseInt(obj[0].soluong);
            var soluongsaucung = soluongGoc - soluong;
            $.post("../ajax/updateProductex",{maspupt:masp,soluongupt:soluongsaucung},function(data){});
        });
    }

});
