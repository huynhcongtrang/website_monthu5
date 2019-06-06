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
        <?php if (!empty($data['service_detail'])): ?>
            <div class="col-9">
                <div class="main-content">
                    <section class="box-wrapper section-post-detail">
                        <div class="box-wrapper__head">
                            <div class="box-wrapper__block-title">
                                <h3 class="box-wrapper__title">Chi tiết dịch vụ</h3>
                            </div>
                            <div class="box-wrapper__nav-bar">
                                <ul class="box-wrapper__list">
                                    <li class="box-wrapper__item"><a href="<?php echo getFullHost() . '/home/index' ?>" class="box-wrapper__link">Trang chủ</a></li>
                                    <li class="box-wrapper__item">Dịch vụ</li>
                                </ul>
                            </div>
                        </div>
                        <div class="box_wrapper__content">
                            <div class="box-post-detail box-detail">
                                <h3 class="box-detail__title"><?php echo $data['service_detail']->name ?></h3>
                                <div class="box-detail__info">
                                    <div class="box-detail__name">Đăng bởi <a href="#" class="box-detail__link">Admin</a> - Share:</div>
                                    <div class="box-detail__social-network social-network">
                                        <ul class="social-network__list">
                                            <li class="fb-share-button" data-href="<?php echo getFullHost().'/service/service_detail/'.$data['service_detail']->id?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></li>
                                            <li class="social-network__item"><a href="#" class="social-network__item-link social-network__item--twitter"><i class="social-network__item-icon flaticon-twitter-logo-button"></i></a></li>
                                            <li class="social-network__item"><a href="#" class="social-network__item-link social-network__item--google"><i class="social-network__item-icon flaticon-google-plus-logo-button"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="box-detail__description"><?php echo $data['service_detail']->decription ?></p>
                            </div>
                        </div>
                    </section>
                    <section class="section-specifications specifications">
                        <h2 class="sub-title specifications__title">Quy trình thi công hàn màng chống thấm HDPE</h2>
                        <div class="specifications__content">
                            <ul class="specifications__list u-fs-15">
                                <?php format_content_service($data['service_detail']->procedure) ?>
                                <li class="u-fw-500">Thông tin cụ thể về sản phẩm quý khách vui lòng liên hệ với công ty VNBUILDING để được tư vấn và giá tốt nhất thị trường.</li>
                            </ul>
                        </div>
                    </section>
                    <section class="section-facebook facebook">
                        <h2 class="sub-title facebook__title">Bình luận</h2>
                        <div class="facebook__content">
                            <div class="fb-comments" data-href="http://localhost/websitesale/service/service_detail/<?php echo $data['service_detail']->id; ?>" data-width="700px" data-numposts="5"></div>
                        </div>
                    </section>
                    <?php if (!empty($data['service_relate'])): ?>
                        <section class="section-related-services related-product">
                            <h2 class="sub-title related-product__title">Dịch vụ liên quan</h2>
                            <div class="related-product__content">
                                <div class="row">
                                    <?php foreach ($data['service_relate'] as $service_relate): ?>
                                        <div class="col-4">
                                            <div class="box-product box-product--services box-product--custom-title box-product--hover">
                                                <div class="box-product__image"><a href="<?php echo getFullHost().'service/service_detail/'.$service_relate->id?>" class="box-product__link--image"><img src="<?php echo public_url("/assets/images/section-services/").$service_relate->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                                <div class="box-product__content">
                                                    <h3 class="box-product__title"><a href="<?php echo getFullHost().'service/service_detail/'.$service_relate->id?>" class="box-product__link box-product__link--title"><?php echo $service_relate->name?></a></h3>
                                                    <p class="box-product__description"><?php echo $service_relate->name?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <h2> Chi tiết dịch vụ trống</h2>
        <?php endif; ?>
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