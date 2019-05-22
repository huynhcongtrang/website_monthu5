<script src="<?php echo public_url() ?>/assets/js/jquery-ui.js"></script>
<link type="text/css" href="<?php echo public_url() ?>/assets/js/jquery-ui.css" rel="stylesheet">
<script src="<?php echo public_url() ?>/assets/js/Login.js"></script>
<script src="<?php echo public_url() ?>/assets/js/Register.js"></script>
<script src="<?php echo public_url() ?>/assets/js/GetPassword.js"></script>
<script>

    $(function () {
        $("#search_pro").autocomplete({
            source: <?php echo $data['product_list_search']; ?>
        });
    });
</script>
<div class="header__top-bar">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="header__hotline">
                    <ul class="hotline__list">
                        <li class="hotline__item"><i class="hotline__item-icon flaticon-call-answer"></i>
                            <div class="hotline__item-info">Hotline: <a href="tel: <?php echo $data['info_company']->phone?>" class="hotline__item-link"><?php echo displayPhone($data['info_company']->phone)?></a></div>
                        </li>
                        <li class="hotline__item"><i class="hotline__item-icon flaticon-envelope"></i>
                            <div class="hotline__item-info">Email: <a href="mailto: <?php echo $data['info_company']->email?>" class="hotline__item-link"><?php echo $data['info_company']->email?></a></div>
                        </li>
                    </ul>
                </div>
                <div class="header__social-network social-network">
                    <ul class="social-network__list">
                        <li class="social-network__item"><a href="#" class="social-network__item-link social-network__item--facebook"><i class="social-network__item-icon flaticon-facebook-logo-button"></i></a></li>
                        <li class="social-network__item"><a href="#" class="social-network__item-link social-network__item--twitter"><i class="social-network__item-icon flaticon-twitter-logo-button"></i></a></li>
                        <li class="social-network__item"><a href="#" class="social-network__item-link social-network__item--google"><i class="social-network__item-icon flaticon-google-plus-logo-button"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-6">
                <div class="header__function function">
                    <ul class="function__list">
                        <?php if (!isset($_SESSION['id_user'])): ?>
                            <li class="function__item"><a href="#login-form" id="click-login" class="function__link open-popup-link"><i class="function__icon fas fa-user"></i><span class="function__span">Tài khoản</span></a>
                                <div id="login-form" class="mfp-block mfp-form mfp-hide"><i class="icon fas fa-sign-in-alt"></i>
                                    <h4>Đăng nhập</h4><button type="button" class="mfp-close">x</button>
                                    <p class="annount-cong"></p>
                                    <div class="form-group"><input type="email" id="email-login" name="email-login" placeholder="Nhập vào địa chỉ Email" required="required" /></div>
                                    <div class="form-group"><input type="password" id="password-login" name="password-login" placeholder="Nhập vào mật khẩu" required="required" /></div>
                                    <p class="error-display" id="error-display-login"></p>
                                    <button type="submit" class="button-submit" id="submit-login" onclick="trang()">Đăng nhập</button>
                                    <ul class="list-link">
                                        <li><a href="#forgot-password" class="link open-popup-link">Quên mật khẩu</a></li>
                                        <li><a href="#register-form" class="link open-popup-link" id="link-register">Đăng ký tài khoản</a></li>
                                    </ul>
                                </div>
                                <div id="register-form" class="mfp-block mfp-form mfp-hide"><i class="icon fas fa-edit"></i>
                                    <h4>Đăng ký</h4><button type="button" class="mfp-close">x</button>
                                    <div class="form-group"><input type="text" id="name-register" name="name-register" placeholder="Nhập vào tên của bạn" required="required" /></div>
                                    <p class="error-display-detail" id="error-display-name"></p>
                                    <div class="form-group"><input type="text" id="phone-register" name="phone-register" placeholder="Nhập vào số điện thoại của bạn" required="required" /></div>
                                    <p class="error-display-detail" id="error-display-phone"></p>
                                    <div class="form-group"><input type="text" id="address-register" name="address-register" placeholder="Nhập vào địa chỉ của bạn" required="required" /></div>
                                    <p class="error-display-detail" id="error-display-address"></p>
                                    <div class="form-group"><input type="email" id="email-register" name="email-register" placeholder="Nhập vào địa chỉ Email" required="required" /></div>
                                    <p class="error-display-detail" id="error-display-email"></p>
                                    <div class="form-group"><input type="password" id="password-register" name="password-register" placeholder="Nhập vào mật khẩu" required="required" /></div>
                                    <p class="error-display-detail" id="error-display-password"></p>
                                    <div class="form-group"><input type="password" id="password-again" name="password-again" placeholder="Nhập lại mật khẩu" required="required" /></div>
                                    <p class="error-display-detail" id="error-display-repassword"></p>
                                    <p class="error-display" id="error-display-register"></p>
                                    <button type="submit" class="button-submit" id="submit-register">Đăng ký</button>
                                    <ul class="list-link">
                                        <li><a href="#login-form" class="link open-popup-link">Đã có tài khoản</a></li>
                                    </ul>
                                </div>
                                <div id="forgot-password" class="mfp-block mfp-form mfp-hide"><i class="icon fas fa-unlock-alt"></i>
                                    <h4>Khôi phục mật khẩu</h4><button type="button" class="mfp-close">x</button>
                                    <div class="form-group"><input type="email" id="email-password" name="email-password" placeholder="Nhập vào địa chỉ Email" required="required" /></div>
                                    <p class="error-display" id="error-display-forgot"></p>
                                    <div class="wating_moment"><?php include 'wating.php';?></div>
                                    <button type="submit" class="button-submit " id="submit-forgot">Yêu cầu mật khẩu mới</button>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="function__item"><a href="javascript:void(0)" class="function__link" ><i class="function__icon fas fa-user"></i><span class="function__span">Tài khoản</span></a>
                                <div class="function__content function-hover">
                                    <ul class="function-hover__list">
                                        <li class="function-hover__item"><a href="#" class="link">Tài khoản</a></li>
                                        <li class="function-hover__item"><a href="<?php echo getFullHost() . '/user/logout'; ?>" class="link">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li class="function__item"><a href="#" class="function__link"><i class="function__icon fas fa-shopping-cart"></i><span class="function__number function__span">0 Sản phẩm</span></a>
                            <div class="function__content">
                                <div class="product__show">
                                    <ul class="product__list">
                                        <li class="product__item">
                                            <figure class="product__image"><img src="<?php echo public_url() ?>/assets/images/section-products/01.png" class="product__photo" /><a href="javascript:void(0)" class="product__icon"><i class="fas fa-times"></i></a></figure>
                                            <div class="product__content"><a href="#" class="product__link">Rọ đá - Sự bền vững cho mọi công trình</a>
                                                <div class="product__total"><span class="product__price">3.350.000₫</span><span class="product__quantity">x1</span></div>
                                            </div>
                                        </li>
                                        <li class="product__item">
                                            <figure class="product__image"><img src="<?php echo public_url() ?>/assets/images/section-products/02.png" class="product__photo" /><a href="javascript:void(0)" class="product__icon"><i class="fas fa-times"></i></a></figure>
                                            <div class="product__content"><a href="#" class="product__link">Rọ đá - Sự bền vững cho mọi công trình</a>
                                                <div class="product__total"><span class="product__price">3.350.000₫</span><span class="product__quantity">x1</span></div>
                                            </div>
                                        </li>
                                        <li class="product__item">
                                            <figure class="product__image"><img src="<?php echo public_url() ?>/assets/images/section-products/03.png" class="product__photo" /><a href="javascript:void(0)" class="product__icon"><i class="fas fa-times"></i></a></figure>
                                            <div class="product__content"><a href="#" class="product__link">Rọ đá - Sự bền vững cho mọi công trình</a>
                                                <div class="product__total"><span class="product__price">3.350.000₫</span><span class="product__quantity">x1</span></div>
                                            </div>
                                        </li>
                                        <li class="product__item">
                                            <figure class="product__image"><img src="<?php echo public_url() ?>/assets/images/section-products/04.png" class="product__photo" /><a href="javascript:void(0)" class="product__icon"><i class="fas fa-times"></i></a></figure>
                                            <div class="product__content"><a href="#" class="product__link">Rọ đá - Sự bền vững cho mọi công trình</a>
                                                <div class="product__total"><span class="product__price">3.350.000₫</span><span class="product__quantity">x1</span></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="product__sum">
                                        <p class="product__sum-span">Tổng tiền:<span class="number">10.350.000₫</span></p>
                                    </div>
                                    <div class="product__buttons"><a href="#" class="product__button">Xem giỏ hàng</a><a href="#" class="product__button">Thanh toán </a></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header__header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="box-header">
                    <div class="box-header__logo"><a href="<?php echo getFullHost() . '/home/index'; ?>" class="box-header__link"><img src="<?php echo public_url() ?>/assets/images/logo.png" alt="vnbuilding logo" /></a></div>
                    <div class="box-header__text"><a href="<?php echo getFullHost() . '/home/index'; ?>" class="box-header__link"><img src="<?php echo public_url() ?>/assets/images/header/logan.png" alt="vnbuilding logan" /></a>
                        <p class="box-header__description">Nhà cung cấp rọ đá lớn nhất và rẻ nhất tại Việt Nam</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-support support">
                    <h3 class="support__title">Hỗ trợ trực tuyến:</h3>
                    <ul class="support__list">
                        <?php foreach ($data['advisory'] as $advi) : ?>
                            <li class="support__item">
                                <h5 class="support__item-name"><?php echo ($advi->sex == 1) ? 'Mr' : 'Ms' ?>. <?php echo $advi->name ?> - <?php echo $advi->position ?></h5>
                                <div class="support__item-skype"><span class="support__item-phone"><?php echo displayPhone($advi->phone) ?></span><a href="#" class="support__item-link"><i class="support__item-icon flaticon-skype"></i></a></div>
                            </li> 
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header__menu">
    <div class="container">
        <nav class="menu">
            <div class="menu-default">
                <div class="menu-default__title"><i class="menu-default__icon flaticon-menu-button-of-three-horizontal-lines"></i><span class="menu-default__span">Danh mục sản phẩm</span></div>
                <?php if ($data['path'] != 'application/views/site/user/sendcode.php' && $data['path']  != 'application/views/site/user/change-password.php'): ?>
                    <ul class="menu-default__list">
                        <?php foreach ($data['catalog'] as $cata): ?>
                            <?php if (!empty($cata->subs)): ?>
                                <li class="menu-default__item"><a href="#" class="menu-default__link menu-default__link--icon"><?php echo $cata->name ?></a>
                                    <ul class="menu-default__sub-menu">
                                        <?php foreach ($cata->subs as $row): ?>
                                            <?php if (!empty($row->subs2)): ?>
                                                <li class="menu-default__item"><a href="#" class="menu-default__link menu-default__link--icon"><?php echo $row->name ?></a>
                                                    <ul class="menu-default__sub-menu">
                                                        <?php foreach ($row->subs2 as $row1) : ?>
                                                            <li class="menu-default__item"><a href="#" class="menu-default__link"><?php echo $row1->name ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php else : ?>
                                                <li class="menu-default__item"><a href="#" class="menu-default__link"><?php echo $row->name ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="menu-default__item"><a href="#" class="menu-default__link"><?php echo $cata->name ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div> 
            <div class="menu-main">
                <nav class="navigation">
                    <ul class="navigation__list">

                        <li class="navigation__item navigation__active"><a href="<?php echo getFullHost() . '/home/index'; ?>" class="navigation__link">Trang chủ</a></li>
                        <li class="navigation__item"><a href="#" class="navigation__link">Giới thiệu</a></li>
                        <li class="navigation__item"><a href="<?php echo getFullHost() . '/product/product_list'; ?>" class="navigation__link">Sản phẩm</a></li>
                        <li class="navigation__item"><a href="#" class="navigation__link">Dịch vụ</a></li>
                        <li class="navigation__item"><a href="#" class="navigation__link">Dự án tiêu biểu</a></li>
                        <li class="navigation__item"><a href="#" class="navigation__link">Liên hệ</a></li>
                    </ul>
                    <div class="navigation__block-form">
                        <form action="<?php echo getFullHost() . "/home/search/"; ?>" method="get"   class="navigation__form"><input type="text" id="search_pro" name="search_product" value="<?php echo isset($_GET['search_product']) ? $_GET['search_product'] : ''; ?>" placeholder="Search..." class="navigation__input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"/><button type="submit" class="navigation__submit"><i class="navigation__icon flaticon-search"></i></button></form>
                    </div>
                </nav>
                <?php if ($data['path'] != 'application/views/site/user/sendcode.php' && $data['path']  != 'application/views/site/user/change-password.php'): ?>
                    <div data-slidesToShow="1" data-slidesToScroll="1" data-dots="1" data-arrows="1" data-autoplay="1" class="comp-slider-header slider__list slider-general__list comp-slider">
                        <?php foreach ($data['banner'] as $ban): ?>
                            <figure class="slider-item"><a href="#" class="slider-item__link"><img src="<?php echo public_url('/assets/images/slider/') . $ban->image ?>" alt="vnbuilding slider" class="slider-item__image" /></a>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</div>  