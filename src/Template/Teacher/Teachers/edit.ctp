
    <?= $this->Form->create($teacher, ["type" => "file"]) ?>
    <fieldset>
        <legend>
            <?= __('Edit Teacher') ?>
            <?= $this->Html->image("/uploads/teachers/".$teacher->image, ['style'=>'width: 100px;border: solid 1px #ccc;float: right;margin-bottom: 5px;']) ?>
        </legend>
        <?php
            echo $this->Form->control('firstName');
            echo $this->Form->control('lastName');
            echo $this->Form->control('description', ['type' => 'textarea']);
            echo $this->Form->control('mobile', ['disabled' => true]);
            echo $this->Form->control('image', ["type" => "file"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
