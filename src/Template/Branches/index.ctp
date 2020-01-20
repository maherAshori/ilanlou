<?php
$this->assign('title', 'شعبه ها');
?>


<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right" dir="rtl">
                        شعبه های ما
                    </div>
                    <div class="regular_text text-right" dir="rtl">
                            <div class="row">
                                <?php foreach ($branches as $branch): ?>
                                    <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                        <?= $this->Html->link('<div class="card"><div class="card-body">'.h($branch->name).'</div></div>', ['controller' => 'Branches', 'action' => 'view', $branch->slug], ['escape'  => false]) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
