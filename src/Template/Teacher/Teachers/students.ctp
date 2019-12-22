<h3>Students in Course: <?= $classroom->name ?></h3>

<ul>
<?php foreach ($students as $student): ?>
    <li>
        <?= h($student->fullName) ?>
    </li>
<?php endforeach; ?>
</ul>
