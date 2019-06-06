<<<<<<< HEAD
<script src="<?php echo public_url() ?>/assets/js/sendcode.js"></script>
=======
>>>>>>> a777fc04dc6bfcdf0c5eea2a773841a6c950ca12
<section class="recover send-code">
    <div class="recover__component">
        <h2 class="recover__title">Nhập mã bảo mật</h2>
        <div class="recover__content">
            <div class="recover__des">Vui lòng kiểm tra tin nhắn có chứa mã trong thư của bạn. Mã của bạn gồm 6 chữ cái.</div>
            <div class="row">
                <div class="col-6">
                    <div class="recover__form-group"><input type="text" placeholder="Nhập mã" id="number-confirm" name="number" minlength="6" required="required" class="recover__input form-control" />
                        <p class="error-display" id="error-display-confirm"></p>
                    </div>
                </div>
<<<<<<< HEAD
                
=======
>>>>>>> a777fc04dc6bfcdf0c5eea2a773841a6c950ca12
                <div class="col-6 recover__text--right">
                    <div class="recover__send">
                        <div class="recover__strong">Chúng tôi đã gửi mã đến:</div>
                        <div class="recover__email"><?php echo isset($_SESSION['email_forgot']) ? $_SESSION['email_forgot'] : "" ?></div>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="col-6"> 
                    <br>
                    <h5>Mã code có hiệu lực : <b id="timer_sendcode"></b></h5>
                </div>
=======
>>>>>>> a777fc04dc6bfcdf0c5eea2a773841a6c950ca12
            </div>
        </div>
        <div class="recover__bottom"><button type="submit" class="btn btn-primary" id="change-continue-pass">Tiếp tục</button><a href="<?php echo getFullHost() . "/user/cancel" ?>" class="btn btn-outline-secondary">Hủy</a></div>
    </div>
</section>