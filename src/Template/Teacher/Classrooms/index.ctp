<?php
$this->assign('title', 'کلاس های من');
?>

<h3><?= __('کلاس های من') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr >
        <th class="text-center" scope="col">عنوان کلاس</th>
        <th class="text-center" scope="col">ترم</th>
        <th class="text-center" scope="col" class="actions"><?= __('امتحان') ?></th>
        <th class="text-center" scope="col" class="actions"><?= __('دانش آموزان') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($classrooms as $classroom): ?>
        <tr class="text-center">
            <td class="text-center"><?= h($classroom->name) ?></td>
            <td class="text-center"><?= $classroom->term->name ?></td>
            <td class="text-center">
                <?php if(empty($classroom->scores)) :?>
                    جهت ثبت امتحان از مدیریت مجوز بگیرید
                <?php endif; ?>
                <?php if(!empty($classroom->scores)) :?>
                    <?= $this->Html->link(__('ثبت نمره برای دانش آموزان کلاس'), ['controller' => 'Scores','action' => 'students', $classroom->id]) ?>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <?= $this->Html->link(__('لیست دانش آموزان کلاس'), ['action' => 'students', $classroom->id, $classroom->name]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('اولین صفحه')) ?>
        <?= $this->Paginator->prev('< ' . __('قبلی')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('بعدی') . ' >') ?>
        <?= $this->Paginator->last(__('آخرین صفحه') . ' >>') ?>
    </ul>
</div>

