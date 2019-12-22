<?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $teacher->id]) ?>
<hr>
<table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($teacher->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($teacher->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($teacher->mobile) ?></td>
        </tr>
    </table>


    <?php if(!empty($teacher->classrooms)): ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col">Term</th>
            <th scope="col">Course Name</th>
            <th scope="col"><?= __('Students') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teacher->classrooms as $classroom): ?>
            <tr>
                <td><?= $classroom->term->name ?></td>
                <td><?= h($classroom->name) ?></td>
                <td>
                    <?= $this->Html->link(__('Students'), ['controller' => 'Teachers','action' => 'students', $classroom->id]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
