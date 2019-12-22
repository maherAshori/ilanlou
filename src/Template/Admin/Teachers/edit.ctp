    <?= $this->Form->create($teacher, ['type' => 'file']) ?>
    <fieldset>
        <legend>
            <?= __('ویرایش آموزگار') ?>
            <?= $this->Html->image("/uploads/teachers/".$teacher->image, ['style'=>'width: 100px;border: solid 1px #ccc;float: left;margin-bottom: 5px;']) ?>
        </legend>
        <?php
        echo $this->Form->control('firstName', ['label' => 'نام']);
        echo $this->Form->control('lastName', ['label' => 'نام خانوادگی']);
        echo $this->Form->control('mobile', ['label' => 'موبایل']);
        echo $this->Form->control('home', ['label' => 'نمایش در صفحه اول']);
        echo $this->Form->control('image', ["type" => "file", 'label' => 'تصویر آموزگار']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
