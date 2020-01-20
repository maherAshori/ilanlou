<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'کلاس');
?>

<h3><?= __('اضافه کردن به کلاس') ?></h3>

<?= $this->Form->create() ?>
<?= $this->Form->control('search', ['placeholder' => 'جستجو براساس کد ملی', 'label' => false]); ?>
<?= $this->Form->end() ?>


<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('firstName', 'نام') ?></th>
        <th scope="col"><?= $this->Paginator->sort('lastName', 'نام خانوادگی') ?></th>
        <th scope="col"><?= $this->Paginator->sort('nationalCode', 'کد ملی') ?></th>
        <th scope="col" class="actions"><?= __('عملیات') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= h($student->firstName) ?></td>
            <td><?= h($student->lastName) ?></td>
            <td><?= h($student->nationalCode) ?></td>
            <td class="actions">
                    <?= $this->Form->postLink(__('اضافه کن'), ['action' => 'join', $student->id, $classroomId], ['confirm' => __('آیا قصد دارید {0} را به کلاس اضافه کنید؟', $student->fullName)]) ?>
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
