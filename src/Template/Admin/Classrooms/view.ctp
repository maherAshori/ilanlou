<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom $classroom
 */
?>
<h3><?= h($classroom->name) ?></h3>
<div>
    <?php if (!empty($classroom->description)): ?>
        <?= $this->Text->autoParagraph(h($classroom->description)); ?>
    <?php endif; ?>
</div>
