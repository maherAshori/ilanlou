<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'پیام ها');
?>

<?= $this->Form->create($notification) ?>
<fieldset>
    <legend><?= __('ارسال پیام برای دانش آموزان') ?></legend>

    <input type="checkbox" name="toAll" id="toAll">
    ارسال برای همه

    <?php
    echo $this->Form->control('student_id', ['options' => $students, 'label' => 'دانش آموز را انتخاب نمایید']);
    echo $this->Form->control('message', ['label' => 'متن پیام']);
    ?>
    <?= $this->Form->button(__('ارسال')) ?>
</fieldset>
<?= $this->Form->end() ?>

<script>
    $("input[name='toAll']").click(function () {
        if ($(this).is(':checked')) {
            $(".select").hide();
        }else{
            $(".select").show();
        }
    });
</script>
