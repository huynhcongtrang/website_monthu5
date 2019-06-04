<script src="<?php echo public_url() ?>/assets/js/edit_info_user.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<section class="section-account box-wrapper">
    <div class="container">
        <div class="box-wrapper__head">
            <div class="box-wrapper__block-title">
                <h3 class="box-wrapper__title">Thông tin tài khoản</h3>
            </div>
            <div class="box-wrapper__nav-bar">
                <ul class="box-wrapper__list">
                    <li class="box-wrapper__item"><a href="#" class="box-wrapper__link">Trang chủ</a></li>
                    <li class="box-wrapper__item">Thông tin tài khoản</li>
                </ul>
            </div>
        </div>
        <div class="box-wrapper__content">
            <div class="row">
                <div class="col-9">
                    <div class="account__box">
                        <h3 class="account__title">Lịch sử giao dịch</h3>
                        <div class="account__content">
                            <p class="account__des"><strong>Xin chào, <a href="#" class="link name-dis"><?php echo $data['user']->name ?></a> !</strong></p>
                            <div class="history text-center">
                                <table class="table history__dashboard table-hover">
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Ngày</th>
                                            <th>Địa chỉ</th>
                                            <th>Giá trị đơn hàng</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Tình trạng thanh toán</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data['transaction_list'])): ?>
                                            <?php foreach ($data['transaction_list'] as $transaction): ?>
                                                <tr>
                                                    <th><?php echo $transaction->id ?></th>
                                                    <th><?php echo get_date($transaction->created, false) ?></th>
                                                    <th><?php echo $transaction->address ?></th>
                                                    <th><?php echo number_format($transaction->amount) ?>₫</th>
                                                    <th><?php echo ($transaction->payment == 1) ? 'Thanh toán khi giao hàng' : 'Chuyển khoản' ?></th>
                                                    <th><?php echo ($transaction->status_payment == 1) ? 'Chưa thanh toán' : 'Đã thanh toán' ?></th>
                                                    <th><?php echo ($transaction->status_payment == 1) ? 'Đang vận chuyển' : 'Thành công' ?></th>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <th colspan="7">Không có đơn hàng nào.(Sẽ hiển thị Nếu không có giao dịch)</th>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="account__box">
                        <h3 class="account__title">Tài khoản của tôi</h3>
                        <div class="account__content">
                            <?php if (!empty($data['user'])): ?>
                                <ul class="account__list">
                                    <li class="account__item"><i class="icon fas fa-user-tag"></i><span>Tên:</span><strong class="name name-dis"><?php echo $data['user']->name ?></strong></li>
                                    <li class="account__item"><i class="icon fas fa-home"></i><span>Địa chỉ:</span><strong class="name address_dis"><?php echo $data['user']->address ?></strong></li>
                                    <li class="account__item"><i class="icon fas fa-mobile-alt"></i><span>Số điện thoại:</span><strong class="name phone_dis"><?php echo $data['user']->phone ?></strong></li>
                                </ul><button type="button" data-toggle="modal" data-target="#accountInfo" class="account__button">Chỉnh sửa thông tin</button>
                            <?php endif; ?>
                            <div id="accountInfo" tabindex="-1" role="dialog" aria-labelledby="accountInfoLabel" aria-hidden="true" class="modal fade">
                                <div role="document" class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông tin tài khoản</h5><button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="account__form">
                                                <div class="form__group"><label for="lastName">Tên<span> *</span></label><input id="fullname" type="text" name="full name" required="required" autocomplete="off" value="<?php echo $data['user']->name ?>"></div>
                                                <p class="error-display-detail" id="error-display-name"></p>
                                                <div class="form__group"><label for="address">Địa chỉ</label>
                                                    <select class="selectpicker form-control select-control" name="province-address" id="province-select-address" data-container="body" data-live-search="true" title="Chọn tỉnh, thành phố..." data-hide-disabled="true">
                                                        <option value="Tp. Hồ Chí Minh">Hồ chí minh</option>
                                                    </select>

                                                    <select class="selectpicker form-control select-control" name="district-address" id="district-select-address" data-container="body" data-live-search="true" title="Chọn quận, huyện ..." data-hide-disabled="true">
                                                        <option value="Quận 1">Qận 1</option>
                                                    </select>

                                                    <select class="selectpicker form-control select-control" name="ward-address" id="ward-select-address" data-container="body" data-live-search="true" title="Chọn phường, thị xã ...." data-hide-disabled="true">
                                                        <option value="Phường Tân Chánh Hiệp">Phường Tân Chánh Hiệp</option>
                                                    </select>
                                                    <input id="street-address" type="text" name="street-address"  placeholder="Nhập số nhà, tên đường ...">
                                                </div>
                                                <p class="error-display-detail" id="error-display-address"></p>
                                                <div class="form__group"><label for="phone">Số điện thoại<span> *</span></label><input id="phone" type="tel" name="phone" pattern="[0-9]{10}" required="required" value="<?php echo $data['user']->phone ?>"> </div>
                                                <p class="error-display-detail" id="error-display-phone"></p>
                                                <div class="modal-footer"><button type="submit" class="btn btn-primary" id="btn-save-info-edit">Lưu</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>