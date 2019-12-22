<h3><?= __('Requests') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('classroom_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($requests as $request): ?>
        <tr>
            <td><?= $request->has('student') ? $this->Html->link($request->student->fullName, ['controller' => 'Students', 'action' => 'view', $request->student->id]) : '' ?></td>
            <td><?= $request->has('classroom') ? $this->Html->link($request->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $request->classroom->id]) : '' ?></td>
            <td><?= h($request->created) ?></td>
            <td>
                <?= $this->Form->postLink(__('accept'), ['action' => 'accept', $request->id], ['confirm' => __('After accept "{0}" will join "{1}" course, are you sure?', $request->student->fullName, $request->classroom->name)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
