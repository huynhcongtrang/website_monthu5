
<div class="footer__top">
    <div class="container">
        <div class="footer__navigation">
            <ul class="footer__list">
                <li class="footer__item"><a href="#" class="footer__link">Trang chủ</a></li>
                <li class="footer__item"><a href="#" class="footer__link">Giới thiệu</a></li>
                <li class="footer__item"><a href="#" class="footer__link">Sản phẩm</a></li>
                <li class="footer__item"><a href="#" class="footer__link">Dịch vụ</a></li>
                <li class="footer__item"><a href="#" class="footer__link">Dự án</a></li>
                <li class="footer__item"><a href="#" class="footer__link">Khách hàng tiêu biểu</a></li>
                <li class="footer__item"><a href="#" class="footer__link">Liên hệ</a></li>
            </ul>
        </div>
        <div class="footer__form">
            <form action="" method="" class="form">
                <div class="form__group"><input type="email" name="email_address" placeholder="Nhập địa chỉ email để nhận tin từ Vnbuilding" required="required" class="form__input" /><button type="submit" class="form__button">Gửi</button></div>
            </form>
        </div>
    </div>
</div>
<div class="footer__middle">
    <div class="container">
        <div class="row">
            <div class="col-2 align-self-center">
                <div class="box-widget box-widget--logo"><a href="#" class="box-widget__link--logo"><img src="<?php echo public_url()?>/assets/images/logo.png" alt="logo vnbuilding" class="box-widget__logo" /></a></div>
            </div>
            <div class="col-4">
                <div class="box-widget box-widget--address">
                    <h3 class="box-widget__title">Địa chỉ liên hệ</h3>
                    <div class="box-widget__content">
                        <ul class="box-widget__list box-widget__list--address">
                            <li class="box-widget__item"><i class="box-widget__icon flaticon-factory"></i><span>Địa chỉ: <?php echo $data['info_company']->address?> </span></li>
                            <li class="box-widget__item"><i class="box-widget__icon flaticon-call-answer"></i><span>Điện thoại: <?php echo displayPhone($data['info_company']->phone)?></span></li>
                            <li class="box-widget__item"><i class="box-widget__icon flaticon-envelope"></i><span>Email: <?php echo $data['info_company']->email?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="box-widget box-widget--products">
                    <h3 class="box-widget__title">Danh mục sản phẩm</h3>
                    <div class="box-widget__content">
                        <ul class="box-widget__list box-widget__list--items">
                            <?php foreach ($data['catalog'] as $cata): ?>
                            <li class="box-widget__item"><a href="#" class="box-widget__link"><?php echo $cata->name?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="box-widget box-widget--services">
                    <h3 class="box-widget__title">Dịch vụ</h3>
                    <div class="box-widget__content">
                        <ul class="box-widget__list box-widget__list--items">
                            <?php foreach ($data['service_type_list'] as $type_service):?>
                            <li class="box-widget__item"><a href="#" class="box-widget__link"><?php echo $type_service->name ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer__bottom">
    <div class="container">
        <div class="footer__copyright text-center">© Copyright 2016 <a href="#" class="footer__link">Vnbuilding</a>, All rights reserved</div>
    </div>
</div>