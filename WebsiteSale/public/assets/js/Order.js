(function ($)
{
    $(document).ready(function ()
    {
        function ParseStringFormatToInt(val){//ham nay truyen vao so tien so dang da format vd 2.134.000đ sẽ return về int 2134000
            var strtemp=val.substr(0,val.length-1);
            var strTongTien="";
            var strSplit=strtemp.split(',');
            jQuery.each(strSplit,function(i,val){
                strTongTien+=val;
            });
            return parseInt(strTongTien);
        }
        function FormatIntToString(num){//ham này truyền về số int vd 2882418 sẽ format về dạng tiền 2,882,418đ 
            var ttTien=num.toString();
            var idChen=ttTien.length-3;
            while(idChen>0){
                ttTien=ttTien.substr(0,idChen)+","+ttTien.substr(idChen);
                idChen-=3;
            }
            var showTT=ttTien+"đ";
            return showTT;
        }
        function TangSoSanPhamStr(valStr,sl){//hàm này chuyền vào số sản phẩm vd "1 Sản Phẩm" sẽ return về 2
            $idRun=0;
            while(valStr.charCodeAt($idRun)>=48&&valStr.charCodeAt($idRun)<=57)$idRun=$idRun+1;
            var strNumSp=valStr.substr(0,$idRun);
            var numberSP=parseInt(strNumSp);
            numberSP+=sl;
            return numberSP.toString();
        }//abcd4
        function GetIDSanPham(valStr){// hàm này trả về id của item trong giỏ hàng vd valStr="id_item_1" thì sẽ return 1;
            $idRun=valStr.length-1;
            while(valStr.charCodeAt($idRun)>=48&&valStr.charCodeAt($idRun)<=57)$idRun=$idRun-1; $idRun=$idRun+1;
            return valStr.substr($idRun,valStr.length-$idRun);
        }
        function GetTongTien($arr){
            var numTongTienCur=0;
            jQuery.each( $arr, function( i, val ) {
                numTongTienCur+=ParseStringFormatToInt(val.price)*parseInt(val.quantity);
            });
            return numTongTienCur;
        }
        var parentListGioHang=$(document).find('.listProductInCart');
        var itemHangMua=$(document).find('.product__item');
        var allItem=itemHangMua.find('.product__link');
        
        $(".box-product__button").click(function () {
           
           var idsp=$(this).attr('id');
           var numId=idsp.substr(4,idsp.length-4);//pro_
           var namePro=$("#pro_name_"+numId).text();
           var pricePro=$("#pro_price_"+numId).text();
           var imageSources=$("#pro_Image_"+numId).attr("src");
            $.ajax({
                url: 'http://localhost/websitesale/shopping/order',// /orderdeteal
                type: 'POST',
                dataType: 'json',
                data: {
                    id: numId,
                    name: namePro,
                    price: pricePro,
                    image: imageSources
                },
                success: function (data) {
                    if(data.status == 'ok'){
                        if(data.cart.length==1){
                            $(".cart_order").empty();
                            $(".cart_order").append("<div class='product__show'>"+
                            "<ul class='product__list'>"+
                                
                            "</ul>"+
                            "<div class='product__sum'>"+
                                "<p class='product__sum-span'>Tổng tiền:<span class='number txtTongTien'>"+FormatIntToString(ParseStringFormatToInt(data.cart[0].price)*parseInt(data.cart[0].quantity))+"</span></p>"+
                            "</div>"+
                            "<div class='product__buttons'><a href='#' class='product__button'>Xem giỏ hàng</a><a href='#' class='product__button'>Thanh toán </a></div>"+
                        "</div>");
                        }
                        
                        $(".product__list").empty();
                        jQuery.each( data.cart, function( i, val ) {
                            $(".product__list").append( "<li class='product__item' id='id_item_"+val.id+"'> "+
                            "<figure class='product__image'><img src='"+val.image+"' class='product__photo' /><a href='javascript:void(0)' class='product__icon'><i class='fas fa-times'></i></a></figure>" +
                            "<div class='product__content'><a href='#' class='product__link'>"+val.name+"</a>"+
                                "<div class='product__total'><span class='product__price'>"+val.price+"</span><span class='product__quantity'>x"+val.quantity+" </span></div>"+
                            "</div>"+
                            "</li> ");
                            //$( ".product__icon" ).trigger( 'click' );
                          });
                         alert("chuyen format="+FormatIntToString(GetTongTien(data.cart)));
                         $(".txtTongTien").text(FormatIntToString(GetTongTien(data.cart)));
                          
                          if(data.newOrder=='ok'){
                            $("#txtNumSanPham").text(TangSoSanPhamStr($("#txtNumSanPham").text(),1)+" Sản phẩm");
                            }
                            
                    }
                }
                
            })
            
        })
         $(document).delegate(".product__icon", "click", function() {
            $(this).parents('.product__item').fadeOut();
            var numId=GetIDSanPham($(this).parents('.product__item').attr('id'));
            $.ajax({
             url: 'http://localhost/websitesale/shopping/deletecart',
             type: 'POST',
             dataType: 'json',
             data: {
                 id: numId
             },
             success: function (data) {
                 if(data.status == 'ok'){
                     alert("xoa san pham thanh cong");
                     $(".product__list").empty();
                    jQuery.each( data.cart, function( i, val ) {
                        $(".product__list").append( "<li class='product__item' id='id_item_"+val.id+"'> "+
                        "<figure class='product__image'><img src='"+val.image+"' class='product__photo' /><a href='javascript:void(0)' class='product__icon'><i class='fas fa-times'></i></a></figure>" +
                        "<div class='product__content'><a href='#' class='product__link'>"+val.name+"</a>"+
                            "<div class='product__total'><span class='product__price'>"+val.price+"</span><span class='product__quantity'>x"+val.quantity+" </span></div>"+
                        "</div>"+
                        "</li> ");
                        });
                     $("#txtNumSanPham").text(TangSoSanPhamStr($("#txtNumSanPham").text(),-1)+" Sản phẩm");
                     $(".txtTongTien").text(FormatIntToString(GetTongTien(data.cart)));
                 }
             }
         })
         });
    });
})(jQuery);
//fa-times      'deletecart'    product__link