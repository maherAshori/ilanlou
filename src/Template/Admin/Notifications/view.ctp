<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'پیام ها');
?>
    <table class="vertical-table ">
        <tr>
            <th class="text-right" width="10%" scope="row"><?= __('دانش آموز') ?></th>
            <td class="text-right"><?= $notification->has('student') ? $this->Html->link($notification->student->fullName, ['controller' => 'Students', 'action' => 'edit', $notification->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th class="text-right" scope="row"><?= __('تاریخ ارسال') ?></th>
            <td class="text-right"><?= h($notification->postage_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('پیام') ?></h4>
        <?= $this->Text->autoParagraph(h($notification->message)); ?>
    </div>
