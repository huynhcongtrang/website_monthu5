<script src="<?php echo public_url() ?>assets/js/contact.js"></script>
<div class="container">
    <div class="row">
        <div class="col-3">
            <aside class="sidebar">
                <section class="section-most-view most-view">
                    <h2 class="most-view__title sub-title">Được xem nhiều</h2>
                    <div class="most-view__content">
                        <div class="box-product__list">
                            <?php if (!empty($data['product_list'])): ?>
                                <?php foreach ($data['product_list'] as $pro): ?>
                                    <div class="box-product box-product--hover wow fadeInUp">
                                        <div class="box-product__image most-view__image"><a href="<?php echo getFullHost() . '/product/view-detail/' . $pro->id  ?>" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-products/') . $pro->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                        <div class="box-product__content">
                                            <h3 class="box-product__title"><a href="<?php echo getFullHost() . '/product/view-detail/' . $pro->id  ?>" class="box-product__link box-product__link--title"><?php echo $pro->name ?></a></h3>
                                            <div class="box-product__view"><i class="box-product__icon flaticon-eye"></i><a href="<?php echo getFullHost() . '/product/view-detail/' . $pro->id ?>" class="box-product__link box-product__link--vc"><?php echo $pro->view ?> Lượt xem</a></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <section class="section-advertisement">
                    <div class="advertisement advertisement--sub"><a href="#" class="advertisement--sub__link"><img src="<?php echo public_url() ?>/assets/images/section-advertisement/sub-advertisement.jpg" alt="vnbuilding advertisement" class="advertisement--sub__image"></a></div>
                </section>
            </aside>
        </div>
        <div class="col-9">
            <div class="main-content">
                <section class="box-wrapper section-contact">
                    <div class="box-wrapper__head">
                        <div class="box-wrapper__block-title">
                            <h3 class="box-wrapper__title">Liên hệ với chúng tôi</h3>
                        </div>
                        <div class="box-wrapper__nav-bar">
                            <ul class="box-wrapper__list">
                                <li class="box-wrapper__item"><a href="#" class="box-wrapper__link">Trang chủ</a></li>
                                <li class="box-wrapper__item">Liên hệ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box_wrapper__content contact">
                        <h3 class="contact__title">Công ty TNHH Vnbuilding Thăng Long</h3>
                        <div class="contact__content">
                            <p class="contact__description">Chúng tôi là nhà cung cấp Rọ đá, Giấy Dầu Xây Dựng, Lưới thép, Dây Thép Gai, Nhựa Đường và các dịch vụ cung cấp vật tư , Thi công chống thấm, ... Mang đến giải pháp tối ưu, chất lượng đảm bảo, giá cả cạnh tranh.</p>
                            <div class="contact__info">
                                <p class="contact__info-title">Mọi thông tin xin Quý khách vui lòng liên hệ:</p>
                                <ul class="contact__info-list">
                                    <?php if (!empty($data['info_company'])): ?>
                                        <li class="contact__item"><b>Trụ sở chính </b>
                                            <ul class="contact__info-list--sub">
                                                <li><i class="flaticon-maps-and-flags"></i><span>Địa chỉ: <?php echo $data['info_company']->address ?></span></li>
                                                <li><i class="flaticon-call-answer"></i><span>Tel: <?php echo $data['info_company']->phone ?></span></li>
                                                <li><i class="flaticon-envelope"></i>
                                                    <p>Email: <a href="mailto: <?php echo $data['info_company']->email ?>" class="contact__link"><?php echo $data['info_company']->email ?></a></p>
                                                </li>
                                                <li><i class="flaticon-internet"></i>
                                                    <p>Web: <a href="#" class="contact__link">www.vnbuilding.com.vn</a></p>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                    <li class="contact__item"><b>Cơ sở 1:</b> Quốc lộ 3 – Lý Nhân – Dục Tú – Đông Anh – Hà Nội</li>
                                    <li class="contact__item"><b>Cơ sở 2:</b> Khu công nghiệp Phùng Xá – Thạch Thất – Hà Nội</li>
                                    <li class="contact__item"><b>Cơ sở 3:</b> Xóm ngoài Dương Lai – Xã Thành Lợi – Huyện Vụ Bản – NĐ</li>
                                    <li class="contact__item"><b>Kho hàng:</b> Định Công – Hoàng Mai – Hà Nội</li>
                                </ul>
                                <p class="contact__info-more">Hoặc gửi liên hệ bằng cách điền thông tin theo mẫu dưới đây (Dấu <span class="contact__color">*</span> là trường không được để trống):</p>
                                <div class="contact__block-form">
                                    <div class="contact__form-title"><b>Thông tin liên hệ:</b></div>
                                    <div class="contact__form-content">
                                        <form  method="post" class="contact__form" action="<?php echo getFullHost() . "/contact/submit-contact" ?>">
                                            <div class="contact__form-group"><label for="fullname" class="contact__label">Họ và tên (<span class="contact__color">*</span>)</label><input id="fullname" type="text" placeholder="Nhập đầy đủ họ tên" name="fullname" required="required" class="contact__input"><span class="error_display_contact" id="error_fullname"></span></div>
                                            <div class="contact__form-group"><label for="address" class="contact__label">Địa chỉ</label><input id="address" type="text" placeholder="Nhập địa chỉ" name="address" class="contact__input"><span class="error_display_contact" id="error_address"></span></div>
                                            <div class="contact__form-group"><label for="telephone" class="contact__label">Số điện thoại (<span class="contact__color">*</span>)</label><input id="telephone" type="tel" placeholder="Nhập số điện thoại" name="telephone" required="required" class="contact__input"><span class="error_display_contact" id="error_telephone"></span></div>
                                            <div class="contact__form-group"><label for="email" class="contact__label">Email (<span class="contact__color">*</span>)</label><input id="email" type="email" placeholder="Nhập email" name="email" required="required" class="contact__input"><span class="error_display_contact" id="error_email"></span></div>
                                            <div class="contact__form-group"><label for="content" class="contact__label">Nội dung (<span class="contact__color">*</span>)</label><textarea id="content" placeholder="Nội dung liên hệ" name="content" class="contact__input contact__textarea" required="required"></textarea><span class="error_display_contact" id="error_content"></span></div>
                                            <div class="contact__thanks">Cảm ơn Quý khách đã liên hệ. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.</div>
                                            <div class="contact__block-button"><button type="submit" class="contact__button contact__button--submit" >Gửi</button><button type="button" class="contact__button contact__button--cancel">Huỷ</button></div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <section class="box-wrapper section-map">
                    <div class="box-wrapper__head">
                        <div class="box-wrapper__block-title">
                            <h3 class="box-wrapper__title">Vị trí công ty</h3>
                        </div>
                        <div class="box-wrapper__nav-bar">
                            <ul class="box-wrapper__list">
                                <li class="box-wrapper__item"><a href="#" class="box-wrapper__link">Trang chủ</a></li>
                                <li class="box-wrapper__item">Vị trí</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-wrapper__content">
                        <div id="map"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<section class="section-partners partner">
    <div class="container">
        <div data-slidestoshow="6" data-slidestoscroll="1" data-dots="0" data-arrows="1" data-autoplay="0" class="partner__list slider-general__list comp-slider">
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/01.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/02.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/03.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/04.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/05.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/06.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/01.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/02.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/03.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/04.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/05.png" alt="vnbuilding partner" class="partner__image"></a></figure>
            <figure class="partner__item"><a href="#" class="partner__link"><img src="<?php echo public_url() ?>/assets/images/section-partners/06.png" alt="vnbuilding partner" class="partner__image"></a></figure>
        </div>
    </div>
</section>

<script>

    function initMap1() {
        var myLatLng = {lat: 10.8656635, lng: 106.6164108};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6lBMZlMlB-gtHA6bjcvkTCAev-CZpdOI&callback=initMap1">
</script>