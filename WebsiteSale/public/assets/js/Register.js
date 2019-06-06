(function ($)
{
    $(document).ready(function ()
    {
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        function validateVietnameseName(name) {
            var firstLetter = "[A-EGHIK-VXYÂĐỔÔÚỨ]".normalize("NFC"),
                    otherLetters = "[a-eghik-vxyàáâãèéêìíòóôõùúýỳỹỷỵựửữừứưụủũợởỡờớơộổỗồốọỏịỉĩệểễềếẹẻẽặẳẵằắăậẩẫầấạảđ₫]".normalize("NFC"),
                    regexString = "^"
                    + firstLetter + otherLetters + "+\\s"
                    + "(" + firstLetter + otherLetters + "+\\s)*"
                    + firstLetter + otherLetters + "+$",
                    regexPattern = RegExp(regexString);
            if (regexPattern.test(name.normalize("NFC"))) {
                return true;
            } else {
                return false
            }
        }
        function isAddress(address) {
            var regex = /^[0-9\-\(\)\s]+$/;
            return regex.test(address);
        }

        function isPhone(phone) {
            var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return regex.test(phone);
        }

        $("#click-login").click(function () {
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
            //address
            var province = $("#province-select-address").val();
            var district = $("#district-select-address").val();
            var ward = $("#ward-select-address").val();
            var street = $("#street-register").val();
            
            var email = $("#email-register").val();
            var password = $("#password-register").val();
            var repassword = $("#password-again").val();
            var check = true;
            if (name == "") {
                $("#error-display-name").text("Vui lòng nhập họ tên !");
                check = false;
            }else if (!validateVietnameseName(name)) {
                $("#error-display-name").text("Kiểm tra lại họ tên !");
                check = false;
            } else {
                $("#error-display-name").text("");
            }
            
            if(province == ''){
                $("#error-display-address").text("Vui lòng nhập tỉnh và thành phố ... !");
                check = false;
            }else if(district == ''){
                $("#error-display-address").text("Vui lòng nhập quận, huyện ... !");
                check = false;
            }else if(ward == ''){
                $("#error-display-address").text("Vui lòng nhập xã,phường ... !");
                check = false;
            }else if(street == ''){
                $("#error-display-address").text("Vui lòng nhập số nhà, tên đường ... !");
                check = false;
            }else {
                $("#error-display-address").text("");
            }
            
            //check phone
            if (phone == "") {
                $("#error-display-phone").text("Vui lòng nhập số điện thoại !");
                check = false;
            } else if (!isPhone(phone)) {
                $("#error-display-phone").text("Số điện thoại không hợp lệ !");
                check = false;
            } else {
                $("#error-display-phone").text("");
            }
          
            //check email
            if (email == "") {
                $("#error-display-email").text("Vui lòng nhập địa chỉ email !");
                check = false;
            } else if (!isEmail(email)) {
                $("#error-display-email").text("Email không đúng định dạng !");
                check = false;
            } else {
                $("#error-display-email").text("");
            }
            //check passwrod
            if (password == "") {
                $("#error-display-password").text("Vui lòng nhập mật khẩu !");
                check = false;
            } else if (password.length < 6) {
                $("#error-display-password").text("Mật khẩu ít nhất 6 kí tự !");
                check = false;
            } else {
                $("#error-display-password").text("");
            }
            //check repassword
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
            var address = street + " , " + ward + " , " + district + " , " + province;
            $.ajax({
                url: 'http://localhost/websitesale/user/register',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name,
                    phone: phone,
                    address : address,
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