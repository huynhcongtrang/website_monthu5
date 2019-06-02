(function ($)
{
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $(document).ready(function ()
    {
        $("#submit-login").click(function () {
            $("#error-display-login").text("");
            var email = $("#email-login").val();
            var password = $("#password-login").val();
            if (email == "") {
                $("#error-display-login").text("Email trống !");
                return;
            } else if (!isEmail(email)) {
                $("#error-display-login").text("Kiểm tra lại email !");
                return;
            } else if (password == "") {
                $("#error-display-login").text("Vui lòng nhập mật khẩu !");
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
                success: function (data) {
                    if (data.status == 'ok') {
                        window.location.href = "http://localhost/websitesale/home/index";
                    } else {
                        $("#error-display-login").text("Đăng nhập không thành công !");
                    }
                }
            })
        });
    });
})(jQuery);