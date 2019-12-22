
    <h3><?= h($request->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Student') ?></th>
            <td><?= $request->has('student') ? $this->Html->link($request->student->fullName, ['controller' => 'Students', 'action' => 'view', $request->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classroom') ?></th>
            <td><?= $request->has('classroom') ? $this->Html->link($request->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $request->classroom->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Confirm') ?></th>
            <td><?= $this->Number->format($request->confirm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($request->created) ?></td>
        </tr>
    </table>
