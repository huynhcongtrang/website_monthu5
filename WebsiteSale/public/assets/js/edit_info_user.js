(function ($)
{
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
    function isPhone(phone) {
        var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        return regex.test(phone);
    }
    $(document).ready(function () {
        $(".account__form").submit(function () {
            var fullName = $("#fullname").val();
            var phone = $("#phone").val();
            //valid full nam
            if (!validateVietnameseName(fullName)) {
                $("#error-display-name").text("Kiểm tra họ tên !");
                return false;
            } else {
                $("#error-display-name").text("");
            }
            //valid full phone
            if (!isPhone(phone)) {
                $("#error-display-phone").text("Kiểm tra lại số điện thoại !");
                return false;
            } else {
                $("#error-display-phone").text("");
            }

            //address
            var address = '';
            var province = $("#province-select-address").val();
            if (province != '') {
                var district = $("#district-select-address").val();
                var ward = $("#ward-select-address").val();
                var street = $("#street-address").val();
                if (district == '') {
                    $("#error-display-address").text("Vui lòng nhập quận, huyện ... !");
                    return false;
                } else if (ward == '') {
                    $("#error-display-address").text("Vui lòng nhập xã,phường ... !");
                    return false;
                } else if (street == '') {
                    $("#error-display-address").text("Vui lòng nhập số nhà, tên đường ... !");
                    return false;
                } else {
                    $("#error-display-address").text("");
                }
                address = street + " , " + ward + " , " + district + " , " + province;
            }
            if (address == '') {
                address = $(".address_dis").text();
            }

            $.ajax({
                url: 'http://localhost/websitesale/user/update',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: fullName,
                    phone: phone,
                    address: address
                },
                success: function (data) {
                    if (data.status == 'ok') {
                        $(".name-dis").text(fullName);
                        $(".address_dis").text(address);
                        $(".phone_dis").text(phone);
                         $('.close').trigger('click');
                    } else {
                        if (data.message == 'not_login') {
                            window.location.href = "http://localhost/websitesale/home/index";
                        }else if(data.message == 'exit_phone'){
                            $("#error-display-phone").text("Số điện thoại đã tồn tại !");
                        }
                    }
                }
            });
            return false;

        });
        $(".btn-secondary").click(function () {
            $("#fullname").val($(".name-dis").text());
            $("#phone").val($(".phone_dis").text());
        });
    });
})(jQuery);