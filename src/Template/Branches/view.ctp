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

                        <?php if (!empty($branch->courses)): ?>
                            <div class="row">
                                <?php foreach ($branch->courses as $course): ?>
                                    <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                        <?= $this->Html->link('<div class="card"><div class="card-body">'.h($course->name).'</div></div>', ['controller' => 'courses', 'action' => 'view', $course->slug], ['escape'  => false]) ?>
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
