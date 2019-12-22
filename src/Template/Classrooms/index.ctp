<?php
$this->assign('title', 'کلاس ها');
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        کلاس ها
                    </div>
                    <div class="regular_text" dir="rtl">
                        <div class="row">
                            <?php foreach ($classrooms as $classroom): ?>
                                <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                    <?= $this->Html->link('<div class="card"><div class="card-body">'.h($classroom->name).'</div></div>', ['controller' => 'classrooms', 'action' => 'view', $classroom->slug], ['escape'  => false]) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
