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
                alert("Không tồn tại");
            }
        });
    });  
    $("#btn_SellcheckProduct").click(function (e) { 
        var maspOrTensp = $("#maspSellcheck").val();
        $.post("../ajax/SellProduct",{spcheck:maspOrTensp},function(data){
            $("#ShowTable").html(data);
            $("#NutThanhToan").slideDown();
            $(":checkbox").click(function (e) { 
                alert($(this).attr('id'));
            });
            $("button").click(function (e) { 
                var maspj = $(this).attr('id')
                var tenspj = $("#"+maspj+"tensp").html();
                var soluongconlai = $("#"+maspj+"sohangconlai").html();
                var soluongj = 1 ;
                $.post("../ajax/SelectGioHang",{masp:maspj},function(data){
                    if(data.length > 2){
                        const obj = JSON.parse(data);
                        soluongj = parseInt(obj[0].soluong) + 1 ;
                        $.post("../ajax/CapNhatGioHang",{masp:maspj,soluong:soluongj},function(data){
                            if(data){
                                soluongconlai = parseInt(soluongconlai) - 1 ;
                                $("#"+maspj+"sohangconlai").html(soluongconlai);
                                CapNhapSanPham(maspj,1);
                                alert("Đã Cập Nhật Vào Giỏ Hàng");
                            }
                        });
                    }else{
                        var donggiaj = Math.floor(Math.random() * 10000) + 1000 ;
                        $.post("../ajax/ThamSanPhamGioHang",{masp:maspj,tensp:tenspj,soluong:soluongj,dongia:donggiaj},function(data){
                            if(data){
                                soluongconlai = parseInt(soluongconlai) - 1 ;
                                $("#"+maspj+"sohangconlai").html(soluongconlai);
                                CapNhapSanPham(maspj,1);
                                alert("Đã Thêm Mới Vào Giỏ Hàng"); 
                            }
                        });
                    }
                })
            });
        }); 
        $("#formCheckSell").slideUp();
    });
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