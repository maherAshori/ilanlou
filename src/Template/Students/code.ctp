<?php
$this->assign('title', 'اعتبارسنجی');
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
                            <?= $this->Form->control('code', ['type' => 'tel', 'class' => 'form-control', 'label' => 'کد را وارد نمائید', 'autocomplete' => 'off']); ?>
                        </div>
                        <?= $this->Form->button(__('ورود به آموزشگاه ایلانلو'), ['class' => 'btn btn-primary']) ?>
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
                        در این مرحله شما یک کد دریافت خواهید کرد، آن را در کادر روبرو قرار دهید و وارد پنل خود شوید
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
