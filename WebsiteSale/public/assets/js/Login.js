(function ($)
{
    $(document).ready(function ()
    {
        $("#submit-login").click(function () {
            var email = $("#email-login").val();
            var password = $("#password-login").val();
            if(email == "" ){
                $("#error-display").text("Email trống !");
                return;
            }
            else if(password == ""){
                $("#error-display").text("Mật khẩu trống !");
                return;
            }
             $.ajax({
                url: 'http://localhost/websitesale/user/login',
                type: 'POST',
                dataType: 'json',
                data: {
                    email: email,
                    password: password
                },
                success:function(data){
                    if(data.status == 'ok'){
                        window.location.href = "http://localhost/websitesale/home/index";
                    }
                    else{
                        $("#error-display").text("Đăng nhập không thành công !");
                    }
                }
            })
        });
    });
})(jQuery);