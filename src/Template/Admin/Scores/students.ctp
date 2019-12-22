<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'نمرات');
?>

<h3><?= $classroom->name; ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col">نام</th>
        <th scope="col">کد ملی</th>
        <th scope="col" class="actions">
            نمره دانش آموز
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($scores as $item): ?>
        <tr>
            <td><?= h($item->student->fullName) ?></td>
            <td><?= h($item->student->nationalCode) ?></td>
            <td class="actions">
                <?php if(empty($item->score)): ?>
                    <?= $this->Form->create() ?>
                    <?php
                    echo $this->Form->control('score_id', ['type' => 'hidden', 'value' => $item->id]);
                    echo $this->Form->control('student_score', ['label' => 'نمره دانش اموز را وارد نمائید']);
                    ?>
                    <?= $this->Form->button(__('ثبت نمره')) ?>
                    <?= $this->Form->end() ?>
                <?php endif; ?>
                <?php if(!empty($item->score)): ?>
                    <?= $item->score ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<style>
    button {
        padding: 7px;
        font-size: 15px;
        line-height: normal;
    }
</style>