<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term $term
 */
$this->assign('title', 'ترم');

?>
<h3><?= h($term->name) ?></h3>
<div>
    <?php if (!empty($term->description)): ?>
        <?= $this->Text->autoParagraph(h($term->description)); ?>
    <?php endif; ?>
</div>
<div class="related">
    <?php if (!empty($term->classrooms)): ?>
        <h4><?= __('کلاس های مرتبط') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('عنوان ترم') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
            <?php foreach ($term->classrooms as $classroom): ?>
                <tr>
                    <td><?= h($classroom->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('نمایش'), ['controller' => 'Classrooms', 'action' => 'view', $classroom->id]) ?>
                        <?= $this->Html->link(__('ویرایش'), ['controller' => 'Classrooms', 'action' => 'edit', $classroom->id]) ?>
                        <?= $this->Form->postLink(__('حذف'), ['controller' => 'Classrooms', 'action' => 'delete', $classroom->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $classroom->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
