<div class="home"></div>
<div class="regular">
    <div class="container">
        <div class="regular_content">
            <div class="row">
                <div class="col">
                    <div class="regular_title text-right">
                        <?= h($language->title) ?>
                    </div>
                    <div class="regular_text text-right" dir="rtl">
                        <?php if (!empty($language->classrooms)): ?>
                            <div class="row">
                                <?php foreach ($language->classrooms as $classrooms): ?>
                                    <div class="col-lg-3 col-md-4 col-12 text-center mb-3">
                                        <?= $this->Html->link('<div class="card"><div class="card-body">'.h($classrooms->name).'</div></div>', ['controller' => 'classrooms', 'action' => 'view', $classrooms->slug], ['escape'  => false]) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (empty($language->classrooms)): ?>
                            <div class="alert alert-info">
                                در حال حاضر دوره ای ثبت نشده است
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
