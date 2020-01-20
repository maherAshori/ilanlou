
    <h3><?= $exam->title; ?> | Add students</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col">Fullname</th>
            <th scope="col">nationalCode</th>
            <th scope="col" class="actions"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= h($student->fullName) ?></td>
                <td><?= h($student->nationalCode) ?></td>
                <td class="actions">
                    <?php if (empty($student->exam)): ?>
                        <?= $this->Form->postLink(__('Add to exam'), ['action' => 'addStudentToExam', $student->id, $exam->id, $classroomId], ['confirm' => __('Are you sure you want to add student # {0}?', $student->fullName)]) ?>
                    <?php endif; ?>
                    <?php if (!empty($student->exam)): ?>

                        <?php if (empty($student->exam->score)): ?>
                            <?= $this->Form->create() ?>
                            <?php
                            echo $this->Form->control('student_id', ['type' => 'hidden', 'value' => $student->id]);
                            echo $this->Form->control('score');
                            ?>
                            <?= $this->Form->button(__('add score')) ?>
                            <?= $this->Form->end() ?>
                        <?php endif; ?>

                        <?php if (!empty($student->exam->score)): ?>
                            Score: <?= $student->exam->score ?>
                        <?php endif; ?>

                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
