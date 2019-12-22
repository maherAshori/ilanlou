<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
$this->assign('title', 'دوره ها');
?>
    <h3><?= h($course->name) ?></h3>
    <div>
        <?php if (!empty($course->description)): ?>
        <?= $this->Text->autoParagraph(h($course->description)); ?>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($course->terms)): ?>
            <h4><?= __('ترم های مرتبط') ?></h4>
            <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('عنوان ترم') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
            <?php foreach ($course->terms as $terms): ?>
            <tr>
                <td><?= h($terms->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('نمایش'), ['controller' => 'Terms', 'action' => 'view', $terms->id]) ?>
                    <?= $this->Html->link(__('ویرایش'), ['controller' => 'Terms', 'action' => 'edit', $terms->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['controller' => 'Terms', 'action' => 'delete', $terms->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $terms->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
