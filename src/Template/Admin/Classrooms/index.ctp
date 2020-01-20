<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom[]|\Cake\Collection\CollectionInterface $classrooms
 */
$this->assign('title', 'کلاس');
?>
<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

<h3><?= __('کلاس') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('name', 'عنوان کلاس') ?></th>
        <th scope="col"><?= $this->Paginator->sort('term_id', 'ترم') ?></th>
        <th scope="col" class="actions"><?= __('امتحان') ?></th>
        <th scope="col" class="actions"><?= __('دانش آموز') ?></th>
        <th scope="col" class="actions"><?= __('عملیات') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($classrooms as $classroom): ?>
        <tr>
            <td><?= h($classroom->name) ?></td>
            <td><?= $classroom->has('term') ? $this->Html->link($classroom->term->name, ['controller' => 'Terms', 'action' => 'view', $classroom->term->id]) : '' ?></td>
            <td>
                <?php if(empty($classroom->scores)) :?>
                <?= $this->Form->postLink(__('ثبت امتحان برای کلاس'), ['action' => 'score', $classroom->id], ['confirm' => __('پس از تایید برای این کلاس امتحان ثبت خواهد شد؟', $classroom->name)]) ?>
                <?php endif; ?>
                <?php if(!empty($classroom->scores)) :?>
                    <?= $this->Html->link(__('ثبت نمره برای دانش آموزان کلاس'), ['controller' => 'Scores','action' => 'students', $classroom->id]) ?>
                <?php endif; ?>
            </td>
            <td>
                <?= $this->Html->link(__('اضافه کردن دانش آموز'), ['action' => 'students', $classroom->id]) ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('نمایش'), ['action' => 'view', $classroom->id]) ?>
                <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $classroom->id]) ?>
                <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $classroom->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $classroom->name)]) ?>
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
