<?php
$this->assign('title', 'ثبت نام');
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="regular_text">
                        <?= $this->Form->create($student) ?>
                        <div class="form-group text-right">
                            <?= $this->Form->control('nationalCode', ['type' => 'tel', 'class' => 'form-control', 'autocomplete' => 'off', 'label' => 'کد ملی']); ?>
                        </div>
                        <div class="form-group text-right">
                            <?= $this->Form->control('mobile', ['type' => 'tel', 'class' => 'form-control', 'autocomplete' => 'off', 'label' => 'شماره همراه']); ?>
                        </div>
                        <?= $this->Form->button(__('ثبت نام'), ['class' => 'btn btn-primary']) ?>
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
                        تنها دانش آموزانی قادر به ثبت نام هستند که کد ملی خود را به اپراتور آموزشگاه ایلانلو اعلام کرده باشند، پس از ثبت توسط اپراتور جهت تکمیل ثبت نام از این بخش استفاده نمائید
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
