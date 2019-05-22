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
                                            <h3 class="box-product__title"><a href="<?php echo getFullHost() . '/product/view-detail/' . $pro->id ?>" class="box-product__link box-product__link--title"><?php echo $pro->name ?></a></h3>
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
        <div class="col-9">
            <div class="main-content">
                <section class="box-wrapper section-product-detail">
                    <div class="box-wrapper__head">
                        <div class="box-wrapper__block-title">
                            <h3 class="box-wrapper__title">Chi tiết sản phẩm</h3>
                        </div>
                        <div class="box-wrapper__nav-bar">
                            <ul class="box-wrapper__list">
                                <li class="box-wrapper__item"><a href="#" class="box-wrapper__link">Trang chủ</a></li>
                                <li class="box-wrapper__item"><a href="#" class="box-wrapper__link">Sản phẩm</a></li>
                                <li class="box-wrapper__item"><?php echo $data['product_detail']->name_catalog ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="box_wrapper__content">
                        <div class="row">
                            <div class="col-6">
                                <div class="box-product box-product--product">
                                    <div class="box-product__image"><a href="<?php echo public_url('/assets/images/section-products/') . $data['product_detail']->image_link ?>" class="box-product__link--image"><img src="<?php echo public_url() ?>/assets/images/section-products/01.png" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-detail box-product">
                                    <h3 class="product-detail__title"><?php echo $data['product_detail']->name ?></h3>
                                    <div class="rating"><span class="rating-not-selected"><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i></span><span style="width: <?php echo ($data['product_detail']->rating * 100) / 5 ?>%" class="rating-selected"><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i><i class="icon fas fa-star"></i></span></div>
                                    <div class="product-detail__price box-product__price"><span class="box-product__old-price"><?php echo number_format($data['product_detail']->price) ?>₫</span><span class="box-product__new-price"><?php echo number_format($data['product_detail']->price * (100 - $data['product_detail']->discount) / 100) ?>₫</span></div>
                                    <p class="product-detail__description"><?php echo $data['product_detail']->decription ?></p>
                                    <div class="product-detail__component">
                                        <p>Các thành phần chính của Giấy dầu bao gồm:</p>
                                        <ul class="product-detail__component-list">
                                            <li><?php echo $data['product_detail']->element ?></li>
                                        </ul>
                                    </div><button type="button" class="product-detail__button">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-specifications specifications">
                    <h2 class="sub-title specifications__title">Thông số kỹ thuật & tính năng</h2>
                    <div class="specifications__content">
                        <ul class="specifications__list u-fs-15">
                            <li class="u-fw-500">Đặc điểm của <?php echo $data['product_detail']->name ?>
                                <ul class="u-fw-400">
                                    <ul class="u-pl-35">
                                        <?php format_content($data['product_detail']->content) ?>
                                    </ul>
                                </ul>
                            <li class="u-fw-500">Thông tin cụ thể về sản phẩm quý khách vui lòng liên hệ với công ty VNBUILDING để được tư vấn và giá tốt nhất thị trường.</li>
                        </ul>
                    </div>
                </section>

                <section id="section-evaluate" class="evaluate">
                    <h2 class="sub-title evaluate__title">Đánh giá sản phẩm</h2>
                    <div class="evaluate__content">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <div class="evaluate__average"><strong><?php echo $data['product_detail']->rating ?></strong><i class="icon fas fa-star"></i></div>
                            </div>
                            <div class="col-6 border-lr">
                                <div class="evaluate__quantity">
                                    <div class="evaluate__item">
                                        <div class="left"><span>5</span><i class="fas fa-star"></i></div>
                                        <div class="right">
                                            <div style="width: 50%" class="run"></div>
                                        </div>
                                    </div>
                                    <div class="evaluate__item">
                                        <div class="left"><span>4</span><i class="fas fa-star"></i></div>
                                        <div class="right">
                                            <div style="width: 40%" class="run"></div>
                                        </div>
                                    </div>
                                    <div class="evaluate__item">
                                        <div class="left"><span>3</span><i class="fas fa-star"></i></div>
                                        <div class="right">
                                            <div style="width: 30%" class="run"></div>
                                        </div>
                                    </div>
                                    <div class="evaluate__item">
                                        <div class="left"><span>2</span><i class="fas fa-star"></i></div>
                                        <div class="right">
                                            <div style="width: 20%" class="run"></div>
                                        </div>
                                    </div>
                                    <div class="evaluate__item">
                                        <div class="left"><span>1</span><i class="fas fa-star"></i></div>
                                        <div class="right">
                                            <div style="width: 10%" class="run"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="evaluate__rating"><button type="button" class="evaluate__button">Gửi đánh giá của bạn</button>
                                    <form action="" method="method" class="evaluate__form">
                                        <div class="user-rating">
                                            <div data-toggle="tooltip" data-placement="right" title="Tuyệt vời" class="rt"><input type="radio" name="rating" id="start-5" value="5" class="radio"><label for="start-5"><i class="icon fas fa-star"></i></label></div>
                                            <div data-toggle="tooltip" data-placement="right" title="Rất tốt" class="rt"><input type="radio" name="rating" id="start-4" value="4" class="radio"><label for="start-4"><i class="icon fas fa-star"></i></label></div>
                                            <div data-toggle="tooltip" data-placement="right" title="Bình thường" class="rt"><input type="radio" name="rating" id="start-3" value="3" class="radio"><label for="start-3"><i class="icon fas fa-star"></i></label></div>
                                            <div data-toggle="tooltip" data-placement="right" title="Tạm được" class="rt"><input type="radio" name="rating" id="start-2" value="2" class="radio"><label for="start-2"><i class="icon fas fa-star"></i></label></div>
                                            <div data-toggle="tooltip" data-placement="right" title="Không thích" class="rt"><input type="radio" name="rating" id="start-1" value="1" class="radio"><label for="start-1"><i class="icon fas fa-star"></i></label></div>
                                        </div><button type="submit" class="evaluate__button">Gửi đánh giá</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-facebook facebook">
                    <h2 class="sub-title facebook__title">Bình luận</h2>
                    <div class="fb-comments" data-href="http://localhost/websitesale/product/view-detail/<?php echo $data['product_detail']->id;?>" data-width="700px" data-numposts="5"></div>
                </section>

                <?php if (!empty($data['product_concern'])): ?>
                    <section class="section-related-products related-product">
                        <h2 class="sub-title related-product__title">Sản phẩm liên quan</h2>
                        <div class="related-product__content">
                            <div class="row">
                                <?php foreach ($data['product_concern'] as $pro_concern): ?>
                                    <div class="col-4">
                                        <div class="box-product box-product--hover box-product--product">
                                            <div class="box-product__image"><a href="<?php echo getFullHost() . '/product/view-detail/' . $pro_concern->id ?>" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-products/') . $pro_concern->image_link ?>" alt="Rọ đá vnbuilding" class="box-product__photo"></a></div>
                                            <div class="box-product__content">
                                                <h3 class="box-product__title"><a href="<?php echo getFullHost() . '/product/view-detail/' . $pro_concern->id ?>" class="box-product__link box-product__link--title"><?php echo $pro_concern->name ?></a></h3>
                                                <p class="box-product__description"><?php echo $pro_concern->decription ?></p>
                                                <div class="box-product__view-comment">
                                                    <div class="box-product__view"><i class="box-product__icon flaticon-eye"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $pro_concern->view ?> Lượt xem</a></div>
                                                    <div class="box-product__comment"><i class="box-product__icon flaticon-support"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $pro_concern->totalcommnet ?> Bình luận</a></div>
                                                </div>
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