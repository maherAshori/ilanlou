<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom $classroom
 */
$this->assign('title', 'کلاس');
?>
    <?= $this->Form->create($classroom, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('ایجاد کلاس') ?></legend>
        <?php
            echo $this->Form->control('language_id', ['options' => $languages, 'label' => 'زبان را انتخاب کنید']);
            echo $this->Form->control('term_id', ['options' => $terms, 'label' => 'ترم را انتخاب کنید']);
            echo $this->Form->control('teacher_id', ['options' => $teachers, 'label' => 'آموزگار را انتخاب کنید']);
            echo $this->Form->control('name', ['label' => 'عنوان کلاس']);
            echo $this->Form->control('description', ['label' => 'توضیحات']);
            echo $this->Form->control('price', ['label' => 'مبلغ کلاس']);

            echo $this->Form->control('home', ['label' => 'نمایش در صفحه اول']);
            echo $this->Form->control('image', ["type" => "file", 'label' => 'تصویر کلاس']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
