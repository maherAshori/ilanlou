<?php
$this->assign('title', 'کلاس های من');
?>

<div class="classrooms view large-9 medium-8 columns content">
    <h3><?= h($classroom->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $classroom->has('language') ? $this->Html->link($classroom->language->title, ['controller' => 'Languages', 'action' => 'view', $classroom->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Term') ?></th>
            <td><?= $classroom->has('term') ? $this->Html->link($classroom->term->name, ['controller' => 'Terms', 'action' => 'view', $classroom->term->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher') ?></th>
            <td><?= $classroom->has('teacher') ? $this->Html->link($classroom->teacher->fullName, ['controller' => 'Teachers', 'action' => 'view', $classroom->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($classroom->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($classroom->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($classroom->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $classroom->has('point') ? $this->Html->link($classroom->point->id, ['controller' => 'Points', 'action' => 'view', $classroom->point->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($classroom->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($classroom->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Home') ?></th>
            <td><?= $classroom->home ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($classroom->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requests') ?></h4>
        <?php if (!empty($classroom->requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Classroom Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Confirm') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($classroom->requests as $requests): ?>
            <tr>
                <td><?= h($requests->id) ?></td>
                <td><?= h($requests->student_id) ?></td>
                <td><?= h($requests->classroom_id) ?></td>
                <td><?= h($requests->created) ?></td>
                <td><?= h($requests->confirm) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scores') ?></h4>
        <?php if (!empty($classroom->scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Classroom Id') ?></th>
                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($classroom->scores as $scores): ?>
            <tr>
                <td><?= h($scores->id) ?></td>
                <td><?= h($scores->classroom_id) ?></td>
                <td><?= h($scores->student_id) ?></td>
                <td><?= h($scores->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Scores', 'action' => 'view', $scores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Scores', 'action' => 'edit', $scores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scores', 'action' => 'delete', $scores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Classroom') ?></h4>
        <?php if (!empty($classroom->student_classroom)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Classroom Id') ?></th>
                <th scope="col"><?= __('Registration Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($classroom->student_classroom as $studentClassroom): ?>
            <tr>
                <td><?= h($studentClassroom->id) ?></td>
                <td><?= h($studentClassroom->student_id) ?></td>
                <td><?= h($studentClassroom->classroom_id) ?></td>
                <td><?= h($studentClassroom->registration_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentClassroom', 'action' => 'view', $studentClassroom->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentClassroom', 'action' => 'edit', $studentClassroom->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentClassroom', 'action' => 'delete', $studentClassroom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentClassroom->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
