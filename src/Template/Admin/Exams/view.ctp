
    <h3><?= h($exam->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($exam->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $exam->has('classroom') ? $this->Html->link($exam->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $exam->classroom->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Students') ?></h4>
        <?php if (!empty($exam->students_exams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Student') ?></th>
                <th scope="col"><?= __('Score') ?></th>
            </tr>
            <?php foreach ($exam->students_exams as $studentExam): ?>
            <tr>
                <td><?= h($studentExam->student->fullName) ?></td>
                <td><?= h($studentExam->score) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
