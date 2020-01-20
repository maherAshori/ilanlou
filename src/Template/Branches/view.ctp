<?php
$this->assign('title', $branch->name);
?>


<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right" dir="rtl">
                        <?= h($branch->name) ?>
                    </div>
                    <div class="regular_text text-right" dir="rtl">
                        <?= $this->Text->autoParagraph(h($branch->description)); ?>

                        <h6>ترم ها</h6>

                        <?php if (!empty($branch->terms)): ?>
                            <div class="row">
                                <?php foreach ($branch->terms as $term): ?>
                                    <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                        <?= $this->Html->link('<div class="card"><div class="card-body">'.h($term->name).'</div></div>', ['controller' => 'Terms', 'action' => 'view', $term->slug], ['escape'  => false]) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
