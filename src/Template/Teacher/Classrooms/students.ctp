<?php
$this->assign('title', 'دانش آموزان');
?>

<h3>دانش آموزان کلاس <?= $classroomTitle ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col">نام</th>
        <th scope="col">نام خانوادگی</th>
        <th scope="col">کد ملی</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($classrooms as $classroom): ?>
        <tr>
            <td><?= h($classroom->student->firstName) ?></td>
            <td><?= h($classroom->student->lastName) ?></td>
            <td><?= h($classroom->student->nationalCode) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
