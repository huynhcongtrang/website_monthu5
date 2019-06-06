(function ($)
{

    $(document).ready(function ()
    {
        $(".box-product__button").click(function () {
            var idProTemp = $(this).attr("id")
            var idPro = idProTemp.substr(4,idProTemp.length -4  );
            var idTagPro = "#pro_name_"+idPro;
            var namePro = $(idTagPro).text();
            alert(namePro);
            
        });
    });
})(jQuery);