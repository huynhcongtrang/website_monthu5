(function ($)
{
    $(document).ready(function ()
    {
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        function isName(name) {
            var regex = /^[a-zA-Z]+$/;
            return regex.test(name);

        }
        function isAddress(address) {
            var regex = /^[0-9\-\(\)\s]+$/;
            return regex.test(address);
        }

        function isPhone(phone) {
            var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return regex.test(phone);
        }


        $(".mfp-close").click(function () {
            $("#error-display-name").text("");
            $("#error-display-email").text("");
            $("#error-display-address").text("");
            $("#error-display-phone").text("");
            $("#error-display-password").text("");
            $("#error-display-repassword").text("");
            $("#error-display-repassword").text("");
            $("#error-display-login").text("");
            $(".annount-cong").text("");
            $("#email-login").val("");
        })
        $("#submit-register").click(function () {

            var name = $("#name-register").val();
            var phone = $("#phone-register").val();
            var address = $("#address-register").val();
            var email = $("#email-register").val();
            var password = $("#password-register").val();
            var repassword = $("#password-again").val();
            var check = true;
            if (name == "") {
                $("#error-display-name").text("Vui lòng nhập họ tên !");
                check = false;
            } else {
                $("#error-display-name").text("");
            }
            if (phone == "") {
                $("#error-display-phone").text("Vui lòng nhập số điện thoại !");
                check = false;
            } else if (!isPhone(phone)) {
                $("#error-display-phone").text("Số điện thoại không hợp lệ !");
                check = false;
            } else {
                $("#error-display-phone").text("");
            }
            if (address == "") {
                $("#error-display-address").text("Vui lòng nhập địa chỉ !");
                check = false;
            } else {
                $("#error-display-address").text("");
            }
            if (email == "") {
                $("#error-display-email").text("Vui lòng nhập địa chỉ email !");
                check = false;
            } else if (!isEmail(email)) {
                $("#error-display-email").text("Email không hợp lệ !");
                check = false;
            } else {
                $("#error-display-email").text("");
            }
            if (password == "") {
                $("#error-display-password").text("Vui lòng nhập mật khẩu !");
                check = false;
            } else if (password.length < 6) {
                $("#error-display-password").text("Mật khẩu ít nhất 6 kí tự !");
                check = false;
            } else {
                $("#error-display-password").text("");
            }
            if (repassword == "") {
                $("#error-display-repassword").text("Vui lòng nhập lại mật khẩu !");
                check = false;
            } else if (repassword != password) {
                $("#error-display-repassword").text("Nhập lại mật khẩu không đúng !");
                check = false;
            } else {
                $("#error-display-repassword").text("");

            }
            if (check == false) {
                return;
            }
            $.ajax({
                url: 'http://localhost/websitesale/user/register',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name,
                    phone: phone,
                    address: address,
                    email: email,
                    password: password
                },
                success: function (data) {
                    if (data.status == 'ok') {
                        $('#click-login').trigger('click');
                        $(".annount-cong").text("Hãy đăng nhập đi nào !");
                        $("#email-login").val(email);
                    } else {
                        if (data.check == 3) {
                            $("#error-display-email").text("Email đã tồn tại !");
                            $("#error-display-phone").text("Số điện thoại đã tồn tại !");
                        }
                        if (data.check == 1) {
                            $("#error-display-email").text("Email đã tồn tại !");
                        }
                        if (data.check == 2) {
                              $("#error-display-phone").text("Số điện thoại đã tồn tại !");
                        }
                    }
                }
            })
        })

    });
})(jQuery);