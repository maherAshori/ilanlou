<?php
$this->assign('title', 'اساتید');
?>

<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        اساتید
                    </div>
                    <div class="regular_text" dir="rtl">
                        <div class="row">
                            <?php foreach ($teachers as $teacher): ?>
                                <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                    <?= $this->Html->link('<div class="card"><div class="card-body">'.h($teacher->fullName).'</div></div>', ['controller' => 'teachers', 'action' => 'view', $teacher->slug], ['escape'  => false]) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
