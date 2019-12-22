<?php
$this->assign('title', 'شعبه ها');
?>

    <h3><?= h($branch->name) ?></h3>

    <div>
        <?php if (!empty($branch->description)): ?>
            <?= $this->Text->autoParagraph(h($branch->description)); ?>
        <?php endif; ?>
    </div>

    <div class="related">
        <?php if (!empty($branch->courses)): ?>
            <h4><?= __('دوره های مرتبط') ?></h4>

            <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('عنوان دوره') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
            <?php foreach ($branch->courses as $courses): ?>
            <tr>
                <td><?= h($courses->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('نمایش'), ['controller' => 'Courses', 'action' => 'view', $courses->id]) ?>
                    <?= $this->Html->link(__('ویرایش'), ['controller' => 'Courses', 'action' => 'edit', $courses->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['controller' => 'Courses', 'action' => 'delete', $courses->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $courses->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
