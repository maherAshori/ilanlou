<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'درخواست ها');
?>

<h3><?= __('درخواست ثبت نام') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('student_id', 'دانش آموز') ?></th>
        <th scope="col"><?= $this->Paginator->sort('classroom_id', 'کلاس') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created', 'تاریخ درخواست') ?></th>
        <th scope="col" class="actions"><?= __('عملیات') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($requests as $request): ?>
        <tr>
            <td><?= $request->has('student') ? $this->Html->link($request->student->fullName, ['controller' => 'Students', 'action' => 'view', $request->student->id]) : '' ?></td>
            <td><?= $request->has('classroom') ? $this->Html->link($request->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $request->classroom->id]) : '' ?></td>
            <td><?= h($request->created) ?></td>
            <td>
                <?= $this->Form->postLink(__('پذیرش دخواست'), ['action' => 'accept', $request->id], ['confirm' => __('پس از تایید دانش آموز در کلاس "{0}" ثبت نام خواهد شد', $request->classroom->name)]) ?>
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
