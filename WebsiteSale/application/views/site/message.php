<?php if(isset($data['message']) && $data['message']):?>
<div class="nNote nInformation hideit">
            <p><strong>Thông báo: </strong><?php echo $data['message']?></p>
        </div>
<?php endif;?>