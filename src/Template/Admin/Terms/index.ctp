<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'ترم');
?>

<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

    <h3><?= __('ترم') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('course_id', 'دوره') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'عنوان ترم') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($terms as $term): ?>
            <tr>
                <td><?= $term->has('course') ? $this->Html->link($term->course->name, ['controller' => 'Courses', 'action' => 'view', $term->course->id]) : '' ?></td>
                <td><?= h($term->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('نمایش'), ['action' => 'view', $term->id]) ?>
                    <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $term->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['controller' => 'Terms', 'action' => 'delete', $term->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $term->name)]) ?>
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
