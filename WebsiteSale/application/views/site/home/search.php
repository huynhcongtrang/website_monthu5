<div class="main-content">
    <div class="container">
        <section class="box-wrapper section-products">
            <div class="box-wrapper__head">
                <div class="box-wrapper__block-title">
                    <h3 class="box-wrapper__title">Tìm kiếm với từ khoá : "<?php echo $data['key'] ?>"</h3>
                </div><a href="Product?action=product_list" class="box-wrapper__link">Xem thêm</a>
            </div>
            <div class="box_wrapper__content">
                <div class="row">
                    <?php if (empty($data['product_list'])): ?>
                    <h1>Không có kết quả tìm kiếm......</h1>
                    <?php else : ?>
                        <?php foreach ($data['product_list'] as $product): ?>
                            <div class="col-3">
                                <div class="box-product box-product--product">
                                    <div class="box-product__image"><img src="<?php echo public_url('/assets/images/section-products/') . $product->image_link ?>" alt="Rọ đá vnbuilding" class="box-product__photo">
                                        <div class="box-product__buttons"><button type="button" class="box-product__button box-product__button--button">Thêm vào giỏ hàng</button><a href="#" class="box-product__button box-product__button--link">Xem chi tiết</a></div>
                                        <?php if ($product->discount > 0): ?>
                                            <span class="box-product__onsale">-<?php echo $product->discount ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="box-product__content">
                                        <h3 class="box-product__title"><a href="#" class="box-product__link box-product__link--title"><?php echo $product->name ?></a></h3>
                                        <div class="box-product__price"><span class="box-product__new-price"><?php echo number_format($product->price * (100 - $product->discount) / 100) ?>₫</span><span class="box-product__old-price"><?php echo number_format($product->price) ?>₫</span></div>
                                        <div class="box-product__view-comment">
                                            <div class="box-product__view"><i class="box-product__icon flaticon-eye"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $product->view ?> Lượt xem</a></div>
                                            <div class="box-product__comment"><i class="box-product__icon flaticon-support"></i><a href="#" class="box-product__link box-product__link--vc"><?php echo $product->totalcommnet ?> Bình luận</a></div>
                                        </div>
                                        <div class="box-product__circles"><i class="icon fas fa-circle blue"></i><i class="icon fas fa-circle orange"></i><i class="icon fas fa-circle red"></i><i class="icon fas fa-circle yellow"></i><i class="icon fas fa-circle black"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>  


    </div>

    <section class="section-partners partner">
        <div class="container">
            <div class="partner__list slider-general__list">
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
</div>