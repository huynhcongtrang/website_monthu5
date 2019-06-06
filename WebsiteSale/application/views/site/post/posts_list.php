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
                <section class="box-wrapper section-posts-list">
                    <div class="box-wrapper__head">
                        <div class="box-wrapper__block-title">
                            <h3 class="box-wrapper__title">Dịch vụ của chúng tôi</h3>
                        </div>
                    </div>
                    <?php if (!empty($data['service_list'])): ?>
                        <div class="box_wrapper__content">
                            <div class="row">
                                <?php foreach ($data['service_list'] as $service): ?>
                                    <div class="col-4">
                                        <div class="box-product box-product--services box-product--custom-title box-product--hover">
                                            <div class="box-product__image"><a href="<?php echo getFullHost() . '/service/service_detail/' . $service->id ?>" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-services/') . $service->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                            <div class="box-product__content">
                                                <h3 class="box-product__title"><a href="<?php echo getFullHost() . '/service/service_detail/' . $service->id ?>" class="box-product__link box-product__link--title"><?php echo $service->name ?></a></h3>
                                                <p class="box-product__description"><?php echo $service->introduce ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <h2>Dịch vụ trống</h2>
                    <?php endif; ?>
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