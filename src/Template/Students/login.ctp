<?php
$this->assign('title', 'ورود به حساب کاربری');
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="regular_text">
                        <?= $this->Form->create() ?>
                        <div class="form-group text-right">
                            <?= $this->Form->control('mobile', ['type' => 'tel', 'class' => 'form-control', 'label' => 'موبایل خود را وارد نمائید', 'autocomplete' => 'off']); ?>
                        </div>
                        <?= $this->Form->button(__('ارسال کد'), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link(__('ثبت نام'), ['action' => 'add'], ['class' => 'btn btn-link']) ?>
                        <?= $this->Form->end() ?>
                        <div class="mt-3">
                            <?= $this->Flash->render() ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 text-right">
                    <div class="d-lg-none">
                        <hr>
                    </div>
                    <h6 class="text-info">راهنما</h6>

                    <p class="mt-3">
                        جهت ورود به وب سایت ابتدا اطمینان حاصل نمائید که ثبت نام خود را کامل کرده اید، در صورتی که برای اولین بار سعی دارید وارد شوید ابتدا کد ملی خود را به آموزشگاه ایلانلو اعلام نمایید سپس از طریق کد ملی و شماره تماس خود ثبت نام را کامل کنید.
                    </p>
                    <p>
                        پس از ثبت نام شماره همراه خود را وارد کرده و کد را دریافت نمایید
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
