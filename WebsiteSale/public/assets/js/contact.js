(function ($)
{
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    function isPhone(phone) {
        var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        return regex.test(phone);
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
    $(document).ready(function ()
    {
        $(".contact__form").submit(function () {
            var name = $("#fullname").val();
            var address = $("#address").val();
            var phone = $("#telephone").val();
            var email = $("#email").val();
            var content = $("#content").val();
            if (!validateVietnameseName(name)) {
                $("#error_fullname").text('Kiểm tra lại họ và tên !');
                return false;// khong load lại page nữa
            } else {
                $("#error_fullname").text('');
            }
            if (!isPhone(phone)) {
                $("#error_telephone").text('Kiểm tra lại số điện thoại !');
                return false;// khong load lại page nữa
            } else {
                $("#error_telephone").text('');
            }
            if (!isEmail(email)) {
                $("#error_email").text('Email không đúng định dạng !');
                return false;// khong load lại page nữa
            } else {
                $("#error_email").text('');
            }
            if (content.length < 8) {
                $("#error_content").text('Nội dung ít nhất 8 kí tự !');
                return false;// khong load lại page nữa
            }else {
                $("#error_content").text('');
            }
            return true;
        });
        $(".contact__button--cancel").click(function () {
            window.location.href = "http://localhost/websitesale/home/index";
        })
    });
})(jQuery);