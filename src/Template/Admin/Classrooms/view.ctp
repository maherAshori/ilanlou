<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom $classroom
 */
?>
<h3><?= h($classroom->name) ?></h3>
<div>
    <?php if (!empty($classroom->description)): ?>
        <?= $this->Text->autoParagraph(h($classroom->description)); ?>
    <?php endif; ?>
</div>
<div>
    <h3>دانش آموزان در این کلاس</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('firstName', 'نام') ?></th>
            <th scope="col"><?= $this->Paginator->sort('lastName', 'نام خانوادگی') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nationalCode', 'کد ملی') ?></th>
            <th scope="col"><?= $this->Paginator->sort('mobile', 'موبایل') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classroom->student_classroom as $student): ?>
            <tr>
                <td><?= h($student->info->firstName) ?></td>
                <td><?= h($student->info->lastName) ?></td>
                <td><?= h($student->info->nationalCode) ?></td>
                <td><?= h($student->info->mobile) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
