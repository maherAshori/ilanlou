<?php
$this->assign('title', 'پروفایل من');
?>

    <?= $this->Form->create($teacher, ["type" => "file"]) ?>
    <fieldset>
        <legend>
            <?= $this->Html->image("/uploads/teachers/".$teacher->image, ['style'=>'width: 100px;border: solid 1px #ccc;float: right;margin-bottom: 5px;']) ?>
        </legend>
        <?php
            echo $this->Form->control('firstName', ['label' => 'نام']);
            echo $this->Form->control('lastName', ['label' => 'نام خانوادگی']);
            echo $this->Form->control('description', ['type' => 'textarea', 'label' => 'توضیحاتی در مورد خودتان']);
            echo $this->Form->control('mobile', ['disabled' => true]);
            echo $this->Form->control('image', ["type" => "file"]);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
