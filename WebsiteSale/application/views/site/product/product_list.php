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
                                        <div class="box-product__image most-view__image"><a href="#" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-products/') . $pro->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                        <div class="box-product__content">
                                            <h3 class="box-product__title"><a href="<?php echo getFullHost().'/product/view-detail/'.$pro->id?>" class="box-product__link box-product__link--title"><?php echo $pro->name ?></a></h3>
                                            <div class="box-product__view"><i class="box-product__icon flaticon-eye"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $pro->view ?> Lượt xem</a></div>
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
        <?php if (!empty($data['product_list_dis'])): ?>
            <div class="col-9">
                <div class="main-content">
                    <section class="box-wrapper section-products-list">
                        <?php $temp = 0; ?>
                        <?php foreach ($data['product_list_dis'] as $pro): ?>
                            <?php if (!empty($pro->product_list)): ?>
                                <?php if ($temp != 0): ?>
                                    <div class="distance_top"></div>
                                <?php endif; ?>
                                <?php $temp = 1; ?>
                                <div class="box-wrapper__head">
                                    <div class="box-wrapper__block-title">
                                        <h3 class="box-wrapper__title"><?php echo $pro->name ?></h3>
                                    </div>
                                </div>
                                <div class="box_wrapper__content">
                                    <div class="row">
                                        <?php foreach ($pro->product_list as $pro_list): ?>
                                            <div class="col-4 wow fadeInLeft">
                                                <div class="box-product box-product--product">
                                                    <div class="box-product__image"><img src="<?php echo public_url('/assets/images/section-products/') . $pro_list->image_link ?>" alt="Rọ đá vnbuilding" class="box-product__photo">
                                                        <div class="box-product__buttons"><button type="button" class="box-product__button box-product__button--button">Thêm vào giỏ hàng</button><a href="<?php echo getFullHost().'/product/view-detail/'.$pro_list->id?>" class="box-product__button box-product__button--link">Xem chi tiết</a></div><span class="box-product__onsale">-<?php echo $pro_list->discount ?>%</span>
                                                    </div>
                                                    <div class="box-product__content">
<<<<<<< HEAD
                                                        <h3 class="box-product__title"><a href="<?php echo getFullHost().'/product/view-detail/'.$pro_list->id?>" class="box-product__link box-product__link--title"><?php echo $pro_list->name; ?></a></h3>
=======
                                                        <h3 class="box-product__title"><a href="#" class="box-product__link box-product__link--title"><?php echo $pro_list->name; ?></a></h3>
>>>>>>> a777fc04dc6bfcdf0c5eea2a773841a6c950ca12
                                                        <p class="box-product__description"><?php echo $pro_list->introduce ?></p>
                                                        <div class="box-product__price"><span class="box-product__new-price"><?php echo number_format($pro_list->price * (100 - $pro_list->discount) / 100) ?>₫</span><span class="box-product__old-price"><?php echo number_format($pro_list->price) ?>₫</span></div>
                                                        <div class="box-product__view-comment">
                                                            <div class="box-product__view"><i class="box-product__icon flaticon-eye"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $pro_list->view; ?> Lượt xem</a></div>
                                                            <div class="box-product__comment"><i class="box-product__icon flaticon-support"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $pro_list->totalcommnet; ?> Bình luận</a></div>
                                                        </div>
                                                        <div class="box-product__circles"><i class="icon fas fa-circle blue"></i><i class="icon fas fa-circle orange"></i><i class="icon fas fa-circle red"></i><i class="icon fas fa-circle yellow"></i><i class="icon fas fa-circle black"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </section>
                </div>
            </div>
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