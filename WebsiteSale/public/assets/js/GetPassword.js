(function ($)
{
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $(document).ready(function ()
    {

        $("#change-continue-pass").click(function () {
            var confirm = $('#number-confirm').val();
            if (confirm == '') {
                $('#error-display-confirm').text('Vui lòng nhập vào mã số xác nhận !');
                return;
            }
            $.ajax({
                url: 'http://localhost/websitesale/user/confirmcode',
                type: 'POST',
                dataType: 'json',
                data: {
                    confirm: confirm
                },
                success: function (data) {
                    if (data.status == 'ok') {
                        window.location.href = "http://localhost/websitesale/user/change-password";
                    } else {
                        $('#error-display-confirm').text(data.mess);
                        return;
                    }
                }
            })

        });
        $("#submit-forgot").click(function () {
            $("#error-display-forgot").text("");
            var email = $("#email-password").val();
            if (email == "") {
                $("#error-display-forgot").text("Vui lòng nhập email !");
                return;
            } else if (!isEmail(email)) {
                $("#error-display-forgot").text("Kiểm tra lại email !");
                return;
            }
            $(".wating_moment").css("display", "block");
            $.ajax({
                url: 'http://localhost/websitesale/user/sendcode',
                type: 'POST',
                dataType: 'json',
                data: {
                    email: email
                },
                success: function (data) {
                    if (data.status == 'ok') {
                        $(".recover__email").text(email);
                        window.location.href = "http://localhost/websitesale/user/sendcode";
                    } else {
                        $(".wating_moment").css("display", "none");
                        $("#error-display-forgot").text("Email chưa được đăng ký !");
                    }
                }
            })
        });
        $("#btn_continue_change").click(function () {
            var password = $("#recover-password").val();
            var rePassword = $("#recover-password-again").val();
            if (password == "") {
                $("#reco-password").text("Mật khẩu trống !");
                return;
            } else if (password.length < 6) {
                $("#reco-password").text("Mật khẩu ít nhất 6 kí tự !");
                return
            } else {
                $("#reco-password").text("");
            }
            if (rePassword == "") {
                $("#reco-password-again").text("Xác nhận mật khẩu trống !");
                return;
            } else if (rePassword != password) {
                $("#reco-password-again").text("Mật khẩu không khớp !");
                return;
            } else {
                $("#reco-password-again").text("");
            }
            $.ajax({
                url: 'http://localhost/websitesale/user/changepassword',
                type: 'POST',
                dataType: 'json',
                data: {
                     password: password
                },
                success: function (data) {
                    if (data.status == 'ok') {
                         window.location.href = "http://localhost/websitesale/home/index";
                    } else {
                        alert('Error');
                    }
                }
            })
        })

    });
})(jQuery);