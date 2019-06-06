    <div class="main-content">
        <div class="container">
            <section class="box-wrapper section-about-us">
                <div class="row">
                    <div class="col-4">
                        <div class="box-info">
                            <div class="box-info__icon"><i class="icon flaticon-information"></i></div>
                            <div class="box-info__content">
                                <h3 class="box-info__title"><a href="#" class="box-info__link">Về chúng tôi</a></h3>
                                <p class="box-info__description">Lorem ipsum dolor sit amet, consectetur dipi elit. Pellentesque nec viverra porta eu nunc lobortis dui in sodales. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box-info">
                            <div class="box-info__icon"><i class="icon flaticon-light-bolt"></i></div>
                            <div class="box-info__content">
                                <h3 class="box-info__title"><a href="#" class="box-info__link">Lĩnh vực kinh doanh</a></h3>
                                <p class="box-info__description">Công ty chúng tôi chuyên kinh doanh: Dây thép mạ kẽm; Dây thép mạ kẽm và bọc nhựa PVC. Dây thép gai; Dây gai tôn. Lưới thép B40 [...]</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box-info">
                            <div class="box-info__icon"><i class="icon flaticon-trophy"></i></div>
                            <div class="box-info__content">
                                <h3 class="box-info__title"><a href="#" class="box-info__link">Dự án nổi bật</a></h3>
                                <p class="box-info__description">Lorem ipsum dolor sit amet, consectur adipiscing elit. Pellentesque lobortis dui in sodales eleifend dolor. Vestibulum porta laoreet ultricie</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="box-wrapper section-products">
                <div class="box-wrapper__head">
                    <div class="box-wrapper__block-title">
                        <h3 class="box-wrapper__title">Sản phẩm nổi bật</h3>
                    </div><a href="<?php echo getFullHost().'/product/product_list'?>" class="box-wrapper__link">Xem thêm</a>
                </div>
                <div class="box_wrapper__content">
                    <div class="row">
                        <?php foreach ($data['product_list'] as $product): ?>
                            <div class="col-3">
                                <div class="box-product box-product--product">
                                    <div class="box-product__image"><img src="<?php echo public_url('/assets/images/section-products/') . $product->image_link ?>" alt="Rọ đá vnbuilding" class="box-product__photo">
                                        <div class="box-product__buttons"><button type="button" class="box-product__button box-product__button--button" id="pro_<?php echo $product->id?>">Thêm vào giỏ hàng</button><a href="<?php echo getFullHost() . '/product/view-detail/' . $product->id ?>" class="box-product__button box-product__button--link">Xem chi tiết</a></div>
                                        <?php if ($product->discount > 0): ?>
                                            <span class="box-product__onsale">-<?php echo $product->discount ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="box-product__content">
                                        <h3 class="box-product__title"><a href="<?php echo getFullHost() . '/product/view-detail/' . $product->id ?>" class="box-product__link box-product__link--title" id="pro_name_<?php echo $product->id?>"><?php echo $product->name ?></a></h3>
                                        <div class="box-product__price"><span class="box-product__new-price"><?php echo number_format($product->price * (100 - $product->discount) / 100) ?>₫</span><span class="box-product__old-price"><?php echo number_format($product->price) ?>₫</span></div>
                                        <div class="box-product__view-comment">
                                            <div class="box-product__view"><i class="box-product__icon flaticon-eye"></i><a href="<?php echo getFullHost() . '/product/view-detail/' . $product->id ?>" class="box-product__link box-product__link--vc"><?php echo $product->view ?> Lượt xem</a></div>
                                            <div class="box-product__comment"><i class="box-product__icon flaticon-support"></i><a href="<?php echo getFullHost() . '/product/view-detail/' . $product->id ?>" class="box-product__link box-product__link--vc"><?php echo $product->totalcommnet ?> Bình luận</a></div>
                                        </div>
                                        <div class="box-product__circles"><i class="icon fas fa-circle blue"></i><i class="icon fas fa-circle orange"></i><i class="icon fas fa-circle red"></i><i class="icon fas fa-circle yellow"></i><i class="icon fas fa-circle black"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <section class="section-advertisement">
                <div class="advertisement"><a href="#" class="advertisement__link">
                        <h2 class="advertisement__title">Vnbuilding Thăng Long</h2>
                        <p class="advertisement__description">Đồng hành cùng các công trình</p>
                    </a></div>
            </section>
            <section class="box-wrapper section-services">
                <div class="box-wrapper__head">
                    <div class="box-wrapper__block-title">
                        <h3 class="box-wrapper__title">Dịch vụ của chúng tôi</h3>
                    </div><a href="<?php echo getFullHost().'/service/service_list'?>" class="box-wrapper__link">Xem thêm</a>
                </div>
                <div class="box_wrapper__content">
                    <div class="row">
                        <?php foreach ($data['service_list'] as $service): ?>
                            <div class="col-3">
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
            </section>
            <section class="box-wrapper section-projects">
                <div class="box-wrapper__head">
                    <div class="box-wrapper__block-title">
                        <h3 class="box-wrapper__title">Dự án tiêu biểu</h3>
                    </div><a href="<?php echo getFullHost().'/project/project_list'?>" class="box-wrapper__link">Xem thêm</a>
                </div>
                <div class="box_wrapper__content">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-product box-product--project box-product--custom-title box-product--hover">
                                <div class="box-product__image"><a href="<?php echo getFullHost()."/project/project_detail/".$data['project_list'][0]->id?>" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-projects/') . $data['project_list'][0]->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                <div class="box-product__content">
                                    <h3 class="box-product__title"><a href="<?php echo getFullHost()."/project/project_detail/".$data['project_list'][0]->id?>" class="box-product__link box-product__link--title"><?php echo $data['project_list'][0]->name ?></a></h3>
                                    <p class="box-product__description"><?php echo $data['project_list'][0]->introduce ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-product__list">
                                <?php for ($i = 0; $i < 3; $i++): ?>
                                    <div class="box-product box-product--hover">
                                        <div class="box-product__image"><a href="<?php echo getFullHost()."/project/project_detail/".$data['project_list'][$i]->id?>" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-projects/') . $data['project_list'][$i]->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                        <div class="box-product__content">
                                            <h3 class="box-product__title"><a href="<?php echo getFullHost()."/project/project_detail/".$data['project_list'][$i]->id?>" class="box-product__link box-product__link--title"><?php echo $data['project_list'][$i]->name ?></a></h3>
                                            <p class="box-product__description"><?php echo $data['project_list'][$i]->introduce ?></p>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-product__list">
                                <?php for ($i = 3; $i < 6; $i++): ?>
                                    <div class="box-product box-product--hover">
                                        <div class="box-product__image"><a href="<?php echo getFullHost()."/project/project_detail/".$data['project_list'][$i]->id?>" class="box-product__link--image"><img src="<?php echo public_url('/assets/images/section-projects/') . $data['project_list'][$i]->image_link ?>" alt="Thi công màn chống thấm vnbuilding" class="box-product__photo"></a></div>
                                        <div class="box-product__content">
                                            <h3 class="box-product__title"><a href="<?php echo getFullHost()."/project/project_detail/".$data['project_list'][$i]->id?>" class="box-product__link box-product__link--title"><?php echo $data['project_list'][$i]->name ?></a></h3>
                                            <p class="box-product__description"><?php echo $data['project_list'][$i]->introduce ?></p>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
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