<section class="recover recover-password">
        <div class="recover__component">
            <h2 class="recover__title">Chọn mật khẩu mới</h2>
            <div class="recover__content">
                <div class="recover__des">Mật khẩu mạnh được kết hợp bởi chữ và dấu câu. Mật khẩu phải có ít nhất 6 ký tự.</div>
                <div class="recover__list-form">
                    <div class="recover__form-group"><label for="recover-password" class="recover__label">Mật khẩu mới</label><input id="recover-password" type="password" name="recover-password" minlength="6" required="required" class="recover__input form-control" /></div>
                    <p class="error-display error-display-change" id="reco-password"></p>
                    <div class="recover__form-group"><label for="recover-password-again" class="recover__label">Nhập lại mật khẩu</label><input id="recover-password-again" type="password" name="recover-password-again" minlength="6" required="required" class="recover__input form-control" /></div>
                    <p class="error-display error-display-change" id="reco-password-again"></p>
                </div>
            </div>
            <div class="recover__bottom"><button type="submit" class="btn btn-primary" id="btn_continue_change">Tiếp tục</button><a href="<?php echo getFullHost() . "/user/cancel" ?>" class="btn btn-outline-secondary">Bỏ qua</a></div>
        </div>
</section>